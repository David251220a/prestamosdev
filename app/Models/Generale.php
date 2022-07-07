<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generale extends Model
{
    use HasFactory;

    public $timestamps= false;

    protected $fillable=['asignar_multa','dias_gracia'];
}
