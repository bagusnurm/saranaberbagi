<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CollaborationRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollaborationRequestPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CollaborationRequest');
    }

    public function view(AuthUser $authUser, CollaborationRequest $collaborationRequest): bool
    {
        return $authUser->can('View:CollaborationRequest');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CollaborationRequest');
    }

    public function update(AuthUser $authUser, CollaborationRequest $collaborationRequest): bool
    {
        return $authUser->can('Update:CollaborationRequest');
    }

    public function delete(AuthUser $authUser, CollaborationRequest $collaborationRequest): bool
    {
        return $authUser->can('Delete:CollaborationRequest');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CollaborationRequest');
    }

    public function restore(AuthUser $authUser, CollaborationRequest $collaborationRequest): bool
    {
        return $authUser->can('Restore:CollaborationRequest');
    }

    public function forceDelete(AuthUser $authUser, CollaborationRequest $collaborationRequest): bool
    {
        return $authUser->can('ForceDelete:CollaborationRequest');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CollaborationRequest');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CollaborationRequest');
    }

    public function replicate(AuthUser $authUser, CollaborationRequest $collaborationRequest): bool
    {
        return $authUser->can('Replicate:CollaborationRequest');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CollaborationRequest');
    }

}