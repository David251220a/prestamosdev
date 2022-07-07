<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    // 1 a muchos
    public function personas_departamento(){

        return $this->hasMany('App\Models\Persona');

    }
}
