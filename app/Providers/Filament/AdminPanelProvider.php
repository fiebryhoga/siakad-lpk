<?php

namespace App\Providers\Filament;


use App\Filament\Resources\MataPelajaranResource;
use App\Filament\Resources\NilaiResource;
use App\Filament\Resources\PembayaranResource;
use App\Filament\Resources\PendaftaranResource; 
use App\Filament\Resources\SertifikatResource;
use App\Filament\Resources\SiswaResource;
use App\Filament\Resources\UserResource;
use App\Filament\Widgets\StatsOverviewWidget;
use App\Filament\Widgets\LatestRegistrations; 
use App\Filament\Widgets\LatestPayments;      

use Filament\Http\Middleware\Authenticate;
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

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')

            
            
            ->colors([
                'primary' => Color::Amber,
            ])
            ->resources([
                PendaftaranResource::class, 
                
                UserResource::class,
                PembayaranResource::class,
                MataPelajaranResource::class,
                NilaiResource::class,
                SertifikatResource::class,
            ])
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                StatsOverviewWidget::class,
                LatestRegistrations::class, 
                LatestPayments::class,      


            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
            ])

            ->brandName('Portal Staf Siakad')

            ->authMiddleware([
                Authenticate::class,
                'role:staf',
            ]);


    }
}