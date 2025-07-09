<?php

namespace App\Filament\Widgets;

use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;

class LatestRegistrations extends BaseWidget
{
    // Batas jumlah item yang ditampilkan di widget (misal: 5 pendaftaran terbaru)
    protected static ?int $limit = 5; // Pastikan ini tetap ada

    protected static ?string $heading = '5 Pendaftaran Terbaru (Menunggu Persetujuan)';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                // PERBAIKI BAGIAN INI: Tambahkan ->limit(static::$limit) di sini
                Pendaftaran::query()
                    ->where('status_pendaftaran', 'pending')
                    ->latest()
                    ->limit(static::$limit) // <--- TAMBAHKAN BARIS INI
            )
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Pendaftar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email Pendaftar'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->since(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat Detail')
                    ->url(
                        fn (Pendaftaran $record): string => \App\Filament\Resources\PendaftaranResource::getUrl('view', ['record' => $record])
                    ),
                Tables\Actions\Action::make('setujui')
                    ->label('Setujui')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Pendaftaran $record) {
                        $user = User::create([
                            'name' => $record->nama_lengkap,
                            'email' => $record->email,
                            'password' => Hash::make($record->password),
                            'role' => 'siswa',
                        ]);

                        Siswa::create([
                            'user_id' => $user->id,
                            'nama_lengkap' => $record->nama_lengkap,
                            'nama_panggilan' => $record->nama_panggilan,
                            'jenis_kelamin' => $record->jenis_kelamin,
                            'tempat_lahir' => $record->tempat_lahir,
                            'tanggal_lahir' => $record->tanggal_lahir,
                            'agama' => $record->agama,
                            'status' => 'Aktif',
                            'alamat' => $record->alamat,
                            'tinggi_badan' => $record->tinggi_badan,
                            'berat_badan' => $record->berat_badan,
                            'nomor_telp' => $record->nomor_telp,
                            'nomor_telp_orang_tua' => $record->nomor_telp_orang_tua,
                            'pendidikan_terakhir' => $record->pendidikan_terakhir,
                            'asal_sekolah' => $record->asal_sekolah,
                        ]);

                        $record->delete();

                        Notification::make()
                            ->title('Pendaftar berhasil disetujui dan dipindahkan ke data siswa!')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (Pendaftaran $record): bool => $record->status_pendaftaran === 'pending'),
            ])
            ->bulkActions([])
            ->defaultPaginationPageOption(5)
            ->paginated(false);
    }
}