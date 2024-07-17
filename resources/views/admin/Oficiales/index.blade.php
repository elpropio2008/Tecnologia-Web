@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>LISTA DE OFICIALES</h1>
@stop

@section('content')
    @livewire('admin.oficiales-index')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop

{{-- @extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>Lista de Oficiales</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="input-group mp-3">
                <input type="text" wire:model="Buscador" placeholder="Buscar Oficial" class="form-control">
                <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#FrmOficial">Agregar Oficial</a>
            </div>
        </div>
        @if ($Oficiales->count())
        <div class="card-body">
            <div>
            @if (session()->has('message'))
                <div class="alert alert-success text-center">{{session('message')}}</div>
            @endif
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>CI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha De Nacimiento</th>
                        <th>Grado</th>
                        <th>Sueldo</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Oficiales as $Oficial)
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
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#FrmOficialEdit{{$Oficial->IdOficial}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @include('admin.Oficiales.create')
                        @include('admin.Oficiales.edit')
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <strong>hay registros</strong>
        @endif
        
    </div>
@stop --}}