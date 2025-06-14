<?php

namespace App\Providers\Filament;

use App\Models\Company;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Storage;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // Retrieve the logo dynamically from the Company model
        $company = Company::first(); // Adjust query as needed
        $logoPath = $this->getLogoPath($company);

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile()
            ->brandName("TechDoko")
            ->brandLogo($logoPath)
            ->authGuard('admin')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    private function getLogoPath(?Company $company): string
    {
        // Default fallback logo
        $defaultLogo = asset('logo.png');

        // Check if company exists and has a logo
        if (!$company || empty($company->logo)) {
            return $defaultLogo;
        }

        // Check if logo is a full URL or a relative path
        if (filter_var($company->logo, FILTER_VALIDATE_URL)) {
            return $company->logo;
        }

        // Assume logo is stored in the public disk (or adjust for your storage disk)
        $logoPath = Storage::disk('public')->url($company->logo);

        // Verify if the logo file exists
        if (Storage::disk('public')->exists($company->logo)) {
            return $logoPath;
        }

        // Fallback to default logo if file doesn't exist
        return $defaultLogo;
    }
}
