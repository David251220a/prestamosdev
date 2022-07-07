@extends('adminlte::page')

@section('title', 'Code Dev')

@section('content_header')
    
    <h1>Editar Persona</h1>

@stop

@section('content')
    
    <div class="card">

        <div class="card-body">

            {!! Form::model($persona, ['route' => ['personas.update', $persona], 'method' => 'put' , 'file'=>'true', 'enctype'=>"multipart/form-data" ]) !!}

                <div class="steps-form">
                    
                    <div class="steps-row setup-panel">

                        <div class="steps-step">
            
                            <a href="#step-1" type="button" class="btn btn-indigo btn-circle">1</a>            
                            <p>Paso 1</p>
                        
                        </div>         

                        <div class="steps-step">
                        
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>            
                            <p>Paso 2</p>
                        
                        </div> 

                    </div>

                </div>

                <div class="row setup-content" id="step-1">

                    <h4>Datos Generales</h4>

                    <div class="row">

                        <div class="form-group md-1 mt-1">

                            {!! Form::label('documento', 'Documento') !!}
                            {!! Form::text('documento',  old('documento'), ['class' => ['form-control' ,'input-number' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('documento')

                                <span class="text-danger">{{$message}}</span>

                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group md-form mt-3">
                            
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre',  old('name'), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('nombre')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror

                        </div>

                    </div>
                    
                    <div class="row">

                        <div class="form-group md-form mt-3">

                            {!! Form::label('apellido', 'Apellido') !!}
                            {!! Form::text('apellido',  old('apellido'), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('apellido')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror

                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group md-form mt-3">

                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion',  old('direccion'), ['class' => ['form-control' ,'validate'], 'required'] ) !!}
                            <p class="help-block text-danger"></p>
                            @error('direccion')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror
        
                        </div>

                    </div>

                    <div class="row">
                    
                        <div class="form-group md-form mt-3">

                            {!! Form::label('celular', 'Celular') !!}
                            {!! Form::text('celular',  old('celular'),['class' => 'form-control', 'placeholder' => 'Celular...' ] ) !!}
                            @error('celular')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror

                        </div>
                        
                    </div>            

                    <div class="row">

                        <div class="form-group md-form mt-3">

                            {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
                            <input type="date" name="fecha_nacimiento" class="form-control" value="{{date('Y-d-m', strtotime($persona->fecha_nacimiento))}}">
                            @error('fecha_nacimiento')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror

                        </div>

                    </div>
                    
                    <div class="row">

                        <div class="form-group md-form mt-3">

                            {!! Form::label('departamentos_id', 'Departamento') !!}
                            {!! Form::select('departamentos_id', $departamentos, null, ['class' => 'form-control validate']) !!}                            

                        </div>

                    </div>
                    
                    <div class="row">

                        <div class="form-group md-form mt-3">

                            {!! Form::label('barrio', 'Barrio') !!}
                            {!! Form::text('barrio', null,['class' => 'form-control validate', 'placeholder' => 'Barrio...' ] ) !!}
                            @error('barrio')
        
                                <span class="text-danger">{{$message}}</span>
        
                            @enderror
                            
                        </div>

                    </div>
                    
                    <div class="d-grid gap-2 d-md-block">

                        <button class="btn btn-primary btn-indigobtn-rounded nextBtn " type="button">Siguiente</button>

                    
                    </div> 
                    
                </div>



                <div class="row setup-content" id="step-3">

                    <div class="form-group md-1 mt-1">

                        {!! Form::label('cedula_frontal', 'Cedula Frontal') !!}
                        {!! Form::file('cedula_frontal', ['class' => 'form-control-file', 'accept' => 'image/*'] ) !!}
                        @error('cedula_frontal')

                            <span class="text-danger">{{$message}}</span>

                        @enderror    

                        <br>
                        
                        @if (!(empty($persona->documentos_foto->cedula_frontal)))
                            <img id="picture1" src="{{asset($persona->documentos_foto->cedula_frontal)}}" class="rounded mx-auto d-block" alt="">
                        @else
                            <img id="picture1" src="" class="rounded mx-auto d-block" alt="">
                        @endif     
                        
                        
                        
                    </div>

                    <div class="form-group md-1 mt-1">

                        {!! Form::label('cedula_reversa', 'Cedula Reversa') !!}
                        {!! Form::file('cedula_reversa', ['class' => 'form-control-file', 'accept' => 'image/*'] ) !!}
                        @error('cedula_reversa')

                            <span class="text-danger">{{$message}}</span>

                        @enderror

                        <br>

                        @if (!(empty($persona->documentos_foto->cedula_reverso)))
                            <img id="picture2" src="{{asset($persona->documentos_foto->cedula_reverso)}}" class="rounded mx-auto d-block" alt="">
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
        document.getElementById("cedula_frontal").addEventListener('change', cambiarImagen);
        document.getElementById("cedula_reversa").addEventListener('change', cambiarImagen2);

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
