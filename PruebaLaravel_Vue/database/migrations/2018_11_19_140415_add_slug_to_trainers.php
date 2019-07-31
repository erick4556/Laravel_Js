<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToTrainers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trainers', function (Blueprint $table) {
            //De esa forma pueden declarar el campo único y a la vez permitir que el campo slug permita valores nulos desde laravel
            $table->string('slug')->unique()->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainers', function (Blueprint $table) {
        //Cuando se hace el rollback de la migración se ejecuta eso y elimina la columna slug dentro de la tabla.
            $table->dropColumn('slug');
        });
    }
}
