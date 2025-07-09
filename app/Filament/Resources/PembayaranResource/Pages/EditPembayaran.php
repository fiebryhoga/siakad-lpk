<?php

namespace App\Filament\Resources\PembayaranResource\Pages;

use App\Filament\Resources\PembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPembayaran extends EditRecord
{
    protected static string $resource = PembayaranResource::class;

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
