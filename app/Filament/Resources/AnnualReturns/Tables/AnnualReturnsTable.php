<?php

namespace App\Filament\Resources\AnnualReturns\Tables;

use App\Filament\Tables\Columns\PhotoColumn;

use App\Mail\AnnualReturnsInterest;
use App\Models\AnnualReturn;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AnnualReturnsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('approvedBy.name')
                    ->numeric()
                    ->sortable(),
                PhotoColumn::make('user.avatar_url')
                    ->label('Photo')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->description(fn (AnnualReturn $ar) => $ar->user->phone_number)
                    ->numeric()
                    ->sortable(),
                TextColumn::make('year')
                    ->description(function (AnnualReturn $ar) { 
                        $c = \App\Models\Contribution::where('user_id', $ar->user_id)->whereYear('created_at', $ar->year)->sum('amount');
                        return 'UGX '.number_format($c);
                    })
                    ->searchable(),
                TextColumn::make('amount')
                    ->money('ugx')
                    ->label('Interest')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'success',
                        'pending' => 'primary',
                        'cancelled' => 'danger',
                    })
                    ->icon(fn (string $state): Heroicon => match ($state) {
                        'approved' => Heroicon::CheckCircle,
                        'pending' => Heroicon::MinusCircle,
                        'cancelled' => Heroicon::MinusCircle,
                    }),
                TextInputColumn::make('notes'),
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
                //
            ])
            ->recordActions([
                ActionGroup::make([

                    Action::make('approve')
                        ->icon('heroicon-s-check-circle')
                        ->color('success')
                        ->action(function (AnnualReturn $ar){

                        //update user account
                        $u = \App\Models\User::where('id', $ar->user_id)->first();
                        $u->update(['member_account' => $u->member_account + $ar->amount]);

                        //update record
                        $ar->update(['status' => 'approved' ]);

                        $totalContribution = \App\Models\Contribution::where('user_id', $ar->user_id)->whereYear('created_at', $ar->year)->sum('amount');

                        $data = [
                            'name' => $u->name,
                            'contribution_amount' => $totalContribution,
                            'annual_return_amount' => $ar->amount,
                            'notes' => $ar->notes,
                            'year' => $ar->year
                        ];


                          //create transcation record of the, plus activity
                            \App\Models\Transaction::create([
                                'txn_id' => Str::uuid(),
                                'txn_reference' => 'TXN_AR_'.rand(1000000, 1000000000),
                                'user_id' => $ar->user_id,
                                'txn_type' => 'annual returns',
                                'total_deposit' => $ar->amount,
                                'amount' => $ar->amount,
                                'management_fees' => 0,
                                'status' => 'approved',
                                'payment_proof' => $ar->payment_proof ?? null,
                                'return_fee' => $ar->amount,
                                'notes'  => $ar->notes,
                                'approved_by' => $ar->approved_by,
                                'reviewed_by' => null,
                            ]);

                        //send email
                        Mail::to($u->email)->send(new AnnualReturnsInterest($data));
                        Mail::to('masavuinvestmentclub@gmail.com')->send(new AnnualReturnsInterest($data));
                        Mail::to('amazing.chief23@gmail.com')->send(new AnnualReturnsInterest($data));
                        
                        Notification::make()->title('Saved successfully')->success()->send();

                        }),

                    ViewAction::make(),
                    EditAction::make(),

                ]),
                
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
