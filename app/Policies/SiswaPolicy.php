<?php
namespace App\Policies;

use App\Models\Siswa;
use App\Models\User;

class SiswaPolicy
{
    /**
     * Staf & Guru boleh melihat daftar semua siswa.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['staf', 'guru']);
    }

    /**
     * Staf & Guru boleh melihat detail siswa manapun.
     * Siswa hanya boleh melihat profilnya sendiri.
     */
    public function view(User $user, Siswa $siswa): bool
    {
        if (in_array($user->role, ['staf', 'guru'])) {
            return true;
        }

        return $user->id === $siswa->user_id;
    }

    /**
     * Hanya Staf yang boleh membuat data siswa baru.
     */
    public function create(User $user): bool
    {
        return $user->role === 'staf';
    }

    /**
     * Hanya Staf yang boleh mengedit data siswa.
     */
    public function update(User $user, Siswa $siswa): bool
    {
        return $user->role === 'staf';
    }

    /**
     * Hanya Staf yang boleh menghapus data siswa.
     */
    public function delete(User $user, Siswa $siswa): bool
    {
        return $user->role === 'staf';
    }

    /**
     * Hanya Staf yang boleh mengembalikan data yang terhapus.
     */
    public function restore(User $user, Siswa $siswa): bool
    {
        return $user->role === 'staf';
    }

    /**
     * Hanya Staf yang boleh menghapus permanen.
     */
    public function forceDelete(User $user, Siswa $siswa): bool
    {
        return $user->role === 'staf';
    }
}
