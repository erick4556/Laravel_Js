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

//Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');
Route::get('admin','FrontController@admin');

//Para el email
Route::resource('mail','MailController');

Route::resource('usuario','Usuario\UsuarioController');
//Ruta con parámetros
Route::get('usuario/{id}/editar','Usuario\UsuarioController@editar');
//Route::get('usuario/editar/{id}','Usuario\UsuarioController@editar');

Route::put('usuario/{id}/actualizar','Usuario\UsuarioController@actualizar');
//Route::put('usuario/actualizar/{id}','Usuario\UsuarioController@actualizar');

//También lo puedo usar para la ruta en el href
//Route::get('createuser',['as'=>'createuser','uses'=>'Usuario\UsuarioController@create']);
Route::resource('genero','Genero\GeneroController');
//Rutas con parámetro : id
Route::get('genero/{id}/editar','Genero\GeneroController@editar');
//Route::get('genero/editar/{id}','Genero\GeneroController@editar');
Route::put('genero/{id}/actualizar','Genero\GeneroController@actualizar');
//Route::put('genero/actualizar/{id}','Genero\GeneroController@actualizar');

Route::get('generos','Genero\GeneroController@listing');

Route::resource('pelicula',"Movie\MovieController");

//Restablecer password
Route::get('password/email','Auth\PasswordController@getEmail');
Route::get('password/email','Auth\PasswordController@postEmail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
