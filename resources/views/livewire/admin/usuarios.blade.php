<div class="card">
    <div class="card-header">
        <div class="input-group mp-3">
            <input wire:model.live="Buscador" class="form-control" placeholder="Buscar Por Email Del Usuario">
            <button class="btn btn-secondary" onclick="location.href='{{route('admin.usuarios.create')}}'">Agregar Nuevo</button>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Usuario</th>
                    <th>Email</th>
                    <th>Hora De Creacion</th>
                    <th>Fecha De Creacion</th>
                    <th>Rol</th>
                    <th>Pertenece A</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->HoraCreacion }}</td>
                        <td>{{ $user->FechaCreacion }}</td>
                        @php
                            $Rol=app('App\Http\Controllers\UsuariosController')->ObtenerRol($user->IdRol);
                            $Oficial=app('App\Http\Controllers\UsuariosController')->ObtenerOficial($user->IdOficial);
                        @endphp
                        <td>{{ $Rol->ModoUsuario }}</td>
                        <td>{{ $Oficial->Nombres }} {{ $Oficial->Apellidos }}</td>
                        <td width="10px">
                            <form action="{{route('admin.usuarios.destroy',$user->id)}}" method="POST">
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
