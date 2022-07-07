<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonaRequest;
use App\Models\DatosGenerale;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\PersonaDocumento;
use Illuminate\Support\Facades\Storage;

class PersonaController extends Controller
{
    
    public function index(){

        return view('personas.index');

    }

    public function create(){

        $departamentos = Departamento::pluck('departamento', 'id');        

        return view('personas.create', compact('departamentos'));

    }

    public function store(StorePersonaRequest $request){        

        $cedula_frontal = "";
        $cedula_reversa = "";

        $personas = Persona::create($request->all());        

        $documentos = new PersonaDocumento;
        
        if ($request->file('cedula_frontal')) {

            $imagen = $request->file('cedula_frontal')->store('public/documentos');
            $cedula_frontal = Storage::url($imagen);
            // $cedula_frontal = Storage::disk('public')->put('documentos', $request->cedula_frontal);
            $documentos->cedula_frontal = $cedula_frontal;   

        }

        if ($request->file('cedula_reversa')) {
            
            $imagen = $request->file('cedula_reversa')->store('public/documentos');
            $cedula_reversa = Storage::url($imagen);
            //$cedula_reversa = Storage::disk('public')->put('documentos', $request->cedula_reversa);
            $documentos->cedula_reverso = $cedula_reversa;
        }

        if ((!(empty($cedula_reversa))) || (!(empty($cedula_frontal)))){
            $personas->documentos_foto()->save($documentos);
        }

        return redirect()->route('personas.index')->with('info', 'Se agrego con exito.');

    }

    public function edit(Persona $persona){
        
        $departamentos = Departamento::pluck('departamento', 'id');
        return view('personas.edit', compact('persona', 'departamentos'));

    }

    public function update(StorePersonaRequest $request, Persona $persona){


        $cedula_frontal = "";
        $cedula_reversa = "";

        $persona->update($request->all());

        $documentos_valor = PersonaDocumento::where('persona_id', $persona->id)->first();

        if (!(empty($documentos_valor->persona_id))){

            if ($request->file('cedula_frontal')) {

                $imagen = $request->file('cedula_frontal')->store('public/documentos');
                $cedula_frontal = Storage::url($imagen);                
                $documentos_valor->cedula_frontal = $cedula_frontal;
                $documentos_valor->save();

            }

            if ($request->file('cedula_reversa')) {
                
                $imagen = $request->file('cedula_reversa')->store('public/documentos');
                $cedula_reversa = Storage::url($imagen);
                $documentos_valor->cedula_reverso = $cedula_reversa;
                $documentos_valor->save();

            }

        }else{

            $documentos = new PersonaDocumento;
        
            if ($request->file('cedula_frontal')) {

                $imagen = $request->file('cedula_frontal')->store('public/documentos');
                $cedula_frontal = Storage::url($imagen);
                $documentos->cedula_frontal = $cedula_frontal;   

            }

            if ($request->file('cedula_reversa')) {
                
                $imagen = $request->file('cedula_reversa')->store('public/documentos');
                $cedula_reversa = Storage::url($imagen);
                $documentos->cedula_reverso = $cedula_reversa;
            }

            if ((!(empty($cedula_reversa))) || (!(empty($cedula_frontal)))){
                $persona->documentos_foto()->save($documentos);
            }

        }

        return redirect()->route('personas.index')->with('info', 'Se actualizaron correctamente los datos');
    }

}
