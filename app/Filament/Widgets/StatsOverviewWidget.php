<?php

namespace App\Filament\Widgets;

use App\Models\Nilai;         // Model Nilai
use App\Models\User;          // Model User
use App\Models\Siswa;         // Model Siswa (baru ditambahkan)
use App\Models\Pendaftaran;   // Model Pendaftaran (baru ditambahkan)
use App\Models\Pembayaran;    // Model Pembayaran (baru ditambahkan)
use App\Models\MataPelajaran; // Model MataPelajaran (baru ditambahkan)
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pengguna', User::count())
                ->description('Jumlah seluruh akun pengguna')
                ->icon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Total Siswa', Siswa::count()) // Statistik baru
                ->description('Jumlah siswa aktif terdaftar')
                ->icon('heroicon-o-academic-cap') // Ikon topi wisuda
                ->color('info'), // Warna biru muda

            Stat::make('Total Penilaian', Nilai::count())
                ->description('Jumlah data penilaian siswa')
                ->icon('heroicon-o-document-text')
                ->color('success'),

            Stat::make('Pendaftar Pending', Pendaftaran::where('status_pendaftaran', 'pending')->count()) // Statistik baru
                ->description('Pendaftar menunggu persetujuan')
                ->icon('heroicon-o-user-plus') // Ikon tambah pengguna
                ->color('warning'), // Warna kuning

            Stat::make('Pembayaran Pending', Pembayaran::where('status', 'pending')->count()) // Statistik baru
                ->description('Pembayaran menunggu konfirmasi')
                ->icon('heroicon-o-currency-dollar') // Ikon mata uang
                ->color('danger'), // Warna merah

            Stat::make('Total Mata Pelajaran', MataPelajaran::count()) // Statistik baru
                ->description('Jumlah mata pelajaran yang tersedia')
                ->icon('heroicon-o-book-open') // Ikon buku terbuka
                ->color('gray'), // Warna abu-abu
        ];
    }
}