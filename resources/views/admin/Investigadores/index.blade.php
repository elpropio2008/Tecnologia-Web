@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>SELECCIONAR INVESTIGADORES</h1>
@stop

@section('content')
    @livewire('admin.investigadores',['IdOperativo' => $IdOperativo])
    {{-- @livewire('admin.operativo-index', ['operativo' => $operativo, 'registro' => $registro]) --}}
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop