<?php

namespace PruebaLaravel;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
    	return $this->belongsToMany('PruebaLaravel\User'); //Relación con el modelo.
    }
}
