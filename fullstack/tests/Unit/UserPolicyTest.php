<?php

namespace Tests\Unit;

use App\Models\User;
use App\Policies\UserPolicy;
use PHPUnit\Framework\TestCase;

class UserPolicyTest extends TestCase
{
    public function test_non_super_admin_cannot_update_super_admin(): void
    {
        $policy = new UserPolicy;

        $authUser = $this->createMock(User::class);
        $authUser->method('can')->with('Update:User')->willReturn(true);
        $authUser->method('hasRole')->with('super_admin')->willReturn(false);

        $targetUser = $this->createMock(User::class);
        $targetUser->method('hasRole')->with('super_admin')->willReturn(true);

        $this->assertFalse($policy->update($authUser, $targetUser));
    }

    public function test_super_admin_can_update_super_admin(): void
    {
        $policy = new UserPolicy;

        $authUser = $this->createMock(User::class);
        $authUser->method('can')->with('Update:User')->willReturn(true);
        $authUser->method('hasRole')->with('super_admin')->willReturn(true);

        $targetUser = $this->createMock(User::class);
        $targetUser->method('hasRole')->with('super_admin')->willReturn(true);

        $this->assertTrue($policy->update($authUser, $targetUser));
    }

    public function test_non_super_admin_cannot_delete_super_admin(): void
    {
        $policy = new UserPolicy;

        $authUser = $this->createMock(User::class);
        $authUser->method('can')->with('Delete:User')->willReturn(true);
        $authUser->method('hasRole')->with('super_admin')->willReturn(false);

        $targetUser = $this->createMock(User::class);
        $targetUser->method('hasRole')->with('super_admin')->willReturn(true);

        $this->assertFalse($policy->delete($authUser, $targetUser));
    }

    public function test_super_admin_can_delete_super_admin(): void
    {
        $policy = new UserPolicy;

        $authUser = $this->createMock(User::class);
        $authUser->method('can')->with('Delete:User')->willReturn(true);
        $authUser->method('hasRole')->with('super_admin')->willReturn(true);

        $targetUser = $this->createMock(User::class);
        $targetUser->method('hasRole')->with('super_admin')->willReturn(true);

        $this->assertTrue($policy->delete($authUser, $targetUser));
    }
}
