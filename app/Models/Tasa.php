<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasa extends Model
{
    use HasFactory;
    
    protected $fillable=['tasa', 'activo'];

    public function prestamos_tasa(){

        return $this->hasMany('App\Models\Prestamo');

    }
}
