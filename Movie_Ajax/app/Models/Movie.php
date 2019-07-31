<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Movie extends Model
{
    protected $table = "movies";
   // protected $primarykey;

    protected $fillable = ['name','cast','direction','duration','genero_id','path'];

    //Motador: para modificar unos elementos antes de ser guardados

    public function setPathAttribute($path){
        if(!empty($path)){
    	//Especificar la fecha en la que fue subido, 
    	$this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName(); 
    	$name = Carbon::now()->second.$path->getClientOriginalName(); 
    	\Storage::disk('local')->put($name,\File::get($path)); //Se hace referencia al storage
        }
    }

    
    
    public static function MoviesConsul(){
        return DB::table('movies')
            ->join('generos','generos.id','=','movies.genero_id')
            ->select('movies.*','generos.genero')
            ->get();
    }



}
