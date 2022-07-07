<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    use HasFactory;

    public function personas_referencia(){

        return $this->belongsTo('App\Models\Persona');

    }
}
