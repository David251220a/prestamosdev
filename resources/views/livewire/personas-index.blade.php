<div class="card">        

    <div class="card-header">        
        
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese nombre de la persona">

    </div>

    @if ($personas->count())
        
    
        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Documento</th>
                        <th>Nombre y Apellido</th>
                        <th>Dirección</th>
                        <th>Celular</th>
                        <th colspan="3"></th>

                    </tr>
                </thead>

                <tbody>

                    @foreach ($personas as $persona)

                        <tr>

                            <td>{{$persona->id}}</td>
                            <td>{{$persona->documento}}</td>
                            <td>{{$persona->nombre}} {{$persona->apellido}}</td>                            
                            <td>{{$persona->direccion}}</td>
                            <td>{{$persona->celular}}</td>
                            <td width="10px">
                                <a class="btn btn-success btn-sm" href="#">Prestamo</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('personas.edit', $persona) }}">Editar</a>
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

            {{$personas->links()}}

        </div>
    
    @else 

        <div class="card-body">
            <strong>No hay ninguna coicidencia.</strong>
        </div>
        
    @endif

</div>
