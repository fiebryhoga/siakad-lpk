<?php

namespace App\Filament\Resources\SertifikatResource\Pages;

use App\Filament\Resources\SertifikatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSertifikat extends EditRecord
{
    protected static string $resource = SertifikatResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
    
    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),

            Actions\DeleteAction::make()
                ->label('Hapus'),

            Actions\Action::make('kembali')
                ->label('Kembali')
                ->color('gray')
                ->url(static::getResource()::getUrl('index')),
        ];
    }
}
