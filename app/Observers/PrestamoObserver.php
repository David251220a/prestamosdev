<?php

namespace App\Observers;

use App\Models\Prestamo;
use Carbon\Carbon;

class PrestamoObserver
{
    
    public function creating(Prestamo $prestamo){

        $fecha_actual = Carbon::now();
        $anio = $fecha_actual->format('Y');

        $max_value = Prestamo::where('producto_id', $prestamo->producto_id)
        ->latest('id')
        ->value('numero_expediente');

        $numero_expediente = $max_value + 1;

        $prestamo->user_id = auth()->user()->id;
        $prestamo->numero_expediente = $numero_expediente;
        $prestamo->fecha_prestamo = $fecha_actual;
        $prestamo->anio = $anio;
        $prestamo->monto_prestamo = str_replace('.', '', $prestamo->monto_prestamo);


    }
}
