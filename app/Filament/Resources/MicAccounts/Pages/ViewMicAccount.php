<?php

namespace App\Filament\Resources\MicAccounts\Pages;

use App\Filament\Resources\MicAccounts\MicAccountResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMicAccount extends ViewRecord
{
    protected static string $resource = MicAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
