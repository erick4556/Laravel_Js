<?php

namespace App\Http\Controllers\Movie;

use Illuminate\Http\Request;
use App\Models\Genero;
use App\Models\Movie;
use App\Http\Requests\Movie\MovieCreateRequest;
use App\Http\Requests\Movie\MovieUpdateRequest;
use App\Http\Controllers\Controller;
use Session;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = Movie::MoviesConsul();
        return view('pelicula/index',compact('movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
    
    
        $genero = Genero::select('id','genero')->get();
        //dd($genero);
        return view('pelicula/create',compact('genero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieCreateRequest $request)
    {
        Movie::create($request->all());
        Session::flash('status','Pelicula creada correctamente');
        return redirect('pelicula');
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
        //$genero = Genero::all();
        $genero = Genero::select('id','genero')->get();
        $movies = Movie::find($id);
        return view('pelicula/edit',['movie'=>$movies,'genero'=>$genero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id ,MovieUpdateRequest $request)
    {
        $movie = Movie::find($id);
        $input = $request->all();
        $movie->fill($input)->save();
        Session::flash('update','Se ha actualizado correctamente!!');
        return redirect('pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $movie = Movie::find($id);
        $movie->delete();
        \Storage::delete($movie->path);
        Session::flash('delete','Se ha eliminado correctamente!!');
        return redirect('pelicula');  

    }
}
