<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestamoRequest extends FormRequest
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

        $rules = [

            'monto_prestamo' => 'required',             
            'nombre_apellido_1' => 'required',
            'celular_1' => 'required',
            'direccion_1' => 'required',
            'direccion_2' => 'required',
            'celular_2' => 'required',
            'nombre_apellido_2' => 'required',
        ];

        if(!(empty($this->factura))){

            //array_merge sirve para unir dos array

            $rules = array_merge($rules, [

                'factura' => 'image',                
            ]);

        }

        if(!(empty($this->liquidacion))){

            //array_merge sirve para unir dos array

            $rules = array_merge($rules, [

                'liquidacion' => 'image',                
            ]);

        }

        return $rules;
        
    }
}
