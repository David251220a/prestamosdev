<div class="card">        

    <div class="card-header">        
        
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese numero de expediente">

    </div>

    @if ($prestamos->count())
        
    
        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>Expediente</th>
                        <th>Documento</th>
                        <th>Nombre y Apellido</th>
                        <th>Monto</th>                        
                        <th colspan="2"></th>

                    </tr>
                </thead>

                <tbody>

                    @foreach ($prestamos as $prestamo)

                        <tr>

                            <td>{{$prestamo->anio}}{{$prestamo->alias}}{{str_pad($prestamo->numero_expediente, 6, "0", STR_PAD_LEFT)}}</td>
                            <td>{{number_format($prestamo->documento, 0, ".", ".")}}</td>
                            <td>{{$prestamo->nombre}} {{$prestamo->apellido}}</td>                            
                            <td>{{number_format($prestamo->monto_prestamo, 0, ".", ".")}}</td>                                                        
                            <td width="10px">
                                <a class="btn btn-secondary btn-sm" href="#">PDF</a>
                            </td>                            
                            <td width="10px">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

                                </form>
                            </td>
                            
                        </tr>
                        
                    @endforeach

                </tbody>

            </table>
            

        </div>

        <div class="card-footer">

            {{$prestamos->links()}}

        </div>
    
    @else 

        <div class="card-body">
            <strong>No hay ninguna coicidencia.</strong>
        </div>
        
    @endif

</div>
