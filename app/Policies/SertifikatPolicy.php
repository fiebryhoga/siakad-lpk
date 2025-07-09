<?php

namespace App\Policies;

use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SertifikatPolicy
{
    use HandlesAuthorization;

    /**
     * Izinkan semua peran untuk melihat daftar sertifikat.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Izinkan semua peran untuk melihat detail sertifikat.
     */
    public function view(User $user, Sertifikat $sertifikat): bool
    {
        return true;
    }

    /**
     * Hanya Staf yang boleh membuat sertifikat baru.
     */
    public function create(User $user): bool
    {
        return $user->role === 'staf';
    }

    /**
     * Hanya Staf yang boleh mengedit sertifikat.
     */
    public function update(User $user, Sertifikat $sertifikat): bool
    {
        return $user->role === 'staf';
    }

    /**
     * Hanya Staf yang boleh menghapus sertifikat.
     */
    public function delete(User $user, Sertifikat $sertifikat): bool
    {
        return $user->role === 'staf';
    }
}
