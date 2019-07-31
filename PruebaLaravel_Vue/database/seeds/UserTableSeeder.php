<?php

use Illuminate\Database\Seeder;
use PruebaLaravel\Role;
use PruebaLaravel\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Se hace la consulta al modelo que nos traiga el rol de usuario y que nos traiga el primero que encuentre y traiga toda la informaci'on.	
        $role_user = Role::where('role_name','user')->first();
        $role_admin = Role::where('role_name','admin')->first();


        //Se esta haciendo sin la creación de un modulo, se hace diractmente en el seeder.
        $user = new User();
        $user->name = "User";
        $user->email = "user@hotmail.com";
        $user->password = bcrypt('query'); //Funcionalidad de cifrar que usa laravel.
        $user->save();
        $user->roles()->attach($role_user); //Para que se relacionen en la tabla pivote los dos modelos.

        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@hotmail.com";
        $user->password = bcrypt('query'); //Funcionalidad de cifrar que usa laravel.
        $user->save();
        $user->roles()->attach($role_admin); //Para que se relacionen en la tabla pivote los dos modelos.

    }
}
