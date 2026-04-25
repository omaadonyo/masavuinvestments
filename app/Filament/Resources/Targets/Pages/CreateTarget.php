<?php

namespace App\Filament\Resources\Targets\Pages;

use App\Filament\Resources\Targets\TargetResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Carbon;

class CreateTarget extends CreateRecord
{
    protected static string $resource = TargetResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        // $data['starts_on'] = now();

        $data['ends_on'] = Carbon::parse($data['starts_on'])->addDays(365);


        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Target added successfully';
    }
}
