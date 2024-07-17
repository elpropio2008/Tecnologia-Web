@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>Agregar Persona</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.inicio.store','files' => true]) !!}
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('TxtCI', 'CI:') !!}
                            {!! Form::text('TxtCI', null, ['class' => 'form-control']) !!}
                            {!! Form::label('TxtNombres', 'Nombres:') !!}
                            {!! Form::text('TxtNombres', null, ['class' => 'form-control']) !!}
                            {!! Form::label('TxtApellidos', 'Apellidos:') !!}
                            {!! Form::text('TxtApellidos', null, ['class' => 'form-control']) !!}

                            {!! Form::label('TxtFecha', 'Fecha De Nacimiento:') !!}
                            {!! Form::date('TxtFecha', null, ['class' => 'form-control']) !!}

                            {!! Form::label('TxtEstadoCivil', 'Estado Civil:') !!}
                            {!! Form::text('TxtEstadoCivil', null, ['class' => 'form-control']) !!}

                            {!! Form::label('TxtProfesion', 'Profesion:') !!}
                            {!! Form::text('TxtProfesion', null, ['class' => 'form-control']) !!}

                            {!! Form::label('TxtDireccion', 'Direccion:') !!}
                            {!! Form::text('TxtDireccion', null, ['class' => 'form-control']) !!}

                            {!! Form::label('TxtTelefono', 'Telefono:') !!}
                            {!! Form::text('TxtTelefono', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col">
                        <div class="Image-wrapper">
                            <img id="Picture" src="{{asset('storage/Imagenes/Personas/SinImagen.png')}}" alt="">
                        </div>
                        <div class="form-group">
                            {!! Form::label('TxtFile', 'Imagen a Mostrar') !!}
                            {!! Form::file('TxtFile', ['class' => 'form-control-file','accept' => 'image/*']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::submit('Agregar Persona', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .Image-wrapper{
            position: relative;
            padding-bottom: 76.25%;
        }
        .Image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 450px;
            height: 450px;
        }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
        document.getElementById('TxtFile').addEventListener('change',cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload =(event) => {
                document.getElementById('Picture').setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop