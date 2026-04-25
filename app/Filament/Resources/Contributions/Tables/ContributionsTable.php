<?php

namespace App\Filament\Resources\Contributions\Tables;

use App\Mail\ContributionConfirmation;
use App\Models\Contribution;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\FusedGroup;
use Filament\Support\Enums\Size;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContributionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // ->deferLoading()
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->emptyStateIcon('heroicon-o-bookmark')
            ->emptyStateDescription('Once you onboard, your details and application status will appear here.')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Start Now')
                    ->url('/app/contributions/create')
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable(),

                TextColumn::make('reference')
                    ->searchable(),

                TextColumn::make('amount')
                    ->money('Ugx')
                    ->sortable(),

                TextColumn::make('managment_fee')
                    ->money('Ugx')
                    ->label('Mgt Fees')
                    ->sortable(),

                TextColumn::make('total_deposit')
                    ->money('Ugx')
                    ->label('Total')
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'review' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })
                    ->icon(fn (string $state): Heroicon => match ($state) {
                        'pending' => Heroicon::OutlinedPencil,
                        'review' => Heroicon::OutlinedClock,
                        'approved' => Heroicon::OutlinedCheckCircle,
                    }),

                TextColumn::make('created_at')
                    ->label('Made On')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //

                    Filter::make('created_at')
                    ->schema([
                        FusedGroup::make([
                            DatePicker::make('created_from')->native(false),
                            DatePicker::make('created_until')->native(false),
                        ])->label('Choose date range')
                        ->columns(2),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),


                SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'review' => 'Review',
                        'rejected' => 'Rejected',
                    ]),

                SelectFilter::make('user')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
            
            ])
            ->recordActions([

                ActionGroup::make([
                
                Action::make('view')
                    ->color('default')
                    ->hiddenLabel()
                    ->icon('heroicon-s-eye')
                    ->modalContent(fn (Contribution $record): View => view(
                        'filament.pages.actions.contributions',
                        ['record' => $record],
                    ))->modalSubmitAction(false)->size(Size::Small)->modalWidth('xs'),
                
                
                    EditAction::make()->slideOver()->hiddenLabel()->size(Size::Small),

                    Action::make('approve')
                        ->icon('heroicon-s-check')
                        ->hiddenLabel()
                        ->size(Size::Small)
                        ->color('success')
                        ->hidden(fn (Contribution $record) => $record->status == 'approved')
                        ->action(function ( $record ) {
                            // dd($record);
                            $record->update([
                                'status' => 'approved'
                            ]);

                            $account = \App\Models\User::where('id', $record->user_id)->first();
                            $account->update(['member_account' => $account->member_account + $record->amount]);

                            //update target milestone
                            $target = \App\Models\Target::where('id', $record->target_id)->first();
                            $target->update([
                                'target_scores' => ($target->target_scores + $record->amount)
                            ]);

                            //update system account
                            $micAccount = \App\Models\MicAccount::where('id', 1)->first();
                            $micAccount->update([
                                'total_contributions' => ($micAccount->total_contributions + $record->amount),
                                'managment_fees' => $micAccount->managment_fees + 4000
                            ]);

                            //create transcation record of the, plus activity
                            Transaction::create([
                                'txn_id' => Str::uuid(),
                                'txn_reference' => $record->reference,
                                'user_id' => $record->user_id,
                                'txn_type' => 'contribution',
                                'total_deposit' => $record->total_deposit,
                                'amount' => $record->amount,
                                'management_fees' => $record->managment_fee,
                                'status' => $record->status,
                                'payment_proof' => $record->payment_proof ?? null,
                                'return_fee' => 0,
                                'notes'  => $record->notes,
                                'approved_by' => $record->approved_by,
                                'reviewed_by' => null,
                            ]);

                            Notification::make()->title('Transaction recorded successfully')->success()->send();
                            $emailUser = \App\Models\User::where('id', $record->user_id)->first();
                            //email client about confirmation
                            Mail::to($emailUser->email)->send(new ContributionConfirmation($record));
                            Mail::to('masavuinvestmentclub@gmail.com')->send(new ContributionConfirmation($record));
                            Mail::to('amazing.chief23@gmail.com')->send(new ContributionConfirmation($record));
                        }),


                    // DeleteAction::make()->hiddenLabel()->size(Size::Small),
                ])->buttonGroup() 
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([

                    BulkAction::make('export_pdf')
                        ->label('Export PDF')
                        ->color('success')
                        ->icon('heroicon-o-document-arrow-down')
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {

                            $records->load(['user', 'target', 'approvedBy']);

                            $pdf = Pdf::loadView('filament.pdfs.contributions', [
                                'contributions' => $records,
                            ])->setPaper('a4', 'landscape');

                            return response()->streamDownload(
                                fn () => print($pdf->output()),
                                'contributions-' . now()->format('Y-m-d_H-i-s') . '.pdf'
                            );
                        }),


                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
