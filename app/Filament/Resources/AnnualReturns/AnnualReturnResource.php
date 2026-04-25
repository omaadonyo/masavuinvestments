<?php

namespace App\Filament\Resources\AnnualReturns;

use App\Filament\Resources\AnnualReturns\Pages\CreateAnnualReturn;
use App\Filament\Resources\AnnualReturns\Pages\EditAnnualReturn;
use App\Filament\Resources\AnnualReturns\Pages\ListAnnualReturns;
use App\Filament\Resources\AnnualReturns\Schemas\AnnualReturnForm;
use App\Filament\Resources\AnnualReturns\Tables\AnnualReturnsTable;
use App\Models\AnnualReturn;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AnnualReturnResource extends Resource
{
    protected static ?string $model = AnnualReturn::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDays;

    protected static string | UnitEnum | null $navigationGroup = 'Returns';

    protected static ?string $recordTitleAttribute = 'year';

    public static function form(Schema $schema): Schema
    {
        return AnnualReturnForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnnualReturnsTable::configure($table);
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
            'index' => ListAnnualReturns::route('/'),
            'create' => CreateAnnualReturn::route('/create'),
            'edit' => EditAnnualReturn::route('/{record}/edit'),
        ];
    }
}
