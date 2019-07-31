<?php

namespace PruebaLaravel\Http\Controllers\Trainer;

use Illuminate\Http\Request;
use PruebaLaravel\Models\Pokemon\Pokemon;
use PruebaLaravel\Models\Trainer\Trainer;
use PruebaLaravel\Http\Controllers\Controller;

class PokemonController extends Controller
{
    public function index(Trainer $trainer,Request $request){
    	//Pregunto al request si esta siendo enviado por ajax
    	if($request->ajax()){
           // $pokemon = Pokemon::all();
    		//$pokemons = $trainer->pokemons;//A ese trainer le especifico su método pokemons que viene del modelo trainer
            return response()->json($trainer->pokemons,200); //Otra forma de hacer lo de la línea arriba
    	}
    	return view('pokemon/index');
    }

   //Vue hace peticiones mediante ajax
    
   public function store(Trainer $trainer, Request $request){
        
        if($request->ajax()){
            $pokemon = new Pokemon();
            //Seteo
            $pokemon->name = $request->input('name');
            $pokemon->descripcion = $request->input('descripcion');
            $pokemon->picture = $request->input('picture');
            $pokemon->trainer()->associate($trainer)->save();//Accedo a la relacion, luego lo quiero asociar al entrenador que estoy recibiendo
            //$pokemon->save();

            //Respuesta httpn tipo json
            return response()->json([
               // "trainer"=>$trainer,
                "message" => "Pokemon creado correctamente.",
                "pokemon" => $pokemon //key para refresque la página cuando se crea uno
            ],200); //200 es codigo de http

        }

   } 
}
