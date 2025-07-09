<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Filament\Resources\SiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiswa extends EditRecord
{
    protected static string $resource = SiswaResource::class;

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
