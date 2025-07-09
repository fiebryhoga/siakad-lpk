<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/PendaftaranFactory.php
public function definition(): array
{
    return [
        'email' => fake()->unique()->safeEmail(),
        'password' => 'password', // Kita set password default
        'nama_lengkap' => fake()->name(),
        'nama_panggilan' => fake()->firstName(),
        'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
        'tempat_lahir' => fake()->city(),
        'tanggal_lahir' => fake()->date(),
        'agama' => 'Islam',
        'status' => 'Belum Menikah',
        'alamat' => fake()->address(),
        'nomor_telp' => fake()->phoneNumber(),
        'nomor_telp_orang_tua' => fake()->phoneNumber(),
        'pendidikan_terakhir' => 'SMA Sederajat',
        'asal_sekolah' => fake()->company() . ' High School',
        'status_pendaftaran' => 'pending',
    ];
}
}
