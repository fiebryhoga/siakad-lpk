<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Kita tidak perlu 'user_id' di sini karena kita mengisinya manual di seeder
            'nama_lengkap'         => fake()->name(),
            'nama_panggilan'       => fake()->firstName(),
            'jenis_kelamin'        => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir'         => fake()->city(),
            'tanggal_lahir'        => fake()->date(),
            'agama'                => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'status'               => 'Aktif',
            'alamat'               => fake()->address(),
            'tinggi_badan'         => fake()->numberBetween(120, 180),
            'berat_badan'          => fake()->numberBetween(20, 180),
            'nomor_telp'           => fake()->phoneNumber(),
            'nomor_telp_orang_tua' => fake()->phoneNumber(),
            'pendidikan_terakhir'  => 'SMA',
            'asal_sekolah'         => fake()->company() . ' School',
        ];
    }
}
