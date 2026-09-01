<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Definisikan 3 Role (hanya aktor yang bisa akses panel)
        $roles = [
            'super_admin' => 'Super Administrator (Akses Penuh)',
            'admin'       => 'Administrator Panel',
            'volunteer'   => 'User Volunteer (Relawan)',
        ];

        foreach ($roles as $roleName => $label) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // 2. Pastikan user pertama (admin) mendapatkan role super_admin
        $firstUser = User::first();
        if ($firstUser && !$firstUser->hasRole('super_admin')) {
            $firstUser->assignRole('super_admin');
        }
    }
}
