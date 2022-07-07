@extends('adminlte::page')

@section('title', 'Prestamos DEV')

@section('content_header')    
    
    <h1>Prestamos</h1>

@stop

@section('content')
    
{!! Form::open(array('route'=>'prestamos.loan', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
    
    <div class="card">

        <div class="card-body">

            <div class="form-group">

                <div class="input-group">
                                
                    <input type="search" class="form-control" name="searchtext" placeholder="Buscar.." value="{{$searchtext}}">
                    {{-- AGREGAR UN BOTON A LADO PARA QUE SE QUEDE MAS LINDO --}}
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </span>                
        
                </div>
        
            </div>
            
            @if (!(empty($searchtext)))

                <strong> {{$mensaje}} </strong>

            @endif

        </div>

    </div>
    
{{Form::close() }}


    
    
@stop