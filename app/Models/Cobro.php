<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    use HasFactory;

    public function usuario(){

        return $this->belongsTo('App\Models\Departamento');

    }

    public function prestamos(){

        return $this->hasMany('App\Models\Prestamo');

    }
}
