@extends('adminlte::page')

@section('title', 'Code Dev')

@section('content_header')
    
    <h1>Configuracion Adicional de Cobros</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">

            {!! Form::model($general, ['route' => ['cobros.control.actualizar', $general], 'method' => 'put']) !!}            

            <div class="row">

                <div class="form-group md-1 mt-1">

                    {!! Form::label('asignar_multa', 'Se Asigna manualmente la multa?') !!}
                    <select name="asignar_multa" id="asignar_multa" class="form-control selectpicker"  data-live-search="true">                        
                            
                        <option value="1" @if(1 == $general->asignar_multa) selected="selected" @endif>SI</option>
                        <option value="0" @if(0 == $general->asignar_multa) selected="selected" @endif>NO</option>
                        
    
                    </select>

                </div>

            </div>

            <div class="row">

                <div class="form-group md-1 mt-1">

                    {!! Form::label('dias_gracia', 'Días de Gracia') !!}
                    {!! Form::number('dias_gracia',  old ('dias_gracia'), ['class' =>'form-control', 'required'] ) !!}                    
                    @error('dias_gracia')

                        <span class="text-danger">{{$message}}</span>

                    @enderror
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