<?php

namespace App\Filament\Resources\MicAccounts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MicAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('total_contributions')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('managment_fees')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('withdraw_charges')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
