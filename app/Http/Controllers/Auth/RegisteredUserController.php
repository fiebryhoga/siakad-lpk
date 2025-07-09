<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Pendaftaran;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nama_panggilan' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('pendaftarans', 'email'),
                Rule::unique('users', 'email'),
            ],
            
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date'],
            'agama' => ['required'],
            'status' => ['required'],
            'alamat' => ['required'],
            'tinggi_badan' => ['nullable', 'integer'],
            'berat_badan' => ['nullable', 'integer'],
            'nomor_telp' => ['required'],
            'nomor_telp_orang_tua' => ['required'],
            'pendidikan_terakhir' => ['required'],
            'asal_sekolah' => ['required'],
        ], [
            
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'integer' => ':attribute harus berupa angka.',
            'email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'max' => ':attribute maksimal :max karakter.',
            'confirmed' => 'Konfirmasi password tidak cocok.',
            'date' => ':attribute harus berupa tanggal yang valid.',
        ], [
            
            'nama_lengkap' => 'Nama Lengkap',
            'nama_panggilan' => 'Nama Panggilan',
            'email' => 'Email',
            'password' => 'Password',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'status' => 'Status',
            'alamat' => 'Alamat',
            'tinggi_badan' => 'Tinggi Badan',
            'berat_badan' => 'Berat Badan',
            'nomor_telp' => 'Nomor Telepon',
            'nomor_telp_orang_tua' => 'Nomor Telepon Orang Tua',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'asal_sekolah' => 'Asal Sekolah',
        ]);

        
        Pendaftaran::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'nomor_telp' => $request->nomor_telp,
            'nomor_telp_orang_tua' => $request->nomor_telp_orang_tua,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'asal_sekolah' => $request->asal_sekolah,
        ]);

        
        return redirect()->route('login')->with('status', 'Pendaftaran berhasil, silakan menunggu konfirmasi admin sebelum bisa login.');
    }
}
