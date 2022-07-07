<div class="card"> 

    @if ($productos->count())
        
    
        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Producto</th>
                        <th>Alias</th>
                        <th>Activo</th>
                        <th>Editar</th>                        

                    </tr>
                </thead>

                <tbody>

                    @foreach ($productos as $producto)

                        <tr>

                            <td>{{$producto->id}}</td>
                            <td>{{$producto->producto}}</td>
                            <td>{{$producto->alias}}</td>
                            @if ($producto->activo == 'A')
                                
                                <td width="10px">

                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <input type="hidden" name="activo" value="I">
                                        <button type="submit" class="btn btn-success btn-sm">Activo</button>
    
                                    </form>

                                </td>

                            @else

                                <td width="10px">

                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <input type="hidden" name="activo" value="A">
                                        <button type="submit" class="btn btn-secondary btn-sm">Inactivo</button>

                                    </form>

                                </td>

                            @endif
                            
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('productos.edit', $producto) }}">Editar</a>
                            </td>
                            
                        </tr>
                        
                    @endforeach

                </tbody>

            </table>
            

        </div>

        <div class="card-footer">

            {{$productos->links()}}

        </div>
    
    @else 

        <div class="card-body">
            <strong>No hay ninguna coicidencia.</strong>
        </div>
        
    @endif

</div>
