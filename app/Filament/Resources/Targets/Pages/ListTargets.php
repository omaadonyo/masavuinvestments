<?php

namespace App\Filament\Resources\Targets\Pages;

use App\Filament\Resources\Targets\TargetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTargets extends ListRecords
{
    protected static string $resource = TargetResource::class;

    protected string $view = 'filament.pages.targets';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
