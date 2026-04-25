<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Exports\UserExporter;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ImportAction::make()->importer(UserImporter::class)->icon('heroicon-s-cloud-arrow-up'),
            ExportAction::make()->exporter(UserExporter::class)->color('success')->icon('heroicon-s-cloud-arrow-down')->columnMappingColumns(4),
            CreateAction::make()->icon('heroicon-s-user-plus'),
        ];
    }

    public function getTabs(): array
    {
        //['pending', 'approved', 'review', 'rejected'
        return [
            'all' => Tab::make(),
            'Active' => Tab::make()->icon(Heroicon::Bell)->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'active')),
            'In-active' => Tab::make()->icon(Heroicon::Check)->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'in-active')),
            'Banned' => Tab::make()->icon('heroicon-s-shield-check')->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'banned')),
            'Suspended' => Tab::make()->icon('heroicon-s-x-mark')->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'suspended')),
        ];
    }
}
