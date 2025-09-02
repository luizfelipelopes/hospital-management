<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Api Permissions
        Permission::create(['name' => 'view self appointments', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'view appointments', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'create appointments', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'update appointments', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'cancel appointments', 'guard_name' => 'sanctum']);
        
        Permission::create(['name' => 'view patients', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'create patients', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'update patients', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'delete patients', 'guard_name' => 'sanctum']);

        Permission::create(['name' => 'view doctors', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'create doctors', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'update doctors', 'guard_name' => 'sanctum']);
        Permission::create(['name' => 'delete doctors', 'guard_name' => 'sanctum']);
       
        // Web permissions
        Permission::create(['name' => 'view self appointments', 'guard_name' => 'web']);
        Permission::create(['name' => 'view appointments', 'guard_name' => 'web']);
        Permission::create(['name' => 'create appointments', 'guard_name' => 'web']);
        Permission::create(['name' => 'update appointments', 'guard_name' => 'web']);
        Permission::create(['name' => 'cancel appointments', 'guard_name' => 'web']);
        
        Permission::create(['name' => 'view patients', 'guard_name' => 'web']);
        Permission::create(['name' => 'create patients', 'guard_name' => 'web']);
        Permission::create(['name' => 'update patients', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete patients', 'guard_name' => 'web']);

        Permission::create(['name' => 'view doctors', 'guard_name' => 'web']);
        Permission::create(['name' => 'create doctors', 'guard_name' => 'web']);
        Permission::create(['name' => 'update doctors', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete doctors', 'guard_name' => 'web']);
    }
}
