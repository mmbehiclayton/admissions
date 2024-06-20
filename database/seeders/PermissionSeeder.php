<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        // Branch permissions
        Permission::create(['name' => 'view branches']);
        Permission::create(['name' => 'create branches']);
        Permission::create(['name' => 'edit branches']);
        Permission::create(['name' => 'delete branches']); 

        // Class Permissions
        Permission::create(['name' => 'view classes']);
        Permission::create(['name' => 'create classes']);
        Permission::create(['name' => 'edit classes']);
        Permission::create(['name' => 'delete classes']); 

        // Stream Permissions
        Permission::create(['name' => 'view streams']);
        Permission::create(['name' => 'create streams']);
        Permission::create(['name' => 'edit streams']);
        Permission::create(['name' => 'delete streams']); 

        // Learners  Permissions
        Permission::create(['name' => 'view learners']);
        Permission::create(['name' => 'create learners']);
        Permission::create(['name' => 'edit learners']);
        Permission::create(['name' => 'delete learners']); 
        

    }
}
