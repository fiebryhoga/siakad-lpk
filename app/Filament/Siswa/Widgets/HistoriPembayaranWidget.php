<?php

namespace App\Filament\Siswa\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Pembayaran;

class HistoriPembayaranWidget extends BaseWidget
{
    protected static ?string $heading = 'Riwayat Pembayaran Anda';

    protected static ?string $slug = 'app.filament.widgets.histori-pembayaran-widget';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Pembayaran::query()->where('user_id', auth()->user()?->id)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('file_bukti')
                    ->label('Bukti Pembayaran'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'dikonfirmasi' => 'success',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime(),
            ]);
    }
}
