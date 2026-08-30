<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AidRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class AidRequestPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AidRequest');
    }

    public function view(AuthUser $authUser, AidRequest $aidRequest): bool
    {
        return $authUser->can('View:AidRequest');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AidRequest');
    }

    public function update(AuthUser $authUser, AidRequest $aidRequest): bool
    {
        return $authUser->can('Update:AidRequest');
    }

    public function delete(AuthUser $authUser, AidRequest $aidRequest): bool
    {
        return $authUser->can('Delete:AidRequest');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:AidRequest');
    }

    public function restore(AuthUser $authUser, AidRequest $aidRequest): bool
    {
        return $authUser->can('Restore:AidRequest');
    }

    public function forceDelete(AuthUser $authUser, AidRequest $aidRequest): bool
    {
        return $authUser->can('ForceDelete:AidRequest');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AidRequest');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AidRequest');
    }

    public function replicate(AuthUser $authUser, AidRequest $aidRequest): bool
    {
        return $authUser->can('Replicate:AidRequest');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AidRequest');
    }

}