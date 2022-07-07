<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaDocumento extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function persona_documentos(){

        return $this->belongsTo('App\Models\Persona');

    }
}
