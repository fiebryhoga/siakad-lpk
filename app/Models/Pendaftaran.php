<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- TAMBAHKAN INI
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory; // <-- DAN TAMBAHKAN INI

    // Properti fillable agar bisa diisi oleh factory
    protected $fillable = [
        'email',
        'password',
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status',
        'alamat',
        'tinggi_badan',
        'berat_badan',
        'nomor_telp',
        'nomor_telp_orang_tua',
        'pendidikan_terakhir',
        'asal_sekolah',
        'status_pendaftaran',
    ];
}