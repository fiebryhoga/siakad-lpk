<?php

namespace App\Filament\Siswa\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MataPelajaranDiambilWidget extends BaseWidget
{
    protected static ?string $heading = 'Mata Pelajaran yang Anda Ambil';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                auth()->user()->mataPelajaranDiambil()->getQuery()
            )
            ->columns([
                Tables\Columns\TextColumn::make('nama_pelajaran')
                    ->label('Nama Mata Pelajaran'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi Singkat')
                    ->limit(50),
            ])
            ->actions([
                Tables\Actions\Action::make('hapus')
        ->label('Hapus')
        ->color('danger')
        ->icon('heroicon-o-trash')
        ->requiresConfirmation()
        ->action(function ($record) {
            auth()->user()->mataPelajaranDiambil()->detach($record->id);
            // Tambahkan redirect untuk me-refresh
            return redirect(request()->header('Referer'));
        }),
            ]);
    }
}