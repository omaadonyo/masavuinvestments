<?php

namespace App\Filament\Resources\Offboardings\Tables;

use App\Mail\NewAccountCreation;
use App\Mail\OnboardingConfirmation;
use App\Models\Offboarding;
use App\Models\Transaction;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OffboardingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->emptyStateIcon('heroicon-o-bookmark')
            ->emptyStateDescription('Offboarding members will appear here.')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                SelectColumn::make('status')
                    ->options([
                        'pending' => 'pending',
                        'review' => 'review',
                        'approved' => 'approved',
                    ])->native(false),

                TextColumn::make('date_of_exit')
                    ->date()
                    ->sortable(),
                TextColumn::make('membership_duration')
                    ->badge(),
                TextColumn::make('role_in_club')
                    ->badge(),
                TextColumn::make('main_reason_leaving')
                    ->searchable(),
                TextColumn::make('overall_experience')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('rejoin_future')
                    ->badge(),
                TextColumn::make('recommend_to_others')
                    ->badge(),
                IconColumn::make('exit_confirmation')
                    ->boolean(),
                IconColumn::make('cooperation_confirmation')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                
                
                Action::make('approve')
                        ->requiresConfirmation()
                        ->icon('heroicon-s-check')
                        ->color('success')
                        ->hidden(fn (Offboarding $record) => $record->status == 'approved')
                        ->action(function (Offboarding $record){
                            

                            //add users balance to the account
                            $userAccount = \App\Models\User::where('id', $record->user_id)->first();
                            //check acc balance

                            if( $userAccount->member_account >= ($record->total_contribution + $record->total_contribution_interest) ) {

                                $userAccount->update([
                                    'member_account' => ($userAccount->member_account - ($record->total_contribution + $record->total_contribution_interest)),
                                    'email_verified_at' => now(),
                                    'application_status' => 'rejected',
                                    'status' => 'suspended',
                                    // 'deleted_at' => now()
                                ]);

                                //update system account
                                $micAccount = \App\Models\MICAccount::where('id', 1)->first();
                                $micAccount->update([
                                    'total_withdraw' => ($micAccount->total_withdraw + ($record->total_contribution + $record->total_contribution_interest)),
                                    'managment_fees' => $micAccount->managment_fees + $record->total_contribution_withdraw_charges
                                ]);

                                Notification::make()->title('Account balance credited successfully')->success()->send();

                                Transaction::create([
                                    'txn_id' => Str::uuid(),
                                    'txn_reference' => 'TXN_WDN_'.rand(1000000, 1000000000),
                                    'user_id' => $record->user_id,
                                    'txn_type' => 'withdrawal',
                                    'total_deposit' => ($record->total_contribution + $record->total_contribution_interest),
                                    'amount' => ($record->total_contribution + $record->total_contribution_interest + $record->total_contribution_withdraw_charges),
                                    'management_fees' => $record->total_contribution_withdraw_charges,
                                    'status' => 'approved',
                                    'payment_proof' => null,
                                    'return_fee' => 0,
                                    'notes'  => 'member withdrawal',
                                    'approved_by' => auth()->id(),
                                    'reviewed_by' => null,
                                ]);

                                $record->update(['status' => 'approved']);

                                Notification::make()->title('Transaction recorded successfully')->success()->send();

                                // //email client about confirmation
                                Mail::to($user->email)->send(new OnboardingConfirmation($user));
                                // // email the client credentials amazing.chief23@gmail.com
                                Mail::to($user->email)->send(new NewAccountCreation($user));
                                Mail::to('amazing.chief23@gmail.com')->send(new NewAccountCreation($user));
                                Mail::to('masavuinvestmentclub@gmail.com')->send(new NewAccountCreation($user));

                            } else {
                                Notification::make()->title('Insufficient account balance')->danger()->send();
                            }


                        }),

                EditAction::make(),

                ]),

            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
