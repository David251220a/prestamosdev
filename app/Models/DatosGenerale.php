<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosGenerale extends Model
{
    use HasFactory;

     protected $guarded=[];
    // protected $fillable=['lugar_trabajo', 'salario','celular_trabajo','direccion_trabajo', 'persona_id'];
    
    public function persona_datos(){

        return $this->belongsTo('App\Models\Persona');

    }
}
