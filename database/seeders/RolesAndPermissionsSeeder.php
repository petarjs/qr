<?php

namespace Database\Seeders;

use Domain\Roles\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'assign roles']);
        Permission::create(['name' => 'assign permissions']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'impersonate users']);
        Permission::create(['name' => 'manage templates']);

        Permission::create(['name' => 'manage billing']);
        Permission::create(['name' => 'manage company']);
        Permission::create(['name' => 'manage stores']);

        Permission::create(['name' => 'manage menus']);
        Permission::create(['name' => 'manage menu items']);

        Role::create(['name' => RoleEnum::admin()])
            ->givePermissionTo([
                'assign roles',
                'assign permissions',
                'manage users',
                'impersonate users',
                'manage templates',
            ]);

        Role::create(['name' => RoleEnum::manager()])
            ->givePermissionTo([
                'manage billing',
                'manage company',
                'manage stores',
            ]);

        Role::create(['name' => RoleEnum::operator()])
            ->givePermissionTo([
                'manage menus',
                'manage menu items',
            ]);
    }
}
