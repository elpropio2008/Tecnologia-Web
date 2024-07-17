@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    {{-- <h1 align="center">AGREGAR EVIDENCIA</h1> --}}
@stop

@section('content')
    {{-- <p>Nro De Registro {{$Declaracion->NroRegistro}}.</p> --}}

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header" align="center">AGREGAR EVIDENCIA</div>
                <div class="card-body">
                    <div>
                        <img id="Picture1" src="{{asset('Imagenes/Evidencias/SinImagen.png')}}" alt="" style="height: 450px; width: 100%">
                    </div>
                    <form action="{{route('admin.evidencia.store')}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <input type="file" id="Image1" name="TxtFile">
                        </div>
                        <div class="form-group">
                            <label for="descripcion1">Descripción De La Evidencia</label>
                            <input type="text" class="form-control" id="descripcion1" name="descripcion1">
                        </div>
                        <div class="form-group">
                            <label for="hipotesis1">Hipótesis</label>
                            <input type="text" class="form-control" id="hipotesis1" name="hipotesis1">
                        </div>
                        <div class="form-group">
                            <label for="select2">Seleccionar Testigo</label>
                            <select class="form-control" id="select2" name="select2">
                                <option value="">Seleccionar Testigo</option>
                                @foreach($Declaracion as $del)
                                    @php
                                        $Persona=app('App\Http\Controllers\Admin\Evidencias')->ObtenerPersona($del->IdPersona);
                                    @endphp
                                    <option value="{{$Persona->IdPersona}}">{{$Persona->Nombres}} {{$Persona->Apellidos}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select3">Seleccionar Escena Del Crimen</label>
                            <select class="form-control" id="select3" name="select3">
                                <option value="">Seleccionar Escena Del Crimen</option>
                                @foreach($Escena as $esc)
                                    <option value="{{$esc->IdEscena}}">{{$esc->Descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success form-control" value="Agregar Evidencia">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de Registro de Evidencia</div>

                    <div class="card-body">
                        Formulario de Laravel
                        <form method="POST" action="#" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                Columna izquierda
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="TxtDescripcionEvi">Descripción De La Evidencia</label>
                                        <input id="TxtDescripcionEvi" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="TxtHipotesis">Hipotesis</label>
                                        <input id="TxtHipotesis" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="TxtDescripcionEsc">Descripción De La Escena Del Crimen</label>
                                        <input id="TxtDescripcionEsc" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="TxtTestigo">Testigo</label>
                                        <input id="TxtTestigo" type="text" class="form-control">
                                    </div>
                                </div>

                                Columna derecha
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header" align="center">Imagen</div>
                                        <div class="card-body">
                                            <div>
                                                <img id="Picture" src="{{asset('storage/Imagenes/Personas/SinImagen.png')}}" alt="" style="height: 250px; width: 100%">
                                            </div>
                                        </div>
                                    </div>

                                    Campo de Imagen
                                    <div class="form-group">
                                        <input type="file" id="Image">
                                    </div>
                                </div>
                            </div>

                            Botón de Submit
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Agregar Evidencia
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
        document.getElementById('Image1').addEventListener('change',cambiarImagen1);
        function cambiarImagen1(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload =(event) => {
                document.getElementById('Picture1').setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop