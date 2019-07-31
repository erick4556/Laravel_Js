<?php

namespace App\Http\Controllers\Genero;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Genero;
use App\Http\Requests\Genero\GeneroRequest;
use App\Http\Requests\Genero\UpdateGeneroRequest;


class GeneroController extends Controller
{

    public function __construct(){
            $this->middleware('auth');

     }       

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('genero/index');
    }

    public function listing(){
        $genero = Genero::all();

        return response()->json(
            $genero->toArray()    
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request)
    {
        if($request->ajax()){
            Genero::create($request->all());
            return response()->json([
                "mensaje" => "creado"
            ]);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $genero = Genero::find($id);

        return response()->json(
            $genero->toArray()
        );
    }

    //Función customizada
    public function editar($id)
    {
        $genero = Genero::find($id);

        return response()->json(
            $genero->toArray()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genero $genero)
    {
        //$genero = Genero::find($gener);
        $genero->fill($request->all());
        $genero->save();

        return response()->json([
            "mensaje" =>"listo"   
        ]);
    }

    //Función actualizar customizada
    public function actualizar(Request $request,$id)
    {
        //$genero = Genero::find($gener);
        //$genero->fill($request->all());
        //$genero->save();

       // $genero = Genero::findOrFail($request->id); //Sin pasarle parámetros a la función
        $genero = Genero::findOrFail($id); //Pasandole parámetros a la función
        $genero->genero = $request->genero;//$request->input("genero")
        $genero->save();

        return response()->json([
            "mensaje" =>"listo"   
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genero::Find($id);
        $genero->delete();

        return response()->json([
            "mensaje" => "Eliminado"
        ]);
    }

    
}
