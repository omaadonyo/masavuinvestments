<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class Home extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::CursorArrowRipple;
    
    protected string $view = 'filament.pages.home';

    protected static ?string $navigationLabel = 'Home';

    protected static ?string $title = '';

    protected static ?string $slug = 'home';

    public function getLayout(): string
    {
        return 'filament-panels::components.layout.home';
    }
}
