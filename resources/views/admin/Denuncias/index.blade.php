@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>REGISTRO DE DENUNCIAS</h1>
@stop

@section('content')
    {{-- @livewire('admin.denunciasindex') --}}
    @livewire('admin.denunciasindex', ['registro' => $registro])
    {{-- <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
                    @foreach($registro as $reg)
                        <a href="{{route('admin.registro.edit',$reg->NroRegistro)}}" class="list-group-item">
                            Nro De Registro: {{$reg->NroRegistro}} <br>
                        </a>
                        <div>
                            <h5>Registro De La Denuncia</h5>
                            Hora De La Denuncia: {{$reg->Hora}} <br>
                            Fecha De La Denuncia: {{$reg->Fecha}} <br>
                            Observacion: {{$reg->Observaciones}} <br>
                        </div>
                        <div>
                            @php
                                $array=app('App\Http\Controllers\Admin\RegistrarDenunciasController')->ObtenerListaDelitos($reg->NroRegistro);
                            @endphp
                            <h5>Cargos De La Denuncia</h5>
                            @foreach($array as $lista)
                                @php
                                    $Delitos=app('App\Http\Controllers\Admin\RegistrarDenunciasController')->ObtenerDelistos($lista->IdDelitos);
                                @endphp
                                @foreach($Delitos as $del)
                                    {{ $del->Delito }}:: {{ $lista->Descripcion }} <br>
                                @endforeach
                            @endforeach
                        </div>
                        <div>
                            <br>
                            <a href="#">Ver Operativo Policial</a><br>
                            <a href="#">Borrar Registro</a>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">
                Contenido principal
                <div class="card">
                    <div class="card-body">
                        <h5 align="center">Personas Implicadas En La Denuncia</h5>
                        <div class="products-grid">
                            <div class="product">
                                <img src="https://via.placeholder.com/200" alt="Producto 1">
                                <div class="product-title">Producto 1</div>
                                <div class="product-price">$19.99</div>
                            </div>
                            <div class="product">
                                <img src="https://via.placeholder.com/200" alt="Producto 2">
                                <div class="product-title">Producto 2</div>
                                <div class="product-price">$29.99</div>
                            </div>
                            <div class="product">
                                <img src="https://via.placeholder.com/200" alt="Producto 3">
                                <div class="product-title">Producto 3</div>
                                <div class="product-price">$39.99</div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 align="center">Lista De Evidencias</h5>
                            <div class="products-grid">
                                <div class="product">
                                    <img src="https://via.placeholder.com/200" alt="Producto 1">
                                    <div class="product-title">Producto 1</div>
                                    <div class="product-price">$19.99</div>
                                </div>
                                <div class="product">
                                    <img src="https://via.placeholder.com/200" alt="Producto 2">
                                    <div class="product-title">Producto 2</div>
                                    <div class="product-price">$29.99</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
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