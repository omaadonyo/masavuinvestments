<?php

namespace App\Filament\Resources\AnnualReturns\Pages;

use App\Filament\Resources\AnnualReturns\AnnualReturnResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnnualReturns extends ListRecords
{
    protected static string $resource = AnnualReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
