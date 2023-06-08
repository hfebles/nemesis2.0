<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_standard = Role::create(['name' => 'standard']);


        $permission_read = Permission::create(['name' => 'read clients']);
        $permission_edit = Permission::create(['name' => 'edit clients']);
        $permission_write = Permission::create(['name' => 'write clients']);
        $permission_delete = Permission::create(['name' => 'delete clients']);


        $permissions_admin = [$permission_read, $permission_edit, $permission_write, $permission_delete];

        $role_admin->syncPermissions($permissions_admin);
        $role_standard->givePermissionTo($permission_read);
    }
}
