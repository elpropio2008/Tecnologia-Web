@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>CREAR ESCENA DEL CRIMEN</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Detalles</div>
            <div class="card-body">
                <img id="Picture1" src="{{asset('storage/Imagenes/Escenas/SinImagen.png')}}" alt="" style="height: 250px; width: 100%">
                <form action="{{route('admin.escenas.store')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <input type="file" id="Image1" name="TxtFile">
                    </div>
                    <div class="form-group">
                        <label for="descripcion1">Descripción</label>
                        <input type="text" class="form-control" id="descripcion1" name="descripcion1">
                    </div>
                    <div class="form-group">
                        <label for="latitud">Latitud</label>
                        <input type="text" class="form-control" id="latitud" name="latitud">
                    </div>
                    <div class="form-group">
                        <label for="longitud">Longitud</label>
                        <input type="text" class="form-control" id="longitud" name="longitud">
                    </div>
                    <div class="form-group">
                        <label for="referencias">Referencias</label>
                        <textarea id="referencias" name="referencias" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success form-control" value="Agregar Escena Del Crimen">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Mapa</div>
            <div class="card-body">
                <div id="map" style="height: 400px; width: 100%;"></div>
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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCanxcbSBgyFJxU5yzHFVoTVGzsq1LigUI&callback=initMap">
    </script>
    <script>
        var map;
    var marker;

    function initMap() {
        var myLatLng = { lat: -17.338739672237296, lng: -63.272357421875014 }; // Coordenadas iniciales

        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });

        marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            draggable: true
        });

        // Actualizar campos de latitud y longitud cuando el marcador se mueve
        google.maps.event.addListener(marker, 'dragend', function(event) {
            document.getElementById('latitud').value = event.latLng.lat();
            document.getElementById('longitud').value = event.latLng.lng();
        });
    }

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