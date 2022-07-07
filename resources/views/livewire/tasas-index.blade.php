<div class="card"> 

    @if ($tasas->count())
        
    
        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Tasa</th>
                        <th>Activo</th>
                        <th>Editar</th>                        

                    </tr>
                </thead>

                <tbody>

                    @foreach ($tasas as $tasa)

                        <tr>

                            <td>{{$tasa->id}}</td>
                            <td>{{$tasa->tasa}}</td>                                                        
                            @if ($tasa->activo == 1)
                                
                                <td width="10px">

                                    <form action="{{ route('tasas.destroy', $tasa) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <input type="hidden" name="activo" value="0">
                                        <button type="submit" class="btn btn-success btn-sm">Activo</button>
    
                                    </form>

                                </td>

                            @else

                                <td width="10px">

                                    <form action="{{ route('tasas.destroy', $tasa) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <input type="hidden" name="activo" value="1">
                                        <button type="submit" class="btn btn-secondary btn-sm">Inactivo</button>

                                    </form>

                                </td>

                            @endif
                            
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('tasas.edit', $tasa) }}">Editar</a>
                            </td>
                            
                        </tr>
                        
                    @endforeach

                </tbody>

            </table>
            

        </div>

        <div class="card-footer">

            {{$tasas->links()}}

        </div>
    
    @else 

        <div class="card-body">
            <strong>No hay ninguna coicidencia.</strong>
        </div>
        
    @endif

</div>
