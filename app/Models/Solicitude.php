<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;

    public function persona_solicitud(){

        return $this->belongsTo('App\Models\Persona');

    }

    public function estados(){

        return $this->belongsToMany('App\Models\Estado');
        
    }
}
