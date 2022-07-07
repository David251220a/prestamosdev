@extends('adminlte::page')

@section('title', 'Prestamos DEV')

@section('content_header')    
    
    <h1>Crear Prestamos</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">

            {!! Form::open(['route' => 'prestamos.store', 'autocomplete' => 'off', 'files' => true]) !!}

                <div class="steps-form">
                    
                    <div class="steps-row setup-panel">

                        <div class="steps-step">
            
                            <a href="#step-1" type="button" class="btn btn-indigo btn-circle">1</a>            
                            <p>Paso 1</p>
                        
                        </div>
                        
                        <div class="steps-step">
                        
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>            
                            <p>Paso 2</p>
                        
                        </div>            

                        <div class="steps-step">
                        
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>            
                            <p>Paso 3</p>
                        
                        </div>

                        <div class="steps-step">
                        
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>            
                            <p>Paso 4</p>
                        
                        </div>

                        <div class="steps-step">
                        
                            <a href="#step-9" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>            
                            <p>Paso 3</p>
                        
                        </div> 

                    </div>

                </div>

                <div class="row setup-content" id="step-1">

                    <h4>Datos Generales</h4>

                    <div class="row">

                        <div class="form-group md-1 mt-1">

                            {!! Form::label('documento', 'Documento') !!}
                            {!! Form::text('documento',  $persona->documento, ['class' => ['form-control' ,'input-number' ,'validate'], 'readonly', 'required'] ) !!}
                            {!! Form::text('persona_id',  $persona->id, ['class' => ['form-control' ],'hidden',  'readonly', 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('documento')

                                <span class="text-danger">{{$message}}</span>

                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group md-form mt-3">
                            
                            {!! Form::label('nombre', 'Nombre y Apellido') !!}
                            {!! Form::text('nombre',  $persona->nombre .' ' .$persona->apellido , ['class' => ['form-control' ,'validate'], 'readonly', 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('nombre')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group md-form mt-3">

                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion',  $persona->direccion, ['class' => ['form-control' ,'validate'], 'readonly', 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('direccion')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror
        
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group md-form mt-3">

                            {!! Form::label('barrio', 'Barrio') !!}
                            {!! Form::text('barrio', null,['class' => 'form-control validate', 'placeholder' => 'Barrio...', 'readonly' ] ) !!}
                            @error('barrio')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror
                            
                        </div>

                    </div>

                    <div class="row">
                    
                        <div class="form-group md-form mt-3">

                            {!! Form::label('celular', 'Celular') !!}
                            {!! Form::text('celular',  $persona->celular,['class' => 'form-control', 'placeholder' => 'Celular...', 'readonly' ] ) !!}
                            @error('celular')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror

                        </div>
                        
                    </div>
                    
                    <div class="d-grid gap-2 d-md-block">

                        <button class="btn btn-primary btn-indigobtn-rounded nextBtn " type="button">Siguiente</button>

                    
                    </div> 
                    
                </div>

                <div class="row setup-content" id="step-2">

                    <div class="row">
    
                        <h4 class="text text-gray-400">Datos Laborales</h4>
    
                        <div class="form-group md-1 mt-1">
    
                            {!! Form::label('lugar_trabajo', 'Lugar de Trabajo') !!}

                            @php
                                $lugar_trabajo = "";
                            @endphp

                            @if (!(empty($persona->datosgeneral->lugar_trabajo)))

                                @php
                                    $lugar_trabajo = $persona->datosgeneral->lugar_trabajo;
                                @endphp
                                
                            @endif

                            {!! Form::text('lugar_trabajo',  old('lugar_trabajo', $lugar_trabajo), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('lugar_trabajo')
    
                                <span class="text-danger">{{$message}}</span>
    
                            @enderror
    
                        </div>
                        
                        <div class="form-group md-1 mt-1">

                            @php
                                $salario = "";
                            @endphp

                            @if (!(empty($persona->datosgeneral->salario)))

                                @php
                                    $salario = $persona->datosgeneral->salario;
                                @endphp
                                
                            @endif
    
                            {!! Form::label('salario', 'Salario') !!}
                            {!! Form::text('salario',  old('salario', $salario), ['class' => ['form-control', 'input-number' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('salario')
    
                                <span class="text-danger">{{$message}}</span>
    
                            @enderror
                            
                        </div>
    
                        <div class="form-group md-1 mt-1">

                            @php
                                $celular_trabajo = "";
                            @endphp

                            @if (!(empty($persona->datosgeneral->celular_trabajo)))

                                @php
                                    $celular_trabajo = $persona->datosgeneral->celular_trabajo
                                @endphp
                                
                            @endif
    
                            {!! Form::label('celular_trabajo', 'Nro Celular Trabajo') !!}
                            {!! Form::text('celular_trabajo',  old('celular_trabajo', $celular_trabajo ), ['class' => 'form-control'] ) !!}                        
                            
                        </div>
    
                        <div class="form-group md-1 mt-1">
    
                            @php
                                $direccion_trabajo = "";
                            @endphp

                            @if (!(empty($persona->datosgeneral->direccion_trabajo)))

                                @php
                                    $direccion_trabajo = $persona->datosgeneral->direccion_trabajo;
                                @endphp
                                
                            @endif

                            {!! Form::label('direccion_trabajo', 'Dirección trabajo') !!}
                            {!! Form::text('direccion_trabajo',  old('direccion_trabajo', $direccion_trabajo ), ['class' => 'form-control'] ) !!}                        
                            
                        </div>
    
                    </div>
                        
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary btn-indigo btn-rounded prevBtn" type="button">Atras</button>
                        <button class="btn btn-primary btn-indigobtn-rounded nextBtn " type="button">Siguiente</button>
                        {{-- <button class="btn btn-success btn-indigo btn-rounded nextBtn" type="submit">Siguiente</button> --}}
                    </div>
    
                </div>

                <div class="row setup-content" id="step-3">

                    <div class="row">
    
                        <h4 class="text text-gray-400">Prestamo</h4>
                        
                        <div class="row">                            

                            <div class="form-group md-1 mt-1">

                                {!! Form::label('producto_id', 'Producto') !!}
                                <select name="producto_id" id="producto_id" class="form-control selectpicker"  data-live-search="true">

                                    @foreach ($productos as $producto)
                                        
                                        <option value="{{$producto->id}}">{{$producto->producto}}</option>
                
                                    @endforeach
                
                                </select>
                                     

                            </div>
                        
                        </div>

                        <div class="form-group md-form mt-3">

                            {!! Form::label('tasa_id', 'Tasa') !!}
                            <select name="tasa_id" id="tasa_id" class="form-control selectpicker"  data-live-search="true">

                                @foreach ($tasas as $tasa)
                                    
                                    <option value="{{$tasa->id}}">{{$tasa->tasa}}</option>
            
                                @endforeach
            
                            </select>                            

                        </div>
                        
                        <div class="form-group md-1 mt-1">
    
                            {!! Form::label('monto_prestamo', 'Monto Solicitado') !!}
                            {!! Form::text('monto_prestamo', old('monto_prestamo'), ['class' => ['form-control', 'input-decimal' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('monto_prestamo')
    
                                <span class="text-danger">{{$message}}</span>
    
                            @enderror
    
                        </div>
                        
                        <div class="form-group md-1 mt-1">
    
                            {!! Form::label('plazo', 'Plazo') !!}
                            {!! Form::text('plazo',   old('plazo'), ['class' => ['form-control', 'input-number' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('plazo')
    
                                <span class="text-danger">{{$message}}</span>
    
                            @enderror
                            
                        </div>
    
    
                    </div>
                        
                    
    
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary btn-indigo btn-rounded prevBtn" type="button">Atras</button>
                        <button class="btn btn-primary btn-indigobtn-rounded nextBtn " type="button">Siguiente</button>
                        {{-- <button class="btn btn-success btn-indigo btn-rounded nextBtn" type="submit">Siguiente</button> --}}
                    </div>
    
                </div>

                <div class="row setup-content" id="step-4">

                    <div class="row">
    
                        <h4 class="text text-gray-400">Referencia</h4>
                        
                        <div class="form-group md-1 mt-1">

                            @php
                                $nombre_apellido_1 = "";
                            @endphp

                            @if (!(empty($persona->referencia->nombre_apellido_1)))

                                @php
                                    $nombre_apellido_1 = $persona->referencia->nombre_apellido_1;
                                @endphp
                                
                            @endif

                            {!! Form::label('nombre_apellido_1', '1) Nombre y Apellido 1') !!}
                            {!! Form::text('nombre_apellido_1',  old('nombre_apellido_1', $nombre_apellido_1), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('nombre_apellido_1')

                                <span class="text-danger">{{$message}}</span>

                            @enderror

                        </div>

                        <div class="form-group md-1 mt-1">

                            @php
                                $celular_1 = "";
                            @endphp

                            @if (!(empty($persona->referencia->celular_1)))

                                @php
                                    $celular_1 = $persona->referencia->celular_1;
                                @endphp
                                
                            @endif

                            {!! Form::label('celular_1', '1) Celular') !!}
                            {!! Form::text('celular_1',  old('celular_1', $celular_1), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('celular_1')

                                <span class="text-danger">{{$message}}</span>

                            @enderror

                        </div>

                        <div class="form-group md-1 mt-1">

                            @php
                                $direccion_1 = "";
                            @endphp

                            @if (!(empty($persona->referencia->direccion_1)))

                                @php
                                    $direccion_1 = $persona->referencia->direccion_1;
                                @endphp
                                
                            @endif
                            {!! Form::label('direccion_1', '1) Dirección') !!}
                            {!! Form::text('direccion_1',  old('direccion_1', $direccion_1), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('direccion_1')

                                <span class="text-danger">{{$message}}</span>

                            @enderror

                        </div>

                        <div class="form-group md-1 mt-1">

                            @php
                                $nombre_apellido_2 = "";
                            @endphp

                            @if (!(empty($persona->referencia->nombre_apellido_2)))

                                @php
                                    $nombre_apellido_2 = $persona->referencia->nombre_apellido_2;
                                @endphp
                                
                            @endif

                            {!! Form::label('nombre_apellido_2', '2) Nombre y Apellido') !!}
                            {!! Form::text('nombre_apellido_2',  old('nombre_apellido_2', $nombre_apellido_2), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('nombre_apellido_2')

                                <span class="text-danger">{{$message}}</span>

                            @enderror

                        </div>

                        <div class="form-group md-1 mt-1">

                            @php
                                $celular_2 = "";
                            @endphp

                            @if (!(empty($persona->referencia->celular_2)))

                                @php
                                    $celular_2 = $persona->referencia->celular_2;
                                @endphp
                                
                            @endif

                            {!! Form::label('celular_2', '2) Celular') !!}
                            {!! Form::text('celular_2',  old('celular_2', $celular_2), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('celular_2')

                                <span class="text-danger">{{$message}}</span>

                            @enderror

                        </div>

                        <div class="form-group md-1 mt-1">
                            
                            @php
                                $direccion_2 = "";
                            @endphp

                            @if (!(empty($persona->referencia->direccion_2)))

                                @php
                                    $direccion_2 = $persona->referencia->direccion_2;
                                @endphp
                                
                            @endif

                            {!! Form::label('direccion_2', '2) Dirección') !!}
                            {!! Form::text('direccion_2',  old('direccion_2', $direccion_2), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('direccion_2')

                                <span class="text-danger">{{$message}}</span>

                            @enderror

                        </div>
    
    
                    </div>
    
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary btn-indigo btn-rounded prevBtn" type="button">Atras</button>
                        <button class="btn btn-primary btn-indigobtn-rounded nextBtn " type="button">Siguiente</button>
                        {{-- <button class="btn btn-success btn-indigo btn-rounded nextBtn" type="submit">Siguiente</button> --}}
                    </div>
    
                </div>

            <div class="row setup-content" id="step-9">

                <div class="form-group md-1 mt-1">

                    {!! Form::label('factura', 'Factura') !!}
                    {!! Form::file('factura', ['class' => 'form-control-file', 'accept' => 'image/*'] ) !!}      
                    @error('factura')

                        <span class="text-danger">{{$message}}</span>

                    @enderror
                    <br>     

                    @if (!(empty($persona->documentos_foto->factura)))
                        <img id="picture1" src="{{asset($persona->documentos_foto->factura)}}" class="rounded mx-auto d-block" alt="">
                    @else
                        <img id="picture1" src="" class="rounded mx-auto d-block" alt="">
                    @endif
                    
                </div>

                <div class="form-group md-1 mt-1">

                    {!! Form::label('liquidacion', 'Liquidación') !!}
                    {!! Form::file('liquidacion', ['class' => 'form-control-file', 'accept' => 'image/*'] ) !!}
                    @error('liquidacion')

                        <span class="text-danger">{{$message}}</span>

                    @enderror                    
                    <br>
                    @if (!(empty($persona->documentos_foto->liquidacion)))
                        <img id="picture2" src="{{asset($persona->documentos_foto->liquidacion)}}" class="rounded mx-auto d-block" alt="">
                    @else
                        <img id="picture2" src="" class="rounded mx-auto d-block" alt="">
                    @endif
                    
                    
                </div>

                <div class="d-grid gap-2 d-md-block">

                    <button class="btn btn-primary btn-indigo btn-rounded prevBtn" type="button">Atras</button>
                    <button class="btn btn-success btn-indigo btn-rounded nextBtn" type="submit">Guardar</button>

                </div>


            </div>

            {!! Form::close() !!}

        </div>

    </div>
    
@stop

@section('css')

    <link rel="stylesheet" href="{{ asset('css/form-step.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form-group.has-error .help-block {
            display: block;
        }

        .form-group .help-block {
            display: none;
        }

        .image-wraper{
            position: relative;
            padding-bottom: 56%;
        }

        .image-wraper img{

            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;

        }

    </style>

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

            var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPrevBtn = $('.prevBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-indigo').addClass('btn-default');
                    $item.addClass('btn-indigo');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allPrevBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                prevStepSteps = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

                prevStepSteps.removeAttr('disabled').trigger('click');
            });

            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

                $(".form-group").removeClass("has-error");
                for(var i=0; i< curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        isValid = false;
                        // $(curInputs[i]).closest(".form-group").addClass("has-error");
                        $(curInputs[i]).parent().addClass('has-error');
                        $(curInputs[i]).parent().find('.help-block').html('Este campo es obligatorio.');
                    }
                }            

                if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
            });

        $('div.setup-panel div a.btn-indigo').trigger('click');                     

        });

        //CAMBIAR IMAGEN
        document.getElementById("factura").addEventListener('change', cambiarImagen);
        document.getElementById("liquidacion").addEventListener('change', cambiarImagen2);

        function cambiarImagen(event){

            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById('picture1').setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);

            // $('#picture1').show();

        }

        function cambiarImagen2(event){

            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById('picture2').setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);

        }        

    </script>

@endsection