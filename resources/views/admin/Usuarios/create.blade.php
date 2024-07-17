@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>REGISTRAR USUARIOS</h1>
@stop

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-6" {{-- class="column" --}}>
            <!-- Primera columna: campos de texto y botón de agregar -->
            <div class="card">
                <div class="card-header">Detalles Del Usuario</div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.usuarios.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="TxtEmail">Email</label>
                            <input type="text" name="TxtEmail" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="TxtContraseña">Contraseña</label>
                            <input type="password" name="TxtContraseña" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="CmbRol">Rol</label>
                            <select class="form-control" name="CmbRol">
                                <option value="">Seleccionar Rol</option>
                                @foreach($Rol as $rol)
                                    <option value="{{$rol->IdRol}}">{{$rol->ModoUsuario}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="CmbOficial">Oficial</label>
                            <select class="form-control" name="CmbOficial">
                                <option value="">Seleccionar Oficial</option>
                                @foreach($Oficiales as $oficial)
                                    <option value="{{$oficial->IdOficial}}">{{$oficial->Nombres}} {{$oficial->Apellidos}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop