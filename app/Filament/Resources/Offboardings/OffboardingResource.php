<?php

namespace App\Filament\Resources\Offboardings;

use App\Filament\Resources\Offboardings\Pages\CreateOffboarding;
use App\Filament\Resources\Offboardings\Pages\EditOffboarding;
use App\Filament\Resources\Offboardings\Pages\ListOffboardings;
use App\Filament\Resources\Offboardings\Schemas\OffboardingForm;
use App\Filament\Resources\Offboardings\Tables\OffboardingsTable;
use App\Models\Offboarding;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OffboardingResource extends Resource
{
    protected static ?string $model = Offboarding::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-x-mark';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return OffboardingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OffboardingsTable::configure($table);
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
            'index' => ListOffboardings::route('/'),
            'create' => CreateOffboarding::route('/create'),
            'edit' => EditOffboarding::route('/{record}/edit'),
        ];
    }
}
