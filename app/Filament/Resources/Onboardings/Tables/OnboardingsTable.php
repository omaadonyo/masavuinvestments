<?php

namespace App\Filament\Resources\Onboardings\Tables;

use App\Mail\NewAccountCreation;
use App\Mail\OnboardingConfirmation;
use App\Models\Contribution;
use App\Models\Onboarding;
use App\Models\Transaction;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OnboardingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->emptyStateIcon('heroicon-o-bookmark')
            ->emptyStateDescription('Onboarding applications will appear here.')
            ->columns([
        
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('date_of_joining')
                    ->date()
                    ->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('place_of_residence')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email_address')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('national_id_passort_number')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('source_of_income')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('highest_level_of_education')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('profession')
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
                TextColumn::make('next_of_kin_name')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('relationship_next_of_kin')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('contacts_next_of_kin')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('active_bank_account_name')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('active_bank_account_number')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('national_id_photo')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                // ImageColumn::make('current_photo')
                //     ->searchable(),
                ToggleColumn::make('agree_tos')
                    ->searchable(),
                
                TextColumn::make('created_at')
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
            ],layout: FiltersLayout::Modal)
            ->recordActions([
                ActionGroup::make([

                    Action::make('view')
                    ->color('default')
                    ->icon('heroicon-s-eye')
                    ->modalContent(fn (Onboarding $record): View => view(
                        'filament.pages.actions.onboarding',
                        ['record' => $record],
                    ))->modalSubmitAction(false)->slideOver()->modalWidth('lg'),


                    Action::make('approve')
                        ->requiresConfirmation()
                        ->icon('heroicon-s-check')
                        ->color('success')
                        ->hidden(fn (Onboarding $record) => $record->status == 'approved')
                        ->action(function (Onboarding $record){
                        
                            $record->update(['status' => 'approved']);

                            // Notification::make()->title('Approved successfully')->success()->send();
                            // dd($record);
                                
                            $user = User::create([
                                'name' => $record->full_name,
                                'email' => $record->email_address,
                                'full_name' =>  $record->full_name,
                                'uuid' => Str::uuid(),
                                'phone_number' => $record->phone,
                                'application_status' => 'approved',
                                'status' => 'active',
                                'password' => Hash::make('MIC123456'),
                                'email_verified_at' => now(),
                                'member_account' => 0,
                                'date_of_birth' => $record->date_of_birth,
                                'date_of_joining' => $record->date_of_joining,
                                'place_of_residence' => $record->place_of_residence,
                                'email_address' => $record->email_address,
                                'national_id_passort_number' => $record->national_id_passort_number,
                                'source_of_income' => $record->email_addsource_of_incomeress,
                                'highest_level_of_education' => $record->highest_level_of_education,
                                'profession' => $record->profession,
                                'next_of_kin_name' => $record->next_of_kin_name,
                                'relationship_next_of_kin' => $record->relationship_next_of_kin,
                                'contacts_next_of_kin' => $record->contacts_next_of_kin,
                                'active_bank_account_name' => $record->active_bank_account_name,
                                'active_bank_account_number' => $record->active_bank_account_number,
                                'national_id_photo' => $record->national_id_photo,
                                'current_photo' => $record->current_photo,
                                'agree_tos' => $record->email_address,
                                // 'initial_investment' => $record->initial_investment,
                                'email_verified_at' => now()
                            ]);

                           

                            //add users balance to the account
                            $userAccount = \App\Models\User::where('id', $user->id)->first();
                            $userAccount->update([
                                'member_account' => ($userAccount->member_account + ($record->initial_investment - 4000))
                            ]);

                            //create target and update it
                            //update target milestone
                            $newTarget = \App\Models\Target::create(['user_id' => $user->id, 'title' => '2026 Contribution Goal', 'final_target' => 1200000, 'starts_on' => now(), 'status' => 'ongoing']);

                            $target = \App\Models\Target::where('id', $newTarget->id)->first();
                            $target->update([
                                'target_scores' => ($target->target_scores + ($record->initial_investment - 4000))
                            ]);

                            //update system account
                            $micAccount = \App\Models\MICAccount::where('id', 1)->first();
                            $micAccount->update([
                                'total_contributions' => ($micAccount->total_contributions + $record->initial_investment),
                                'managment_fees' => $micAccount->managment_fees + 4000
                            ]);

                            Notification::make()->title('Account balance credited successfully')->success()->send();

                             //add this contribution
                            $contribution = Contribution::create([
                                'user_id' => $user->id,
                                'reference' => 'TXN_CBN_'.rand(1000000, 10000000),
                                'amount' => ($record->initial_investment - 4000),
                                'managment_fee' => 4000,
                                'return_fee' => 0,
                                'total_deposit' => $record->initial_investment,
                                'payment_proof' => null,
                                'notes' => 'Initial Contribution',
                                'status' => 'approved', 
                                'approved_by' => auth()->id()
                            ]);

                            Notification::make()->title('Contribution added successfully')->success()->send();


                            Transaction::create([
                                'txn_id' => Str::uuid(),
                                'txn_reference' => $contribution->reference,
                                'user_id' => $contribution->user_id,
                                'txn_type' => 'contribution',
                                'total_deposit' => $contribution->total_deposit,
                                'amount' => $contribution->amount,
                                'management_fees' => $contribution->managment_fee,
                                'status' => $contribution->status,
                                'payment_proof' => null,
                                'return_fee' => 0,
                                'notes'  => $contribution->notes,
                                'approved_by' => $contribution->approved_by,
                                'reviewed_by' => null,
                            ]);

                            Notification::make()->title('Transaction recorded successfully')->success()->send();

                            //email client about confirmation
                            Mail::to($user->email)->send(new OnboardingConfirmation($user));
                            // email the client credentials amazing.chief23@gmail.com
                            Mail::to($user->email)->send(new NewAccountCreation($user));
                            Mail::to('amazing.chief23@gmail.com')->send(new NewAccountCreation($user));
                            Mail::to('masavuinvestmentclub@gmail.com')->send(new NewAccountCreation($user));


                        }),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
