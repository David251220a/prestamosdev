<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoDetalle extends Model
{
    use HasFactory;

    protected $fillable=[
        'cuota'
        , 'fecha_vencimiento'
        , 'monto_cuota'
        , 'capital'
        , 'interes'
        , 'iva'
        , 'multa'
        , 'cobrado_capital'
        , 'cobrado_interes'
        , 'cobrado_multa'
        , 'cobrado_iva'
        , 'atraso'
        , 'prestamo_id'
        , 'fecha_cobro'];

    public function prestamo(){


        return $this->belongsTo('App\Models\Prestamo');

    }

}
