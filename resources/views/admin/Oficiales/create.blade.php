@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>Agregar Oficial</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.Oficiales.store','files' => true]) !!}
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

                            {!! Form::label('TxtGrado', 'Grado:') !!}
                            {!! Form::text('TxtGrado', null, ['class' => 'form-control']) !!}

                            {!! Form::label('TxtSueldo', 'Sueldo:') !!}
                            {!! Form::text('TxtSueldo', null, ['class' => 'form-control']) !!}

                            {!! Form::label('TxtDireccion', 'Direccion:') !!}
                            {!! Form::text('TxtDireccion', null, ['class' => 'form-control']) !!}

                            {!! Form::label('TxtTelefono', 'Telefono:') !!}
                            {!! Form::text('TxtTelefono', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col">
                        <div class="Image-wrapper">
                            <img id="Picture" src="{{asset('storage/Imagenes/Oficiales/SinImagen.png')}}" alt="">
                        </div>
                        <div class="form-group">
                            {!! Form::label('TxtFile', 'Imagen a Mostrar') !!}
                            {!! Form::file('TxtFile', ['class' => 'form-control-file','accept' => 'image/*']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::submit('Agregar Oficial', ['class' => 'btn btn-primary']) !!}
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
{{-- <div wire:ignore.self class="modal fade text-left" id="FrmOficial" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-tittle">{{__('Registrar Oficial')}}</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.Oficiales.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="TxtCI" class="form-label">CI</label>
                            <input type="text" class="form-control" name="TxtCI" wire:modal.lazy='CI' placeholder="Carnet De Identidad">
                        </div>
                        <div class="mb-3">
                            <label for="TxtNombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="TxtNombres" wire:modal.lazy='Nombres' placeholder="Nombres">
                        </div>
                        <div class="mb-3">
                            <label for="TxtApellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="TxtApellidos" wire:model='Apellidos' placeholder="Apellidos">
                        </div>
                        <div class="mb-3">
                            <label for="TxtFecha" class="form-label">Fecha De Nacimiento</label>
                            <input type="date" class="form-control" name="TxtFecha" wire:model='Fecha De Nacimiento'>
                        </div>
                        <div class="mb-3">
                            <label for="TxtGrado" class="form-label">Grado</label>
                            <input type="text" class="form-control" name="TxtGrado" wire:model='Grado' placeholder="Grado">
                        </div>
                        <div class="mb-3">
                            <label for="TxtSueldo" class="form-label">Sueldo</label>
                            <input type="text" class="form-control" name="TxtSueldo" wire:model='Sueldo' placeholder="Sueldo">
                        </div>
                        <div class="mb-3">
                            <label for="TxtDireccion" class="form-label">Direccion</label>
                            <input type="text" class="form-control" name="TxtDireccion" wire:model='Direccion' placeholder="Direccion">
                        </div>
                        <div class="mb-3">
                            <label for="TxtTelefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="TxtTelefono" wire:model='Telefono' placeholder="Telefono">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar Formulario</button>
                            <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}