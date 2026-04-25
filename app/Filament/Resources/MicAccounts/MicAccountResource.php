<?php

namespace App\Filament\Resources\MicAccounts;

use App\Filament\Resources\MicAccounts\Pages\CreateMicAccount;
use App\Filament\Resources\MicAccounts\Pages\EditMicAccount;
use App\Filament\Resources\MicAccounts\Pages\ListMicAccounts;
use App\Filament\Resources\MicAccounts\Pages\ViewMicAccount;
use App\Filament\Resources\MicAccounts\Schemas\MicAccountForm;
use App\Filament\Resources\MicAccounts\Schemas\MicAccountInfolist;
use App\Filament\Resources\MicAccounts\Tables\MicAccountsTable;
use App\Models\MICAccount;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MicAccountResource extends Resource
{
    protected static ?string $model = MICAccount::class;
    
    protected static ?string $navigationLabel = 'Account';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-circle-stack';


    public static function form(Schema $schema): Schema
    {
        return MicAccountForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MicAccountInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MicAccountsTable::configure($table);
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
            'index' => ListMicAccounts::route('/'),
            'create' => CreateMicAccount::route('/create'),
            'view' => ViewMicAccount::route('/{record}'),
            'edit' => EditMicAccount::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

}
