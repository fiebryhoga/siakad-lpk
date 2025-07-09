<?php
namespace App\Policies;

use App\Models\Nilai;
use App\Models\User;

class NilaiPolicy
{
    // Izinkan semua peran untuk melihat daftar nilai
    public function viewAny(User $user): bool
    {
        return true;
    }

    // Izinkan semua peran untuk melihat detail nilai
    public function view(User $user, Nilai $nilai): bool
    {
        return true;
    }

    // Hanya Staf yang bisa membuat, mengedit, dan menghapus
    public function create(User $user): bool
    {
        return $user->role === 'staf';
    }

    public function update(User $user, Nilai $nilai): bool
    {
        return $user->role === 'staf';
    }

    public function delete(User $user, Nilai $nilai): bool
    {
        return $user->role === 'staf';
    }
}
