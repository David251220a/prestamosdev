<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable=['nombre', 'apellido','documento','direccion', 'celular', 'fecha_nacimiento', 'barrio', 'departamentos_id'];

    public function departamentos(){

        return $this->belongsTo('App\Models\Departamento');

    }

    public function datosgeneral(){

        return $this->hasOne('App\Models\DatosGenerale');

    }

    public function referencia(){

        return $this->hasOne('App\Models\Referencia');

    }

    public function documentos_foto(){

        return $this->hasOne('App\Models\PersonaDocumento');

    }

    public function solicitudes(){

        return $this->hasMany('App\Models\Solicitude');
        
    }

    public function prestamos(){

        return $this->hasMany('App\Models\Prestamo');

    }

    public function cobros(){

        return $this->hasMany('App\Models\Cobro');

    }

}
