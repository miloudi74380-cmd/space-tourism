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
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles with specific permissions

        // Admin role - all permissions including user management
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        // Planet Manager role - only planets permissions
        $planetManagerRole = Role::firstOrCreate(['name' => 'planet_manager']);
        $planetManagerRole->givePermissionTo([
            'planets.view',
            'planets.create',
            'planets.edit',
            'planets.delete',
        ]);

        // Crew Manager role - only crew permissions
        $crewManagerRole = Role::firstOrCreate(['name' => 'crew_manager']);
        $crewManagerRole->givePermissionTo([
            'crew.view',
            'crew.create',
            'crew.edit',
            'crew.delete',
        ]);

        // Technology Manager role - only technologies permissions
        $technologyManagerRole = Role::firstOrCreate(['name' => 'technology_manager']);
        $technologyManagerRole->givePermissionTo([
            'technologies.view',
            'technologies.create',
            'technologies.edit',
            'technologies.delete',
        ]);

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
