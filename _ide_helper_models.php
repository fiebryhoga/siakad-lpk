<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama_pelajaran
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MataPelajaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MataPelajaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MataPelajaran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MataPelajaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MataPelajaran whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MataPelajaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MataPelajaran whereNamaPelajaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MataPelajaran whereUpdatedAt($value)
 */
	class MataPelajaran extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $user_id
 * @property int $mata_pelajaran_id
 * @property int $nilai
 * @property int $guru_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $guru
 * @property-read \App\Models\MataPelajaran $mataPelajaran
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai whereMataPelajaranId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Nilai whereUserId($value)
 */
	class Nilai extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $user_id
 * @property string $file_bukti
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereFileBukti($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pembayaran whereUserId($value)
 */
	class Pembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $user_id
 * @property string $judul_sertifikat
 * @property string $file_sertifikat
 * @property string $tanggal_diterbitkan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat whereFileSertifikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat whereJudulSertifikat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat whereTanggalDiterbitkan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sertifikat whereUserId($value)
 */
	class Sertifikat extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama_lengkap
 * @property string $nama_panggilan
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $agama
 * @property string $status
 * @property string $alamat
 * @property int|null $tinggi_badan
 * @property int|null $berat_badan
 * @property string $nomor_telp
 * @property string $nomor_telp_orang_tua
 * @property string $pendidikan_terakhir
 * @property string $asal_sekolah
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SiswaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereAsalSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereBeratBadan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereNamaLengkap($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereNamaPanggilan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereNomorTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereNomorTelpOrangTua($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa wherePendidikanTerakhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereTinggiBadan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Siswa whereUserId($value)
 */
	class Siswa extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pembayaran> $pembayarans
 * @property-read int|null $pembayarans_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sertifikat> $sertifikats
 * @property-read int|null $sertifikats_count
 * @property-read \App\Models\Siswa|null $siswa
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

