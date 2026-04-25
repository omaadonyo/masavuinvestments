<?php

namespace App\Filament\Resources\Onboardings\Pages;

use App\Filament\Resources\Onboardings\OnboardingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOnboarding extends CreateRecord
{
    protected static string $resource = OnboardingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['initial_investment'] = 100000;

        // $data['starts_on'] = now();

        // $data['ends_on'] = $data['starts_on'] + '30';


        return $data;
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Onboard added successfully';
    }
}
