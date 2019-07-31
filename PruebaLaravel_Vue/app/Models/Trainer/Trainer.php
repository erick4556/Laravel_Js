<?php

namespace PruebaLaravel\Models\Trainer;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{

	//Vamos a poder actualizar los siguientes campos.

	protected $fillable = ['nombre','descripcion','avatar'];
  	
//Implicit Binding customizado..
    /**
 * Get the route key for the model.
 *
 * @return string
 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function pokemons()
    {
        return $this->hasMany('PruebaLaravel\Models\Pokemon\Pokemon');
    }

}
