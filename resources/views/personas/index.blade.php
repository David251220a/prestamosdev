@extends('adminlte::page')

@section('title', 'Prestamos DEV')

@section('content_header')

    {{-- <a class="btn btn-secondary btn-sm float-right" href="#">Nuevo Prestamo</a> --}}
    <a class="btn btn-secondary btn-sm float-right" href=" {{route('personas.create')}}">Agregar Persona</a>
    <h1>Listado de Personas</h1>
@stop

@section('content')
    @if (session('info'))

        <div class="alert alert-success">

            <strong>{{session('info')}}</strong>

        </div>

    @endif
    @livewire('personas-index')
    
@stop

