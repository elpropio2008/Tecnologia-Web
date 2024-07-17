@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1 align="center">REGISTRAR OPERATIVO</h1>
@stop

@section('content')
    {{-- <p>{{$NroRegistro}}</p> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6" {{-- class="column" --}}>
                <!-- Primera columna: campos de texto y botón de agregar -->
                <div class="card">
                    <div class="card-header">Detalles Del Operativo</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.operativo.store')}}">
                            @csrf
    
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" id="estado" name="estado" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="latitud">Latitud</label>
                                <input type="text" id="latitud" name="latitud" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="longitud">Longitud</label>
                                <input type="text" id="longitud" name="longitud" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="referencias">Referencias</label>
                                <textarea id="referencias" name="referencias" class="form-control" rows="3"></textarea>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6" {{-- class="column" --}}>
                <!-- Segunda columna: cuadro de imagen y botón para agregar imagen -->
                <div class="card">
                    <div class="card-header" align="center">SELECCIONAR UBICACION</div>
                    <div class="card-body">
                        <div>
                            <div wire:ignore id="map" style="height: 400px; width: 100%;"></div>
                        </div>
                    </div>
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
    </script>
@stop