<?php

namespace App\Filament\Resources\Users\Tables;

use App\Filament\Tables\Columns\PhotoColumn;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

use App\Mail\OneTimeMail;
use Illuminate\Support\Facades\Mail;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->emptyStateIcon('heroicon-o-users')
            ->emptyStateDescription('Manage all members on the system from here.')
            ->columns([
                // TextColumn::make('uuid')
                //     ->label('UUID')
                //     ->searchable(),
                
                TextColumn::make('member_number')
                    ->label('ID')
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->label('D.O.B')
                    ->date()
                    ->searchable(),
                TextColumn::make('date_of_joining')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('place_of_residence')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                PhotoColumn::make('avatar_url')
                    ->toggleable(false)
                    ->label('Photo'),
                TextColumn::make('name')
                      ->description(fn (User $record) => $record->email)
                    ->searchable(),
                // TextColumn::make('email')
                //     ->label('Email address')
                //     ->searchable(),
                TextColumn::make('phone_number')
                    ->searchable(),
                TextColumn::make('national_id_passort_number')
                    ->label('NIN Number')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('source_of_income')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Income Source')
                    ->searchable(),
                TextColumn::make('next_of_kin_name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Next of Kin')
                    ->searchable(),
                TextColumn::make('relationship_next_of_kin')
                    ->label('Relationship')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('contacts_next_of_kin')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Contacts')
                    ->searchable(),
                TextColumn::make('active_bank_account_name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Bank Account')
                    ->searchable(),
                TextColumn::make('active_bank_account_number')
                    ->label('Account Number')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                ImageColumn::make('national_id_photo')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                ImageColumn::make('current_photo')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('acknowledgment_on_tos')
                    ->label('TOS')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('application_status')
                    ->label('Onboarding')
                    ->badge(),
                

                SelectColumn::make('status')
                    ->options([
                        'active' => 'Active',
                        'suspended' => 'Suspended',
                        'banned' => 'Banned',
                        'inactive' => 'In-active',
                    ])
                    ->native(false),


                ToggleColumn::make('is_admin')
                    ->label('Is Admin'),
                TextColumn::make('email_verified_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->dateTime()
                    ->sortable(),
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
                TrashedFilter::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    
                Action::make('view')
                    ->color('default')
                    ->icon('heroicon-s-eye')
                    ->modalContent(fn (User $record): View => view(
                        'filament.pages.actions.user',
                        ['record' => $record],
                    ))->modalSubmitAction(false)->modalWidth('3xl'),


                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([


                BulkAction::make('export_users_full_pdf')
                    ->label('Export Full Profiles')
                    ->color('info')
                    ->icon('heroicon-o-document-arrow-down')
                    // ->requiresConfirmation()
                    ->modalHeading('Export Full User Profiles')
                    ->modalDescription('Each user will be exported as a detailed multi-page profile.')
                    ->action(function (\Illuminate\Database\Eloquent\Collection $records) {

                        if ($records->isEmpty()) return;

                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('filament.pdfs.users_full', [
                            'users' => $records,
                        ])->setPaper('a4', 'portrait'); // portrait better for profiles

                        return response()->streamDownload(
                            fn () => print($pdf->output()),
                            'users-full-' . now()->format('Y-m-d_H-i-s') . '.pdf'
                        );
                    }),


                BulkAction::make('export_users_pdf')
                    ->label('Export Users PDF')
                    ->color('success')
                    ->icon('heroicon-o-document-arrow-down')
                    // ->requiresConfirmation()
                    ->modalHeading('Export Selected Users')
                    ->modalDescription('Generate a professional PDF report for selected users.')
                    ->action(function (Collection $records) {

                        if ($records->isEmpty()) {
                            return;
                        }

                        $pdf = Pdf::loadView('filament.pdfs.users', [
                            'users' => $records,
                        ])->setPaper('a4', 'landscape');

                        return response()->streamDownload(
                            fn () => print($pdf->output()),
                            'users-' . now()->format('Y-m-d_H-i-s') . '.pdf'
                        );
                    }),


                 BulkAction::make('oneTimeEmail')
                    ->label('One Time Email')
                    ->color('info')
                    ->icon('heroicon-s-at-symbol')
                    ->action(function (Collection $records) {

                      foreach( $records as $record ){
                        $data = [
                          'name' => $record->name,
                          'email' => $record->email,
                          'password' => 'MIC123456',
                        ];
                        Mail::to($record->email)->send(new OneTimeMail($data));
                      }

                      // $dan = \App\Models\User::where('id', 34)->first();
                      // $danData = [
                      //     'name' => $dan->name,
                      //     'email' => $dan->email,
                      //     'password' => 'MIC123456',
                      //   ];

                      // Mail::to($dan->email)->send(new OneTimeMail($danData));
                        
                    }),


                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
