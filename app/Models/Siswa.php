<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Siswa extends Model
{
    //

    use HasFactory; // <-- Pastikan ini ada


    // app/Models/Siswa.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id', 'nama_lengkap', 'nama_panggilan', 'jenis_kelamin', 
        'tempat_lahir', 'tanggal_lahir', 'agama', 'status', 'alamat', 
        'tinggi_badan', 'berat_badan', 'nomor_telp', 'nomor_telp_orang_tua', 
        'pendidikan_terakhir', 'asal_sekolah'
    ];
}
