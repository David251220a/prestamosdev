<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BienvienidoController extends Controller
{
    public function index(){

        return view('bienvenido.index');

    }
}
