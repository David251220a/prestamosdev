@extends('adminlte::page')

@section('title', 'Prestamos DEV')

@section('content_header')    
    
    <h1>Cobros</h1>

@stop

@section('content')

    {!! Form::open(array('route'=>'cobros.index', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}

        <div class="card">

            <div class="card-body">

                <div class="form-group">

                    <div class="input-group">
                                    
                        <input type="search" class="form-control" name="searchtext" placeholder="Buscar.." value="{{$searchtext}}">                        
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