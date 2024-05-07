<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
   
        Permission::create(['name' => 'Create Category']);
        Permission::create(['name' => 'Create Sub Category']);
        Permission::create(['name' => 'Add Book Within Category']);
        Permission::create(['name' => 'Add Book To Favorite']);
        Permission::create(['name' => 'ٌRate A Book']);


    #no need to define the variable role1 and role2 it is seeder any way..
     $role1 = Role::create(['name' => 'Admin'])
            ->givePermissionTo(['Create Category', 'Create Sub Category','Add Book Within Category']);

     $role2 = Role::create(['name' => 'Member'])
            ->givePermissionTo(['Add Book To Favorite','ٌRate A Book']);

    }
}
