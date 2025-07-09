<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    //

    protected $fillable = ['nama_pelajaran', 'deskripsi'];



    public function siswa()
{
    return $this->belongsToMany(User::class, 'mata_pelajaran_user');
}
}
