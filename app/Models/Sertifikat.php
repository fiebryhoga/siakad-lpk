<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    //

    // app/Models/Sertifikat.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['user_id', 'judul_sertifikat', 'file_sertifikat', 'tanggal_diterbitkan'];
}
