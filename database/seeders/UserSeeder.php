<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create "standard-user" Role
        $standardUserRole = Role::create(['name' => 'standard-user']);
        
        $standardPlanPermissions = array([
            'list tasks',
            'edit tasks',
            'create tasks',
            'delete tasks',
        ]);
        
          // assign permissions to "standard-user" role
        $standardUserRole->syncPermissions($standardPlanPermissions);


        // create standard user 
        $standardPlanUser = User::create([
            'name' => 'Standard Plan User',
            'email' => 'standardplan@kbouzidi.com',
            'password' => bcrypt('123456')
        ]);
        // assign "standard-user" to the standard user         
        $standardPlanUser->assignRole([$standardUserRole->id]);


        $premiumUserRole = Role::create(['name' => 'premium-user']);
         
        // premium-user has more more features
        $premiumPlanPermissions = array([
            ...$standardPlanPermissions, 
            'list events',
            'edit events',
            'create events',
            'delete events',
        ]);
        
        
        $premiumUserRole->syncPermissions($premiumPlanPermissions);
        

        $premiumPlanUser = User::create([
            'name' => 'Premium Plan User',
            'email' => 'premiumplan@kbouzidi.com',
            'password' => bcrypt('123456')
        ]);
        
        
        $premiumPlanUser->assignRole([$premiumUserRole->id]);

    }
}