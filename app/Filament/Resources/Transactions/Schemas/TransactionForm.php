<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
 
                TextInput::make('txn_reference')
                    ->required(),
                Select::make('user_id')
                    ->options(\App\Models\User::all()->pluck('name', 'id'))
                    ->label('Member')
                    ->searchable(),
                Select::make('txn_type')
                    ->options([
                        'contribution' => 'contribution',
                        'withdraw' => 'withdraw',
                        'interest' => 'interest',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('transaction')
                    ->default(null),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('management_fees')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'review' => 'Review',
                        'rejected' => 'Rejected',
                    ])->native(false)
                    ->default('pending')
                    ->required(),
                TextInput::make('notes')
                    ->default(null),

                Select::make('approved_by')
                    ->options(\App\Models\User::where('is_admin', true)->pluck('name', 'id'))
                    ->label('Member')
                    ->searchable()
                    ->native(false),

                Select::make('reviewed_by')
                    ->options(\App\Models\User::where('is_admin', true)->pluck('name', 'id'))
                    ->label('Member')
                    ->searchable()
                    ->native(false),
            ]);
    }
}
