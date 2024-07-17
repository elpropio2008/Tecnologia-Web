<div class="card">
<div class="card-header">
    <div class="input-group mp-3">
        <input wire:model.live="Buscador" class="form-control" placeholder="Buscar Por Nombres De La Persona">
        <button class="btn btn-secondary" onclick="location.href='{{route('admin.inicio.create')}}'">Agregar Nuevo</button>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success text-center">{{session('message')}}</div>
    @endif
</div>
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>IdPersona</th>
                <th>CI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Fecha De Nacimiento</th>
                <th>Estado Civil</th>
                <th>Profesion</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Personas as $Persona)
                <tr>
                    <td>{{$Persona->IdPersona}}</td>
                    <td>{{$Persona->CI}}</td>
                    <td>{{$Persona->Nombres}}</td>
                    <td>{{$Persona->Apellidos}}</td>
                    <td>{{$Persona->FechaNacimiento}}</td>
                    <td>{{$Persona->EstadoCivil}}</td>
                    <td>{{$Persona->Profesion}}</td>
                    <td>{{$Persona->Direccion}}</td>
                    <td>{{$Persona->Telefono}}</td>
                    @if ($Persona->url)
                        <td><img src="{{asset('storage/Imagenes/Personas/'.$Persona->url)}}" alt="" width="100px"></td>
                    @else
                    <td><img src="{{asset('storage/Imagenes/Personas/SinImagen.png')}}" alt="" width="100px"></td>
                    @endif
                    <td width="10px">
                        <button class="btn btn-secondary" onclick="location.href='{{route('admin.registro.show',$Persona->IdPersona)}}'">Denuncias</button>
                        <form action="{{route('admin.inicio.destroy',$Persona->IdPersona)}}" method="POST">
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
