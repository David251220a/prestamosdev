@extends('adminlte::page')

@section('title', 'Prestamos DEV')

@section('content_header')    
    
    <h1>Persona: {{ $persona->nombre }} {{ $persona->apellido }} </h1>

@stop

@section('content')

    <div class="card">

        <div class="card-body">
                
            <table id="example" class="table table-bordered table-responsive-lg">
                
                <thead>

                    <tr style="text-align: center">
                        
                        <th>Pretamo</th>
                        <th>Cuota</th>
                        <th>Monto Cuota</th>
                        <th>Fecha Vencimiento</th>
                        <th>Capital</th>
                        <th>Interes</th>
                        <th>Atraso</th>
                        <th>Multa</th>
                        <th>Total Cuota</th>
                        <th>Opciones</th>

                    </tr>

                </thead>

                <tbody>
                    
                    @foreach($prestamos_detalles as $prestamos)

                        @php
                            $total_cuota = 0;
                        @endphp
                        
                        @if ($general->asignar_multa == 0)

                            @php $total_cuota = $prestamos->monto_cuota +  $prestamos->multa @endphp

                        @else
                            
                            @php $total_cuota = $prestamos->monto_cuota  @endphp

                        @endif

                        <tr @if($prestamos->atraso >= 1) class="table-danger" @elseif(date('m-Y', strtotime($prestamos->fecha_vencimiento)) == (date('m-Y', strtotime($date)))) class="table-primary" @endif>

                            <td style="text-align: right">{{$prestamos->numero_expediente}}</td>
                            <td style="text-align: right">{{number_format($prestamos->cuota, 0, ".", ".")}}</td>
                            <td style="text-align: right">{{number_format($prestamos->monto_cuota,0, ".", ".")}}</td>
                            <td style="text-align: center">{{ date('m-Y', strtotime($prestamos->fecha_vencimiento))}}</td>
                            <td style="text-align: right">{{number_format($prestamos->capital,0, ".", ".")}}</td>
                            <td style="text-align: right">{{number_format($prestamos->interes,0, ".", ".")}}</td>
                            <td style="text-align: right">{{number_format($prestamos->atraso,0, ".", ".")}}</td>
                            @if ($general->asignar_multa == 0)
                                
                                <td style="text-align: right">{{number_format($prestamos->multa,0, ".", ".")}}</td>

                            @else
                                
                                <td style="text-align: right">0</td>

                            @endif
                            <td style="text-align: right">{{number_format($total_cuota, 0, ".", ".")}}</td>
                            <td>
                                {{-- <button class="btn btn-success btn-sm">Cobro Total</button>
                                <button class="btn btn-primary btn-sm">Ajustar Cobro</button> --}}
                                <div class="btn-group">

                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Accion
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">Cobro Total</a>
                                      <a class="dropdown-item" href="#">Ajustar Cobro</a>                                      
                                    </div>
                                  </div>
                            </td>
                            
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>


@stop

@section('css')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

@stop

@section('js')    

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.jss"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

    <script>
            
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por paginas",
                    "zeroRecords": "No hay coicidencia",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)", 
                    'search': 'Buscar', 
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                }
            });
        } );

    </script>

@endsection