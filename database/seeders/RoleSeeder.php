<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'planets.view',
            'planets.create',
            'planets.edit',
            'planets.delete',
            'crew.view',
            'crew.create',
            'crew.edit',
            'crew.delete',
            'technologies.view',
            'technologies.create',
            'technologies.edit',
            'technologies.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create admin role and assign all permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        // Create a test admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@spacetourism.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        $admin->assignRole('admin');
    }
}
