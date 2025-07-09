<?php

namespace App\Filament\Resources\NilaiResource\Pages;

use App\Filament\Resources\NilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNilai extends EditRecord
{
    protected static string $resource = NilaiResource::class;

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
