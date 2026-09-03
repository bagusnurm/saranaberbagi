<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:User');
    }

    public function view(AuthUser $authUser, User $user): bool
    {
        return $authUser->can('View:User');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:User');
    }

    public function update(AuthUser $authUser, ?User $user = null): bool
    {
        if (! $authUser->can('Update:User')) {
            return false;
        }

        // Non-super_admin tidak boleh mengubah akun super_admin
        if ($user && $user->hasRole('super_admin') && ! $authUser->hasRole('super_admin')) {
            return false;
        }

        return true;
    }

    public function delete(AuthUser $authUser, ?User $user = null): bool
    {
        if (! $authUser->can('Delete:User')) {
            return false;
        }

        // Non-super_admin tidak boleh menghapus akun super_admin
        if ($user && $user->hasRole('super_admin') && ! $authUser->hasRole('super_admin')) {
            return false;
        }

        return true;
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:User');
    }

    public function restore(AuthUser $authUser, ?User $user = null): bool
    {
        return $authUser->can('Restore:User');
    }

    public function forceDelete(AuthUser $authUser, ?User $user = null): bool
    {
        if (! $authUser->can('ForceDelete:User')) {
            return false;
        }

        // Non-super_admin tidak boleh force delete akun super_admin
        if ($user && $user->hasRole('super_admin') && ! $authUser->hasRole('super_admin')) {
            return false;
        }

        return true;
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:User');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:User');
    }

    public function replicate(AuthUser $authUser): bool
    {
        return $authUser->can('Replicate:User');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:User');
    }
}
