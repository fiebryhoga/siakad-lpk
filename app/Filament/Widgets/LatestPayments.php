<?php

namespace App\Filament\Widgets;

use App\Models\Pembayaran;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPayments extends BaseWidget
{
    protected static ?int $limit = 5; // Pastikan ini tetap ada
    protected static ?string $heading = '5 Pembayaran Terbaru (Menunggu Konfirmasi)';
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                // PERBAIKI BAGIAN INI: Tambahkan ->limit(static::$limit) di sini
                Pembayaran::query()
                    ->where('status', 'pending')
                    ->latest()
                    ->limit(static::$limit) // <--- TAMBAHKAN BARIS INI
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Nama Siswa'),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal Upload')->since(),
                Tables\Columns\ImageColumn::make('file_bukti')->label('Bukti'),
                Tables\Columns\TextColumn::make('status')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'dikonfirmasi' => 'success',
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('konfirmasi')
                    ->label('Konfirmasi')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->action(function (Pembayaran $record) {
                        $record->status = 'dikonfirmasi';
                        $record->save();
                        \Filament\Notifications\Notification::make()->title('Pembayaran berhasil dikonfirmasi')->success()->send();
                    })
                    ->visible(fn (Pembayaran $record): bool => $record->status === 'pending'),
                Tables\Actions\ViewAction::make()->url(
                    fn (Pembayaran $record): string => \App\Filament\Resources\PembayaranResource::getUrl('view', ['record' => $record])
                ),
            ])
            ->defaultPaginationPageOption(5)
            ->paginated(false);
    }
}