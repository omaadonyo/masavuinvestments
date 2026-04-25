<?php

namespace App\Providers\Filament;

use App\Filament\Pages\EditProfile;
use App\Http\Middleware\CheckUserStatus;
use Filament\Actions\Action;
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Hammadzafar05\MobileBottomNav\MobileBottomNav;
use Hammadzafar05\MobileBottomNav\MobileBottomNavItem;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationItem;

class AccountPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $landing = \App\Models\Landing::find(1);

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            // ->registration()
            ->topbar(false)
            ->passwordReset()
            ->emailVerification()
            ->darkMode(true)
            ->profile(EditProfile::class)
            ->brandName($landing->brandname ?? 'MIC' )
            ->brandLogo('/storage/'.$landing->logo ?? '/mic.jpg')
            ->favicon('/storage/'.$landing->favicon ?? '/mic.jpg')
            ->brandLogoHeight('3.5rem')
            ->emailChangeVerification()
            ->sidebarCollapsibleOnDesktop()
            ->databaseNotifications()
            ->font('Inter')
            ->spa()
            ->resources([
                config('filament-logger.activity_resource'),
            ])
            ->plugins([
                MobileBottomNav::make()->fromNavigation(3)->items([
                    MobileBottomNavItem::make('Home')
                        ->icon('heroicon-o-home')
                        ->activeIcon('heroicon-s-home')
                        ->url('/admin')
                        ->isActive(fn () => request()->is('account')),
                    MobileBottomNavItem::make('Contribution')
                        ->icon('heroicon-o-plus')
                        ->url('/admin/contributions/create'),
                    MobileBottomNavItem::make('Profile')
                        ->icon('heroicon-o-user')
                        ->url('/admin/profile'),
                ]),
            ])
            ->multiFactorAuthentication([
                AppAuthentication::make(),
            ])
            ->userMenuItems([
                Action::make('Dashboard')
                    ->url('/admin')
                    ->icon('heroicon-s-computer-desktop'),
                // ...
            ])
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                CheckUserStatus::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
