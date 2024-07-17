@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>REGISTRO DE OPERATIVOS</h1>
@stop

@section('content')
    @livewire('admin.operativo-index', ['operativo' => $operativo, 'registro' => $registro])
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            padding: 10px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product img {
            max-width: 100%;
            height: auto;
            /* height: 150px; */
        }

        .product-title {
            font-weight: bold;
            margin-top: 10px;
        }

        .product-price {
            color: #666666;
            margin-top: 5px;
        }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop