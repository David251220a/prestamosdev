<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
        $persona = $this->route()->parameter('persona');

        $rules = [

            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required|unique:personas',
            'fecha_nacimiento' => 'required',

        ];

        if($persona){

            $rules['documento'] = 'required|unique:personas,documento,'.$persona->id;

        }

        if(!(empty($this->cedula_reversa))){

            //array_merge sirve para unir dos array

            $rules = array_merge($rules, [

                'cedula_reversa' => 'image',                
            ]);

        }

        if(!(empty($this->cedula_frontal))){

            //array_merge sirve para unir dos array

            $rules = array_merge($rules, [

                'cedula_frontal' => 'image',                
            ]);

        }

        return $rules;

    }
}
