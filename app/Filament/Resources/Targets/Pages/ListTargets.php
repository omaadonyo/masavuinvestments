<?php

namespace App\Filament\Resources\Targets\Pages;

use App\Filament\Resources\Targets\TargetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class ListTargets extends ListRecords
{
    protected static string $resource = TargetResource::class;

    protected string $view = 'filament.pages.targets';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        //['pending', 'approved', 'review', 'rejected'
        return [
            'all' => Tab::make(),
            'completed' => Tab::make()->icon(Heroicon::Check)->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'completed')),
            'ongoing' => Tab::make()->icon('heroicon-s-shield-check')->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'ongoing')),
        ];
    }
}
