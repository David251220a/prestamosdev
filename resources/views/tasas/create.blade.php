@extends('adminlte::page')

@section('title', 'Code Dev')

@section('content_header')
    
    <h1>Agregar TASA</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">

            {!! Form::open(['route' => 'tasas.store', 'autocomplete' => 'off']) !!}

            <div class="row">

                <div class="form-group md-1 mt-1">

                    {!! Form::label('tasa', 'Tasa') !!}
                    {!! Form::number('tasa',  old ('tasa'), ['class' =>'form-control', 'required'] ) !!}                    
                    @error('tasa')

                        <span class="text-danger">{{$message}}</span>

                    @enderror
                </div>

            </div>

            <div class="row">

                <div class="form-group md-1 mt-1">

                    {!! Form::label('activo', 'Estado') !!}
                    <select name="activo" id="activo" class="form-control selectpicker"  data-live-search="true">                        
                            
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                        
    
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