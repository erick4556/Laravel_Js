<?php

namespace PruebaLaravel\Http\Requests\Trainer;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() //Es opcional donde se coloca la lógica de la autorización
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        
        'nombre' => 'required|max: 10',
        'descripcion' => 'required',
        'avatar' => 'required|image',
        'slug' => 'required'

        ];
    }
}
