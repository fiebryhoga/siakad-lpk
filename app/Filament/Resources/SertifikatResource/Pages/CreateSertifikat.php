<?php

namespace App\Filament\Resources\SertifikatResource\Pages;

use App\Filament\Resources\SertifikatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSertifikat extends CreateRecord
{
    protected static string $resource = SertifikatResource::class;

    /**
     * Override this method to define where to redirect after creation.
     */
    protected function getRedirectUrl(): string
    {
        
        return $this->getResource()::getUrl('index');
    }
}
