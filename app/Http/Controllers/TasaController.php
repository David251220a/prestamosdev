<?php

namespace App\Http\Controllers;

use App\Models\Tasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TasaController extends Controller
{
    //

    public function index(){

        return view('tasas.index');
    }

    public function create(){

        return view('tasas.create');

    }

    public function store(Request $request){

        $request->validate([
            'tasa' => 'required'
        ]);

        $tasa = Tasa::create($request->all());

        return redirect()->route('tasas.index')->with('info', 'Se agrego con exito la tasa: '.$tasa->tasa);

    }

    public function edit(Tasa $tasa){

        return view('tasas.edit', compact('tasa'));

    }

    public function update(Request $request, Tasa $tasa){

        $request->validate([
            'tasa' => 'required'
        ]);

        $tasa->update($request->all());

        return redirect()->route('tasas.index')->with('info', 'Se actualizo con exito la tasa: '.$tasa->tasa);

    }

    public function destroy(Request $request , Tasa $tasa){

        $tasa->update($request->all());

        return redirect()->route('tasas.index')->with('info', 'Se actualizo con exito la tasa: '.$tasa->tasa);

    }

}
