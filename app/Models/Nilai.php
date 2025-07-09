<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

// Relasi ke MataPelajaran
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

// Relasi ke User (Guru)
    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    protected $fillable = ['user_id', 'mata_pelajaran_id', 'nilai', 'guru_id'];
}
