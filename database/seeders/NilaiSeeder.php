<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Nilai;

class NilaiSeeder extends Seeder
{
    public function run(): void
    {
        $siswaAktif = User::where('role', 'siswa')->get();
        $guruIds = User::where('role', 'guru')->pluck('id');

        foreach ($siswaAktif as $siswa) {
            foreach ($siswa->mataPelajaranDiambil as $mapel) {
                Nilai::create([
                    'user_id' => $siswa->id,
                    'mata_pelajaran_id' => $mapel->id,
                    'nilai' => rand(75, 98),
                    'guru_id' => $guruIds->random(),
                ]);
            }
        }
    }
}