<?php

namespace PruebaLaravel;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //Método que devuelva el resultado de la relación
    public function roles(){
        return $this->belongsToMany('PruebaLaravel\Role'); //Relación con el modelo.
    }

    //Quien va desencadenar todo el proceso.
    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){ //pregunto si de esos roles que llega tenemos uno.
            return true;
        }
        //Error no estas autorizado
        abort(401,'No estas autorizado para esta acción');

    }

    //Función para varios roles
    public function hasAnyRole($roles){
        //Validamos si es un array osea varios roles
        if(is_array($roles)){
            foreach ($roles as $role) {
               //Valide si realmente tiene ese rol.
                if($this->hasRole($role)){
                    return true;
                } 
            }
        }
        else{ //Un solo role
            //Valide si realmente tiene ese rol.
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;
    }

    //Validación de los roles
    public function hasRole($role){
        //Si este modelo en su relación roles existe y si existe mande el primero que encuentre.
        //Validamos que el usuario cuenta con un rol.
        if($this->roles()->where('role_name',$role)->first()){ 
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
