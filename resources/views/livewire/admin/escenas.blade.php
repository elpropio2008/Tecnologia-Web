<div class="card">
    <div class="card-header">
        <div class="input-group mp-3">
            <input wire:model.live="escenas" class="form-control" placeholder="Buscar Por Descripcion De La Escena">
            <button class="btn btn-secondary" onclick="location.href='{{route('admin.escenas.create')}}'">Agregar Nuevo</button>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Referencias</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Escena as $Esc)
                    <tr>
                        <td>{{$Esc->IdEscena}}</td>
                        <td>{{$Esc->Descripcion}}</td>
                        @if($Esc->url)
                            <td><img src="{{asset('storage/Imagenes/Escenas/'.$Esc->url)}}" alt="" width="100px"></td>
                        @else
                            <td><img src="{{asset('storage/Imagenes/Escenas/SinImagen.png')}}" alt="" width="100px"></td>
                        @endif
                        <td>{{$Esc->Latitud}}</td>
                        <td>{{$Esc->Longitud}}</td>
                        <td>{{$Esc->Referencias}}</td>
                        <td width="10px">
                            <form action="{{route('admin.escenas.destroy',$Esc->IdEscena)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>