<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\CategoryCampaign;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class CategoryCampaignPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CategoryCampaign');
    }

    public function view(AuthUser $authUser, CategoryCampaign $categoryCampaign): bool
    {
        return $authUser->can('View:CategoryCampaign');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CategoryCampaign');
    }

    public function update(AuthUser $authUser, CategoryCampaign $categoryCampaign): bool
    {
        return $authUser->can('Update:CategoryCampaign');
    }

    public function delete(AuthUser $authUser, CategoryCampaign $categoryCampaign): bool
    {
        return $authUser->can('Delete:CategoryCampaign');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CategoryCampaign');
    }

    public function restore(AuthUser $authUser, CategoryCampaign $categoryCampaign): bool
    {
        return $authUser->can('Restore:CategoryCampaign');
    }

    public function forceDelete(AuthUser $authUser, CategoryCampaign $categoryCampaign): bool
    {
        return $authUser->can('ForceDelete:CategoryCampaign');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CategoryCampaign');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CategoryCampaign');
    }

    public function replicate(AuthUser $authUser, CategoryCampaign $categoryCampaign): bool
    {
        return $authUser->can('Replicate:CategoryCampaign');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CategoryCampaign');
    }
}
