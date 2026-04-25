<?php

namespace App\Filament\Resources\MicAccounts\Pages;

use App\Filament\Resources\MicAccounts\MicAccountResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMicAccounts extends ListRecords
{
    protected static string $resource = MicAccountResource::class;


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
