@extends('adminlte::page')

@section('title', 'Code Dev')

@section('content_header')
    
    <h1>Agregar Producto</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">

            {!! Form::model($producto, ['route' => ['productos.update', $producto], 'method' => 'put']) !!}

            <div class="row">

                <div class="form-group md-1 mt-1">

                    {!! Form::label('producto', 'Producto') !!}
                    {!! Form::text('producto',  old ('producto'), ['class' =>'form-control', 'required'] ) !!}                    
                    @error('producto')

                        <span class="text-danger">{{$message}}</span>

                    @enderror
                </div>

            </div>

            <div class="row">

                <div class="form-group md-1 mt-1">

                    {!! Form::label('alias', 'Alas') !!}
                    {!! Form::text('alias',  old ('alias'), ['class' =>'form-control', 'required'] ) !!}                    
                    @error('alias')

                        <span class="text-danger">{{$message}}</span>

                    @enderror
                </div>

            </div>

            <div class="row">

                <div class="form-group md-1 mt-1">

                    {!! Form::label('activo', 'Estado') !!}
                    <select name="activo" id="activo" class="form-control selectpicker"  data-live-search="true">                        
                            
                        <option value="A"  @if('A' == $producto->activo) selected="selected" @endif>ACTIVO</option>
                        <option value="I"  @if('I' == $producto->activo) selected="selected" @endif>INACTIVO</option>
                        
    
                    </select>

                </div>

            </div>
            
            <div class="form-group">

                <div class="input-group">
                                            
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </span>                
        
                </div>
        
            </div>

            {!! Form::close() !!}

        </div>

    </div>
    
@stop

@section('css')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@stop