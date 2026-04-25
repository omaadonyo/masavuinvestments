<?php

namespace App\Filament\Resources\Contributions;

use App\Filament\Resources\Contributions\Pages\CreateContribution;
use App\Filament\Resources\Contributions\Pages\EditContribution;
use App\Filament\Resources\Contributions\Pages\ListContributions;
use App\Filament\Resources\Contributions\Schemas\ContributionForm;
use App\Filament\Resources\Contributions\Tables\ContributionsTable;
use App\Models\Contribution;
use BackedEnum;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ContributionResource extends Resource
{
    protected static ?string $model = Contribution::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Plus;

    protected static ?int $navigationSort = 1;

    protected static string | UnitEnum | null $navigationGroup = 'Financials';

    protected static ?string $recordTitleAttribute = 'reference';

    public static function form(Schema $schema): Schema
    {
        return ContributionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContributionsTable::configure($table);
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
            'index' => ListContributions::route('/'),
            'create' => CreateContribution::route('/create'),
            'edit' => EditContribution::route('/{record}/edit'),
        ];
    }

    // public static function getNavigationBadge(): ?string
    // {
    //     if( auth()->user()->is_admin == true ){
    //         return parent::getEloquentQuery()->count();
    //     } else {
    //         return parent::getEloquentQuery()->where('user_id', auth()->id())->count();
    //     }
    // }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // public static function getEloquentQuery(): Builder
    // {

    //     if( auth()->user()->is_admin == true ){
    //         return parent::getEloquentQuery();
    //     } else {
    //         return parent::getEloquentQuery()->where('user_id', auth()->id());;
    //     }
        
    // }
}
