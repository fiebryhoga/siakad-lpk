<?php

namespace App\Providers\Filament;

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

class SiswaPanelProvider extends PanelProvider
{


public function panel(Panel $panel): Panel
{
    return $panel
        ->id('siswa')
        ->path('siswa')
        
        ->colors([
            'primary' => Color::Green,
        ])
        
        ->resources([
            \App\Filament\Resources\NilaiResource::class,
            \App\Filament\Resources\SertifikatResource::class,
            
        ])
        
        ->pages([
            \App\Filament\Siswa\Pages\UploadPembayaran::class,
                \App\Filament\Siswa\Pages\UploadPembayaran::class,
                \App\Filament\Siswa\Pages\EntriMataPelajaran::class, 
            
        ])
        
        ->widgets([
            \App\Filament\Siswa\Widgets\HistoriPembayaranWidget::class,
            \App\Filament\Siswa\Widgets\MataPelajaranDiambilWidget::class,
        ])
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
            'role:siswa',
        ])

        ->brandName('Portal Siswa Siakad'); 
}
}
