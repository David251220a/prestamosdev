<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrestamoRequest;
use App\Models\DatosGenerale;
use App\Models\Persona;
use App\Models\PersonaDocumento;
use App\Models\Prestamo;
use App\Models\PrestamoDetalle;
use App\Models\Producto;
use App\Models\Referencia;
use App\Models\Tasa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PrestamoController extends Controller
{
    
    public function index(){

        return view('prestamos.index');

    }

    public function loan(Request $request){

        $searchtext=trim($request->get('searchtext'));
        $mensaje = "";

        $persona = Persona::where('documento', $searchtext)
        ->first();

        if (!(empty($persona->documento))){

            $productos = Producto::where('activo',  'A')
            ->get();
    
            $tasas = Tasa::where('activo', 1)
            ->select('tasa', 'id')
            ->get();

            return view('prestamos.create', compact('persona', 'productos', 'tasas'));

        }

        if ((empty($searchtext))){

            return view('prestamos.loan', compact('searchtext', 'mensaje'));

        }

        $mensaje = "No existe persona con este n° de documento: " .$searchtext;
        return view('prestamos.loan', compact('searchtext', 'mensaje'));

    }

    public function consulta(Request $request){
        
        $plazo = trim($request->get('plazo'));
        $monto = str_replace('.', '', trim($request->get('monto')));
        $tasa_id = trim($request->get('tasa_id'));
        $producto_id = trim($request->get('producto_id'));

        $calculos="";

        $productos = Producto::where('activo',  'A')
        ->get();

        if(!(empty($monto)) && !(empty($monto)) ){

            if (($monto > 0) && ($monto > 0)){

                $fecha_actual = Carbon::now();
                $sql_Call = 'CALL proyeccion(?, ?, ?, ?)';
                $calculos = DB::select($sql_Call, array($monto, $plazo, $fecha_actual, $tasa_id));

            }

        }else{

            $plazo = 0;
            $monto = 0;

        }

        $tasas = Tasa::where('activo', 1)
        ->select('tasa', 'id')
        ->get();

        return view('prestamos.consulta', compact('monto', 'plazo', 'productos', 'tasas', 'calculos', 'tasa_id', 'producto_id'));

    }

    public function create(){        

    }

    public function store(PrestamoRequest $request){

        $liquidacion = "";
        $factura = "";
        // GUARDAR LA CABEZERA DE PRESTAMOS
        $prestamo = Prestamo::create($request->all());

        // BUSCAR EN EL MODELO PERSONA POR ID PARA GUARDAR DATOS GENERALES
        $personas = Persona::find($request->persona_id);
        $fecha_actual = Carbon::now();

        // BUSCAMOS Y PREGUNTAMOS SI EXISTE DATOS GUARDADOS EN DATOS GENERALES
        $datos_generales = DatosGenerale::where('persona_id', $request->persona_id)->first();

        if (!(empty($datos_generales->persona_id))){
            
            $datos_generales->lugar_trabajo = $request->lugar_trabajo;
            $datos_generales->salario = $request->salario;
            $datos_generales->celular_trabajo = $request->celular_trabajo;
            $datos_generales->direccion_trabajo = $request->direccion_trabajo;
            $datos_generales->direccion_trabajo = $request->direccion_trabajo;
    
            $datos_generales->save();

        }else{

            $datos_generales = new DatosGenerale;
            $datos_generales->lugar_trabajo = $request->lugar_trabajo;
            $datos_generales->salario = $request->salario;
            $datos_generales->celular_trabajo = $request->celular_trabajo;
            $datos_generales->direccion_trabajo = $request->direccion_trabajo;
            $datos_generales->direccion_trabajo = $request->direccion_trabajo;
    
            $personas->datosgeneral()->save($datos_generales);
        }

        // BUSCAMOS Y PREGUNTAMOS SI EXISTE DATOS GUARDADOS EN REFERENCIAS
        
        $referencias = Referencia::where('persona_id', $request->persona_id)->first();

        if (!(empty($referencias->persona_id))){
            
            $referencias->nombre_apellido_1 = $request->nombre_apellido_1;
            $referencias->celular_1 = $request->celular_1;
            $referencias->direccion_1 = $request->direccion_1;
            $referencias->nombre_apellido_2 = $request->nombre_apellido_2;
            $referencias->celular_2 = $request->celular_2;
            $referencias->direccion_2 = $request->direccion_2;
    
            $referencias->save();

        }else{

            $referencias = new Referencia;
            $referencias->nombre_apellido_1 = $request->nombre_apellido_1;
            $referencias->celular_1 = $request->celular_1;
            $referencias->direccion_1 = $request->direccion_1;
            $referencias->nombre_apellido_2 = $request->nombre_apellido_2;
            $referencias->celular_2 = $request->celular_2;
            $referencias->direccion_2 = $request->direccion_2;
    
            $personas->referencia()->save($referencias);
        }
       
        // EJECUTAMOS CONSULTA DE PROYECCION CON SUS PARAMETROS PARA GUARDAR EL DETALLE        
        $sql_Call = 'CALL proyeccion(?, ?, ?, ?)';

        $tasa = Tasa::where('id', $request->tasa_id)
        ->value('tasa');

        $prestamoDetalle = DB::select($sql_Call, array(str_replace('.', '', $request->monto_prestamo), $request->plazo, $fecha_actual, $tasa));        
        $cont = 0;
        
        //return count($prestamoDetalle);

        foreach($prestamoDetalle as $prestamos_deta){

            $prestamo_detalle = new PrestamoDetalle;

            $prestamo_detalle->cuota = $prestamos_deta->cuota;
            $prestamo_detalle->fecha_vencimiento = $prestamos_deta->fecha_vencimiento;
            $prestamo_detalle->monto_cuota = $prestamos_deta->monto_cuota;
            $prestamo_detalle->capital = $prestamos_deta->capital;
            $prestamo_detalle->interes = $prestamos_deta->interes;
            
            $prestamo->detalles()->save($prestamo_detalle);

        }        

        //BUSCAMOS Y PREGUNTAMOS SI HAY REGISTRO EN PERSONO DOCUMENTO PARA CREAR O GUARDAR
        $documentos_valor = PersonaDocumento::where('persona_id', $request->persona_id)->first();
        
        if (!(empty($documentos_valor->persona_id))){

            if ($request->file('liquidacion')) {

                $imagen = $request->file('liquidacion')->store('public/documentos');
                $liquidacion = Storage::url($imagen);                
                $documentos_valor->liquidacion = $liquidacion;
                $documentos_valor->save();

            }

            if ($request->file('factura')) {
                
                $imagen = $request->file('factura')->store('public/documentos');
                $factura = Storage::url($imagen);
                $documentos_valor->factura = $factura;
                $documentos_valor->save();

            }

        }else{

            $documentos = new PersonaDocumento;
        
            if ($request->file('liquidacion')) {

                $imagen = $request->file('liquidacion')->store('public/documentos');
                $liquidacion = Storage::url($imagen);                
                $documentos->liquidacion = $liquidacion;   

            }

            if ($request->file('factura')) {
                
                $imagen = $request->file('factura')->store('public/documentos');
                $factura = Storage::url($imagen);                
                $documentos->factura = $factura;
            }

            if ((!(empty($liquidacion))) || (!(empty($factura)))){
                $personas->documentos_foto()->save($documentos);
            }

        }

        return redirect()->route('prestamos.index')->with('info', 'Se agrego con exito el prestamos con numero de expediente : '.str_pad($prestamo->numero_expediente, 6, "0", STR_PAD_LEFT));

    }

}
