<?php

namespace App\Filament\Resources\Onboardings;

use App\Filament\Resources\Onboardings\Pages\CreateOnboarding;
use App\Filament\Resources\Onboardings\Pages\EditOnboarding;
use App\Filament\Resources\Onboardings\Pages\ListOnboardings;
use App\Filament\Resources\Onboardings\Schemas\OnboardingForm;
use App\Filament\Resources\Onboardings\Tables\OnboardingsTable;
use App\Models\Onboarding;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class OnboardingResource extends Resource
{
    protected static ?string $model = Onboarding::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowPath;

    protected static string | UnitEnum | null $navigationGroup = 'Financials';

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function form(Schema $schema): Schema
    {
        return OnboardingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnboardingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOnboardings::route('/'),
            'create' => CreateOnboarding::route('/create'),
            'edit' => EditOnboarding::route('/{record}/edit'),
        ];
    }

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return auth()->user()->is_admin == true;
    // }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
