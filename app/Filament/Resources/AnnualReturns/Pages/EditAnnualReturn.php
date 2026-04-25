<?php

namespace App\Filament\Resources\AnnualReturns\Pages;

use App\Filament\Resources\AnnualReturns\AnnualReturnResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAnnualReturn extends EditRecord
{
    protected static string $resource = AnnualReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
