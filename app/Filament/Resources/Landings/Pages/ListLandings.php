<?php

namespace App\Filament\Resources\Landings\Pages;

use App\Filament\Resources\Landings\LandingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLandings extends ListRecords
{
    protected static string $resource = LandingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
