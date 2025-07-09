<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('login');
    }

    switch ($user->role) {
        case 'staf':
            return redirect()->to(Filament::getPanel('admin')->getUrl());
        case 'guru':
            return redirect()->to(Filament::getPanel('guru')->getUrl());
        case 'siswa':
            return redirect()->to(Filament::getPanel('siswa')->getUrl());
        default:
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Role tidak dikenali.']);
    }
})->middleware(['auth']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::redirect('/admin/login', '/login');
Route::redirect('/guru/login', '/login');
Route::redirect('/siswa/login', '/login');


Route::get('/siswa/register', [RegisteredUserController::class, 'create'])->name('siswa.register');
Route::post('/siswa/register', [RegisteredUserController::class, 'store']);



require __DIR__.'/auth.php';
