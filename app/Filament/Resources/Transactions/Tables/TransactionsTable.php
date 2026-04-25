<?php

namespace App\Filament\Resources\Transactions\Tables;

use App\Filament\Exports\TransactionExporter;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Forms\Components\DatePicker;
use Filament\QueryBuilder\Constraints\DateConstraint;
use Filament\Schemas\Components\FusedGroup;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->columns([

                TextColumn::make('txn_reference')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Owner')
                    ->sortable(),

                TextColumn::make('txn_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'contribution' => 'success',
                        'withdrawal' => 'danger',
                        'withdraw' => 'danger',
                    })
                    ->icon(fn (string $state): Heroicon => match ($state) {
                        'contribution' => Heroicon::PlusCircle,
                        'withdrawal' => Heroicon::MinusCircle,
                        'withdraw' => Heroicon::MinusCircle,
                    })
                    ->searchable(),
                
                TextColumn::make('amount')
                    ->money('Ugx')
                    ->sortable(),
                TextColumn::make('management_fees')
                    ->money('Ugx')
                    ->label('Mgt Fees')
                    ->sortable(),

                TextColumn::make('total_deposit')
                    ->label('Total')
                    ->money('Ugx')
                    ->searchable(),
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
                TextColumn::make('notes')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([

                    
                    BulkAction::make('export_pdf')
                        ->label('Export PDF')
                        ->color('success')
                        ->icon('heroicon-o-document-arrow-down')
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {

                            $records->load(['user', 'approver', 'reviewer']);

                            $pdf = Pdf::loadView('filament.pdfs.transactions', [
                                'transactions' => $records,
                            ])->setPaper('a4', 'landscape');

                            return response()->streamDownload(
                                fn () => print($pdf->output()),
                                'transactions-' . now()->format('Y-m-d_H-i-s') . '.pdf'
                            );
                        }),
                        
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
