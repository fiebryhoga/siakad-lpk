<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

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