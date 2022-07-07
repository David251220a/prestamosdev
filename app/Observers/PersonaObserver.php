<?php

namespace App\Observers;

use App\Models\Persona;
use Illuminate\Support\Facades\Storage;

class PersonaObserver
{
    //

    public function deletin(Persona $persona){

        if ($persona->documento) {

            if (!(empty($persona->documento->cedula_frontal))){
                Storage::delete($persona->documento->cedula_frontal);
            }

            if (!(empty($persona->documento->cedula_reverso))){
                Storage::delete($persona->documento->cedula_reverso);
            }

            if (!(empty($persona->documento->liquidacion))){
                Storage::delete($persona->documento->liquidacion);
            }

            if (!(empty($persona->documento->factura))){
                Storage::delete($persona->documento->factura);
            }
            
        }
    }
    

}
