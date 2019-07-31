<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    
    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = ['name','email','password'];

    protected $hidden = ['password','remember_token',];

    //softdelete
    protected $dates = ['deleted_at'];

    //Setear la contraseña cada vez que sea cambiada
    public function setPasswordAttribute($valor){
    	if(!empty($valor)){
    		$this->attributes['password'] = \Hash::make($valor);
    	}
    }

}
