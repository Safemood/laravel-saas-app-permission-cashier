<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;



class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'list tasks',
            'edit tasks',
            'create tasks',
            'delete tasks',
            'list events',
            'edit events',
            'create events',
            'delete events',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}