<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable=[
        'fecha_prestamo'
        , 'anio'
        , 'numero_expediente'
        , 'monto_prestamo'
        , 'plazo'
        , 'estado'
        , 'solicitude_id'
        , 'producto_id'
        , 'persona_id'
        , 'tasa_id'
        , 'user_id'];

    public function persona_prestamo(){

        return $this->belongsTo('App\Models\Persona');

    }

    public function detalles(){

        return $this->hasMany('App\Models\PrestamoDetalle');

    }

    public function producto(){

        return $this->belongsTo('App\Models\Producto');

    }

    public function tasas(){

        return $this->belongsTo('App\Models\Tasa');

    }

    public function cobros(){

        return $this->belongsTo('App\Models\Cobro');

    }

}
