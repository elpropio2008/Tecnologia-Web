<div class="card">
    <div class="card-header">
        <div class="input-group mp-3">
            <input wire:model.live="BuscarOficial" class="form-control" placeholder="Buscar Por Nombres O Apellido Del Oficial">
            {{-- <a href="#" class="btnh btn-secondary">Agregar Nuevo</a> --}}
            <button class="btn btn-secondary" onclick="location.href='{{route('admin.Oficiales.create')}}'">Agregar Nuevo</button>
            {{-- <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#FrmOficial">Agregar Oficial</a> --}}
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Oficial</th>
                    <th>CI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha De Nacimiento</th>
                    <th>Grado</th>
                    <th>Sueldo</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Imagenes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Oficiales as $Oficial)
                    <tr>
                        <td>{{$Oficial->IdOficial}}</td>
                        <td>{{$Oficial->CI}}</td>
                        <td>{{$Oficial->Nombres}}</td>
                        <td>{{$Oficial->Apellidos}}</td>
                        <td>{{$Oficial->FechaNacimiento}}</td>
                        <td>{{$Oficial->Grado}}</td>
                        <td>{{$Oficial->Sueldo}}</td>
                        <td>{{$Oficial->Direccion}}</td>
                        <td>{{$Oficial->Telefono}}</td>
                        @if($Oficial->url)
                            <td><img src="{{asset('storage/Imagenes/Oficiales/'.$Oficial->url)}}" alt="" width="100px"></td>
                        @else
                            <td><img src="{{asset('storage/Imagenes/Oficiales/SinImagen.png')}}" alt="" width="100px"></td>
                        @endif
                        <td width="10px">
                            <a class="btn btn-primary" href="{{route('admin.Oficiales.edit',$Oficial->IdOficial)}}">Editar</a>
                            <form action="{{route('admin.Oficiales.destroy',$Oficial->IdOficial)}}" method="POST">
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
    