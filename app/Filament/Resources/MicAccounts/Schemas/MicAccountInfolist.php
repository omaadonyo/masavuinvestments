<?php

namespace App\Filament\Resources\MicAccounts\Schemas;

use App\Models\MicAccount;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MicAccountInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('total_contributions')
                    ->numeric(),
                TextEntry::make('managment_fees')
                    ->numeric(),
                TextEntry::make('withdraw_charges')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (MicAccount $record): bool => $record->trashed()),
            ]);
    }
}
