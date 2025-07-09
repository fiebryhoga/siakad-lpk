<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Pendaftaran;

class PendaftaranSeeder extends Seeder
{
    public function run(): void
    {
        $namaPendaftar = ['Lina Marlina', 'Mega Wati', 'Nanda Putra', 'Olivia Putri', 'Putra Wijaya', 'Ratna Juwita', 'Rian Hidayat', 'Sari Puspita', 'Toni Kurniawan', 'Vina Melati'];
        foreach ($namaPendaftar as $nama) {
            Pendaftaran::create([
                'email' => strtolower(str_replace(' ', '.', $nama)) . '@email.com', 'password' => 'password', 'nama_lengkap' => $nama, 'nama_panggilan' => explode(' ', $nama)[0], 'jenis_kelamin' => 'Perempuan', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '2001-05-10', 'agama' => 'Islam', 'status' => 'Belum Menikah', 'alamat' => 'Jl. Kemerdekaan No. 20', 'nomor_telp' => '081211112222', 'nomor_telp_orang_tua' => '081233334444', 'pendidikan_terakhir' => 'SMA', 'asal_sekolah' => 'SMA Harapan Bangsa', 'status_pendaftaran' => 'pending',
            ]);
        }
    }
}