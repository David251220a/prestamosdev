<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    
    public function index(){

        return view('productos.index');

    }

    public function create(){

        return view('productos.create');        

    }

    public function store(Request $request){

        $request->validate([
            'producto' => 'required',
            'alias' => 'required'
        ]);

        $productos = Producto::create($request->all());

        return redirect()->route('productos.index')->with('info', 'Se agrego con exito el producto: '.$productos->producto);

    }

    public function edit(Producto $producto){

        return view('productos.edit', compact('producto'));

    }

    public function update(Request $request, Producto $producto){

        $request->validate([
            'producto' => 'required',
            'alias' => 'required'
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('info', 'Se actualizo con exito el producto: '.$producto->producto);

    }

    public function destroy(Request $request, Producto $producto){

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('info', 'Se actualizo con exito el producto: '.$producto->producto);

    }

}
