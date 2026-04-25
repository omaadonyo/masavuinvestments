<?php

namespace App\Filament\Resources\Landings\Pages;

use App\Filament\Resources\Landings\LandingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLanding extends EditRecord
{
    protected static string $resource = LandingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
        ];
    }
}
