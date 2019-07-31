<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeder sirve para insertar datos a la base de datos
    	DB::table('users')->insert([
    		'name'=>'Sam',
    		'email'=>'sam@hotmail.com',
    		'password'=>bcrypt('qwerty'),	
    	]);

    }
}
