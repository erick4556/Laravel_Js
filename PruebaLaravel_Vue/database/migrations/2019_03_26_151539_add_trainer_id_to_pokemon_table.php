<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrainerIdToPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('pokemon', function (Blueprint $table) {
            //De esa forma pueden declarar el campo único y a la vez permitir que el campo slug permita valores nulos desde laravel
            $table->integer('trainer_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('pokemon', function (Blueprint $table) {
            $table->dropColumn('trainer_id');
        });
    }
}
