<?php

namespace App\Filament\Resources\Landings;

use App\Filament\Resources\Landings\Pages\CreateLanding;
use App\Filament\Resources\Landings\Pages\EditLanding;
use App\Filament\Resources\Landings\Pages\ListLandings;
use App\Filament\Resources\Landings\Schemas\LandingForm;
use App\Filament\Resources\Landings\Tables\LandingsTable;
use App\Models\Landing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LandingResource extends Resource
{
    protected static ?string $model = Landing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return LandingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LandingsTable::configure($table);
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
            'index' => ListLandings::route('/'),
            'create' => CreateLanding::route('/create'),
            'edit' => EditLanding::route('/{record}/edit'),
        ];
    }
}
