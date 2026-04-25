<?php

namespace App\Filament\Resources\Targets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TargetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('user_id')
                //     ->numeric()
                //     ->default(null),
                TextInput::make('title')
                    ->default(null),
                    
                TextInput::make('final_target')
                    ->required()
                    ->numeric()
                    ->default(0),

                DatePicker::make('starts_on')
                    ->required()
                    ->native(false)
                    ->label('Start Date'),

                // TextInput::make('target_balance')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                Select::make('status')
                    ->options(['ongoing' => 'Ongoing', 'complete' => 'Complete'])
                    ->default('ongoing')
                    ->native(false)
                    ->required(),
            ]);
    }
}
