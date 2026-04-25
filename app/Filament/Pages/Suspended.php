<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Suspended extends Page
{
    protected string $view = 'filament.pages.suspended';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = '';


    public function getLayout(): string
    {
        return 'filament-panels::components.layout.home';
    }
}
