<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions
        $create = Permission::query()->create(['name' => 'create']);
        $read = Permission::query()->create(['name' => 'read']);
        $update = Permission::query()->create(['name' => 'update']);
        $delete = Permission::query()->create(['name' => 'delete']);

        $createOwn = Permission::query()->create(['name' => 'createOwn']);
        $readOwn = Permission::query()->create(['name' => 'readOwn']);
        $updateOwn = Permission::query()->create(['name' => 'updateOwn']);
        $deleteOwn = Permission::query()->create(['name' => 'deleteOwn']);

        // roles
        $admin = Role::query()->create(['name' => 'admin']);
        $user = Role::query()->create(['name' => 'user']);

        $create->assignRole($admin);
        $read->assignRole($admin);
        $update->assignRole($admin);
        $delete->assignRole($admin);

        $createOwn->assignRole($admin);
        $readOwn->assignRole($admin);
        $updateOwn->assignRole($admin);
        $deleteOwn->assignRole($admin);

        $createOwn->assignRole($user);
        $readOwn->assignRole($user);
        $updateOwn->assignRole($user);
        $deleteOwn->assignRole($user);
    }
}
