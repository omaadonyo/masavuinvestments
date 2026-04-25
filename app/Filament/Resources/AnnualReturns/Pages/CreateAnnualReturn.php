<?php

namespace App\Filament\Resources\AnnualReturns\Pages;

use App\Filament\Resources\AnnualReturns\AnnualReturnResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAnnualReturn extends CreateRecord
{
    protected static string $resource = AnnualReturnResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['approved_by'] = auth()->id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
