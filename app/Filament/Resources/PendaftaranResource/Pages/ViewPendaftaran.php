<?php

namespace App\Filament\Resources\PendaftaranResource\Pages;

use App\Filament\Resources\PendaftaranResource;
use Filament\Resources\Pages\Page;

class ViewPendaftaran extends Page
{
    protected static string $resource = PendaftaranResource::class;

    protected static string $view = 'filament.resources.pendaftaran-resource.pages.view-pendaftaran';
}
