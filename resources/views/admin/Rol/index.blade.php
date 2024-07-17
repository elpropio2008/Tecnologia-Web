@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>LISTA DE ROLES DEL USUARIO</h1>
@stop

@section('content')
    
<div class="card">
    <div class="card-header">
        <div class="input-group mp-3">
            <form action="{{route('admin.rol.store')}}" method="POST">
                @csrf
                <div>
                    <input class="form-control" placeholder="Ingrese El Rol Del Usuario" name="TxtRol">
                    <input type="submit" class="btn btn-secondary" value="Agregar Rol">
                </div>
            </form>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Rol</th>
                    <th>Modo De Usuario</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rol as $roles)
                    <tr>
                        <td>{{$roles->IdRol}}</td>
                        <td>{{$roles->ModoUsuario}}</td>
                        <td width="10px">
                            <form action="{{route('admin.tipos.destroy',$roles->IdRol)}}" method="POST">
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

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop