<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Hash;

class UserDanSiswaSeeder extends Seeder
{
    public function run(): void
    {
        // === BUAT STAF ===
        User::create([ 'name' => 'Admin Utama', 'email' => 'admin@lpk.com', 'password' => Hash::make('password'), 'role' => 'staf' ]);
        User::create([ 'name' => 'Staf Budi', 'email' => 'budi.staf@lpk.com', 'password' => Hash::make('password'), 'role' => 'staf' ]);

        // === BUAT GURU ===
        $guru1 = User::create([ 'name' => 'Ani Mardiana', 'email' => 'ani.guru@lpk.com', 'password' => Hash::make('password'), 'role' => 'guru' ]);
        $guru2 = User::create([ 'name' => 'Eko Prasetyo', 'email' => 'eko.guru@lpk.com', 'password' => Hash::make('password'), 'role' => 'guru' ]);

        // === BUAT 10 SISWA AKTIF ===
        $namaSiswa = ['Budi Santoso', 'Citra Lestari', 'Dewi Anggraini', 'Eka Fitriani', 'Fajar Nugroho', 'Gita Permata', 'Hadi Wirawan', 'Indah Cahyani', 'Joko Susilo', 'Kartika Sari'];
        $siswas = [];
        foreach ($namaSiswa as $nama) {
            $email = strtolower(str_replace(' ', '.', $nama)) . '@lpk.com';
            $user = User::create([ 'name' => $nama, 'email' => $email, 'password' => Hash::make('password'), 'role' => 'siswa' ]);
            Siswa::create([
                'user_id' => $user->id,
                'nama_lengkap' => $nama, 'nama_panggilan' => explode(' ', $nama)[0], 'jenis_kelamin' => 'Laki-laki', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '2000-01-01', 'agama' => 'Islam', 'status' => 'Belum Menikah', 'alamat' => 'Jl. Merdeka No. 10', 'nomor_telp' => '08123456789', 'nomor_telp_orang_tua' => '08129876543', 'pendidikan_terakhir' => 'SMA', 'asal_sekolah' => 'SMA Negeri 1',
            ]);
            $siswas[] = $user;
        }

        // === DAFTARKAN SISWA KE MATA PELAJARAN ===
        $allMapelIds = MataPelajaran::pluck('id');
        foreach ($siswas as $siswa) {
            // Setiap siswa mengambil 2 atau 3 mata pelajaran acak
            $mapelUntukSiswa = $allMapelIds->random(rand(2, 3));
            $siswa->mataPelajaranDiambil()->attach($mapelUntukSiswa);
        }
    }
}