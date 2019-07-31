<?php

namespace PruebaLaravel\Http\Controllers\Pruebas;

use Illuminate\Http\Request;
use PruebaLaravel\Http\Controllers\Controller;

class PruebaLaravel extends Controller
{
    public function prueba($name){
    	return "Estoy en un controlador y recibo esto ".$name;
    }
}
