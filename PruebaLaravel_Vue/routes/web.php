<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Ejemplos


route::get('ruta',function(){
	return "Ejemplo";
});


//ruta con parametros

//En caso que no se coloque el apellido en la ruta funcionará por que apellido se declaró null, ? se usa para que sea opcional
route::get('name/{name}/apellido/{apellido?}', function($name,$apellido = null){
	return 'Hello '.$name." ".$apellido;
});


//Ruta prueba
//Como parámetro envío un nombre
route::get('prueba/{name}','Pruebas\PruebaLaravel@prueba');


route::resource('trainers','Trainer\TrainerController');
//route::resource('pokemons','Trainer\PokemonController');
Route::post('trainers/{trainer}/pokemons','Trainer\PokemonController@store');
Route::get('trainers/{trainer}/pokemons','Trainer\PokemonController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
