<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        $mataPelajaran = [
            ['nama_pelajaran' => 'Dasar Komputer & MS Office', 'deskripsi' => 'Pengenalan dasar-dasar komputer dan Microsoft Office.'],
            ['nama_pelajaran' => 'Bahasa Inggris untuk Pemula', 'deskripsi' => 'Percakapan dasar dan tata bahasa Bahasa Inggris.'],
            ['nama_pelajaran' => 'Desain Grafis dengan Canva', 'deskripsi' => 'Membuat desain visual menarik menggunakan Canva.'],
            ['nama_pelajaran' => 'Akuntansi Dasar', 'deskripsi' => 'Prinsip dasar akuntansi dan pembukuan.'],
            ['nama_pelajaran' => 'Manajemen Proyek', 'deskripsi' => 'Pengenalan metodologi manajemen proyek.'],
        ];

        foreach ($mataPelajaran as $mapel) {
            MataPelajaran::create($mapel);
        }
    }
}