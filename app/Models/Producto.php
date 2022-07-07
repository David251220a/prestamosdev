<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=['producto','alias', 'activo'];

    public function prestamos(){

        return $this->hasMany('App\Models\Prestamo');

    }
}
