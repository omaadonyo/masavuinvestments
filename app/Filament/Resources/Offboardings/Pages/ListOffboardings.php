<?php

namespace App\Filament\Resources\Offboardings\Pages;

use App\Filament\Resources\Offboardings\OffboardingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class ListOffboardings extends ListRecords
{
    protected static string $resource = OffboardingResource::class;

    protected string $view = 'filament.pages.offboarding';

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
            'pending' => Tab::make()->icon(Heroicon::Bell)->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending')),
            'approved' => Tab::make()->icon(Heroicon::Check)->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'approved')),
            'review' => Tab::make()->icon('heroicon-s-shield-check')->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'review')),
            'rejected' => Tab::make()->icon('heroicon-s-x-mark')->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'rejected')),
        ];
    }
}
