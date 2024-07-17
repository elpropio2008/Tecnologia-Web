@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>LISTA DE USUARIOS</h1>
@stop

@section('content')
    {{-- @livewire('admin.usuarios') --}}
    @livewire('admin.usuarios')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop