<?php

use Illuminate\Database\Seeder;
use PruebaLaravel\Role;

class RoleTableSeeder extends Seeder
{	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role = new Role();
       $role->role_name = "admin";
       $role->description = "Administrador";
       $role->save();

       $role = new Role();
       $role->role_name = "user";
       $role->description = "User";
       $role->save();

    }
}
