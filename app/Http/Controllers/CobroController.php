<?php

namespace App\Http\Controllers;

use App\Models\Generale;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CobroController extends Controller
{
    
    public function index(Request $request){

        $searchtext=trim($request->get('searchtext'));
        $mensaje = "";

        $persona = Persona::where('documento', $searchtext)
        ->first();

        if (!(empty($persona->documento))){

            $sql_Call = 'CALL prestamos_persona(?)';

            $prestamos_detalles = DB::select($sql_Call, array($searchtext));
            $general = Generale::first();

            $date = Carbon::now();

            $date = $date->subMonth();

            return view('cobros.create', compact('prestamos_detalles', 'persona', 'general', 'date'));

        }

        if ((empty($searchtext))){

            return view('cobros.index', compact('searchtext', 'mensaje'));

        }
        
        $mensaje = "No existe persona con este n° de documento: " .$searchtext;
        return view('cobros.index', compact('searchtext', 'mensaje'));

    }

    public function config_general(){
        
        $general = Generale::first();

        return view('cobros.control', compact('general'));        

    }

    public function config_general_actualizar(Request $request, Generale $general){
        
        $general->update($request->all());

        return redirect()->route('cobros.control')->with('info', 'Se actualizo con exito');
        
    }

}
