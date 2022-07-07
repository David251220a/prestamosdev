@php
    $monto_cuota=""
@endphp
@php  $total_interes = 0 @endphp
@php  $total_iva = 0 @endphp
@php  $total_general = 0 @endphp
@if(!(empty($calculos)))

    @foreach ($calculos as $a)

        @php
            $monto_cuota = $a->monto_cuota;
        @endphp
        @php  $total_interes += $a->interes  @endphp        
        @php  $total_general += $a->Total_Cuota  @endphp
        
    @endforeach
    
@endif

@extends('adminlte::page')

@section('title', 'Prestamos DEV')

@section('content_header')    
    
    <h1>Prestamos</h1>

@stop

@section('content')
    
{!! Form::open(array('route'=>'prestamos.consulta', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search')) !!}
    
    <div class="card">

        <div class="card-body">

            <div class="mb-3">
                
                {!! Form::label('monto', 'Monto Solicitado', ['class' => 'form-label']) !!}
                {!! Form::text('monto', number_format($monto, 0, ".", "."), ['class' => ['form-control', 'input-decimal']] ) !!}
        
            </div>

            <div class="mb-3">
  
                {!! Form::label('plazo', 'Plazo', ['class' => 'form-label']) !!}
                {!! Form::text('plazo', $plazo, ['class' => ['form-control', 'input-decimal']] ) !!}                
        
            </div>

            <div class="mb-3">                
                                
                {!! Form::label('tasa_id', 'Tasa', ['class' => 'form-label']) !!}
                <select name="tasa_id" id="tasa_id" class="form-control selectpicker"  data-live-search="true">

                    @foreach ($tasas as $tasa)
                        
                        <option value="{{$tasa->tasa}}" @if($tasa->tasa == $tasa_id) selected="selected" @endif>{{$tasa->tasa}}</option>

                    @endforeach

                </select>
        
            </div>

            <div class="mb-3">                
                                
                {!! Form::label('producto_id', 'Producto', ['class' => 'form-label']) !!}
                <select name="producto_id" id="producto_id" class="form-control selectpicker"  data-live-search="true">

                    @foreach ($productos as $producto)
                        
                        <option value="{{$producto->producto}}" @if($producto->producto == $producto_id) selected="selected" @endif>{{$producto->producto}}</option>

                    @endforeach

                </select>                    
        
            </div>            

            <div class="form-group">

                <div class="input-group">
                                            
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </span>                
        
                </div>
        
            </div>            

            @if(!(empty($calculos)))
                
                <div class="row w-100 align-items-center ">                
                                    
                    <div class="col text-center alert alert-primary" role="alert">

                        El monto de la cuota es: {{number_format($monto_cuota, 0, ".", ".")}}. 

                    </div>
            
                </div>
                <div class="row w-100 align-items-center">
                    
                    <div class="col text-center">
                    
                        <button id="ver" type="button" class="btn btn-success regular-button">Ver mas</button>
                    
                    </div>	

                </div>
                
            @endif

            <div class="row" id="detalles" style="display: none;">
                <br>                
                @if(!(empty($calculos)))

                    <table class="table table-striped table-bordered">

                        <thead>

                            <tr style="text-align: center">

                                <th>Cuota</th>
                                <th>Monto Cuota</th>
                                <th>Fecha Vencimiento</th>
                                <th>Capital</th>
                                <th>Interes</th>
                                <th>Total Cuota</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($calculos as $calc)
                                
                                <tr>

                                    <td style="text-align: right">{{number_format($calc->cuota, 0, ".", ".")}}</td>
                                    <td style="text-align: right">{{number_format($calc->monto_cuota,0, ".", ".")}}</td>
                                    <td style="text-align: center">{{ date('d-m-Y', strtotime($calc->fecha_vencimiento))}}</td>
                                    <td style="text-align: right">{{number_format($calc->capital,0, ".", ".")}}</td>
                                    <td style="text-align: right">{{number_format($calc->interes,0, ".", ".")}}</td>
                                    <td style="text-align: right">{{number_format($calc->Total_Cuota,0, ".", ".")}}</td>

                                </tr>

                            @endforeach                            

                        </tbody>

                        <tfoot>
                            
                            <tr>
                                <td scope="row" colspan="3"><b> TOTALES </b></td>
                                <td style="text-align: right"><b> {{number_format($monto,0, ".", ".")}} </b></td>                    
                                <td style="text-align: right"><b> {{number_format($total_interes,0, ".", ".")}} </b></td>
                                <td style="text-align: right"><b> {{number_format($total_general,0, ".", ".")}} </b></td>                        
            
                            </tr>
        
                        </tfoot>

                    </table>
                    
                @endif


            </div>

        </div>

    </div>
    
{{Form::close() }}

@stop

@section('css')

    <link rel="stylesheet" href="{{ asset('css/form-step.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@stop

@section('js')
    
    {{-- <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>     --}}
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>
            
        $(document).ready(function () {
            
            // $('#picture1').hide();

            $('.input-number').on('input', function () { 
                this.value = this.value.replace(/[^0-9]/g,'');
            });   

            $(".input-decimal").on({
                "focus": function (event) {
                    $(event.target).select();
                },
                "keyup": function (event) {
                    $(event.target).val(function (index, value ) {
                        return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{0})$/, '$1')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                    });
                }

            });
   
            $('#ver').click(function (event) {
                event.preventDefault();
                $("#detalles").css("display", "block");                
            });              

        });     

    </script>

@endsection