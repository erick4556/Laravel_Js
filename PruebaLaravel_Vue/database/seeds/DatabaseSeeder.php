<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	//Primero tenemos que ejecutar el role.	
    	 $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
