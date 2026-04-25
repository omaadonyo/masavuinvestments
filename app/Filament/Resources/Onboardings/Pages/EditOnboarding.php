<?php

namespace App\Filament\Resources\Onboardings\Pages;

use App\Filament\Resources\Onboardings\OnboardingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOnboarding extends EditRecord
{
    protected static string $resource = OnboardingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
