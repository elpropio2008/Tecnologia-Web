<div class="card">
    <div class="card-header">
        <form {{-- action="{{route('admin.registro.create')}}" method="GET" --}} wire:submit.prevent="AgregarDenuncia">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="input-group mp-3">
                        <input wire:model.live.debounce.300ms="searchTerm" class="form-control" placeholder="Buscar Por Nombres o Apellidos De La Persona">
                        {{-- <button class="btn btn-secondary">Añadir Persona</button> --}}
                    </div>
                    <div>
                        @if (!empty($personas))
                        {{-- <style>
                            ul{list-style-type: none;
                                width: 250px;
                                height: auto;
                                position: absolute;
                                z-index: 10;
                                padding: 10px
                            }
                            #personaauto{
                                background-color: #eeeeee;
                                border-top: 1px solid #9e9e9e;
                                padding: 10px;
                                width: 100%;
                                float: left;
                                cursor: pointer;
                            }
                        </style>
                            <ul>
                                @foreach ($personas as $persona)
                                    <li id="personaauto" wire:click="seleccionarPersona({{ $persona->IdPersona }})">
                                        {{$persona->IdPersona}} {{$persona->CI}} {{ $persona->Nombres }} {{ $persona->Apellidos }}</li>
                                @endforeach
                            </ul> --}}
                            <style>
                                #TablaAuto{
                                    cursor: pointer;
                                }
                            </style>
                            <table class="table table-striped" id="TablaAuto">
                                <thead>
                                    <tr>
                                        <th width="100px">Id Persona</th>
                                        <th>CI</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Estado Civil</th>
                                        <th>Profesion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($personas as $persona)
                                        <tr wire:click="seleccionarPersona({{ $persona->IdPersona }})">
                                            <td>{{$persona->IdPersona}}</td>
                                            <td>{{$persona->CI}}</td>
                                            <td>{{$persona->Nombres}}</td>
                                            <td>{{$persona->Apellidos}}</td>
                                            <td>{{$persona->EstadoCivil}}</td>
                                            <td>{{$persona->Profesion}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead align="center">
                                <tr>
                                    <th hidden=true>Id Persona</th>
                                    <th>Nombre Completo</th>
                                    <th hidden=true>Id Tipo</th>
                                    <th>Tipo</th>
                                    <th>Declaracion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datosespeciales as $datos)
                                    <tr>
                                        <td hidden=true >{{ $datos['IdPersona']}} </td>
                                        <td> {{$datos['Nombres']}} {{$datos['Apellidos']}}</td>
                                        <td hidden=true>Id Delito</td>
                                        <td>
                                            <select wire:model="datosespeciales.{{$loop->index}}.IdTipo">
                                                <option value="">Seleccionar Tipo De Persona</option>
                                                @foreach($TipoPersonas as $lista)
                                                    <option value="{{$lista->IdTipo}}" selected >{{$lista->Tipo}}</option>
                                                    {{-- <option value="{{$lista->IdTipo}}">{{$lista->Tipo}}</option> --}}
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><textarea wire:model="datosespeciales.{{$loop->index}}.Declaracion" cols="30" rows="2" class="form-control"></textarea></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group mp-3">
                        <input wire:model.live.debounce.300ms="BuscarDelitos" class="form-control" placeholder="Buscar Delitos">
                    </div>
                    <div>
                        @if (!empty($delitos))
                            <style>
                                #TablaAuto{
                                    cursor: pointer;
                                }
                            </style>
                            <table class="table table-striped" id="TablaAuto">
                                <thead>
                                    <tr>
                                        <th width="100px">Id Delito</th>
                                        <th>Delito</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($delitos as $delito)
                                        <tr wire:click="seleccionarDelitos({{ $delito->IdDelito }})">
                                            <td> {{$delito->IdDelito}} </td>
                                            <td> {{$delito->Delito}} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead align="center">
                                <tr>
                                    <th width="100px">Id Delito</th>
                                    <th width="150px">Delitos</th>
                                    <th>Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dDatosDelitos as $dato)
                                    <tr>
                                        <td>{{$dato['Id']}}</td>
                                        <td>{{$dato['Delito']}}</td>
                                        <td><input type="text" wire:model="dDatosDelitos.{{$loop->index}}.Descripcion" class="form-control"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <button class="btn btn-ligth form-control" data-toggle="modal" data-target="#exampleModal">LISTA DE EVIDENCIA</button>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Añadir Evidencias</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Aquí puedes agregar tu formulario modal
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="TxtDescripcion" class="form-label">Descripcion</label>
                                            <input type="text" class="form-control" id="TxtDescripcion" wire:model="pruebas2.Descripcion">
                                        </div>
                                        <div class="mb-3">
                                            <label for="TxtHipotesis" class="form-label">Hipotesis</label>
                                            <input type="text" class="form-control" id="TxtHipotesis" wire:model="pruebas2.Hipotesis">
                                        </div>
                                        <div class="mb-3">
                                            <label for="TxtDetalle" class="form-label">Detalles</label>
                                            <input type="text" class="form-control" id="TxtDetalle" wire:model="pruebas2.Detalle">
                                        </div>
                                        <div class="mb-3">
                                            <label for="TxtIdPersona" class="form-label">Id Persona</label>
                                            <input type="text" class="form-control" id="TxtIdPersona" wire:model="pruebas2.IdPersona">
                                        </div>
                                        <div class="mb-3">
                                            <label for="TxtTestigo" class="form-label">Testigo</label>
                                            <input type="text" class="form-control" id="TxtTestigo" wire:model="pruebas2.Testigo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="TxtLatitud" class="form-label">Latitud</label>
                                            <input type="text" class="form-control" id="latitude" wire:model="latitude">
                                        </div>
                                        <div class="mb-3">
                                            <label for="TxtLongitud" class="form-label">Longitud</label>
                                            <input type="text" class="form-control" id="longitude" wire:model="longitude">
                                        </div>
                                        <div class="mb-3">
                                            <label for="TxtReferencia" class="form-label">Referencia</label>
                                            <input type="text" class="form-control" id="TxtReferencia" wire:model="pruebas2.Referencias">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="Image-wrapper">
                                            <img id="Picture" src="{{asset('storage/Imagenes/Personas/SinImagen.png')}}" alt="">
                                        </div>
                                        <style>
                                            .Image-wrapper{
                                                position: relative;
                                                padding-bottom: 76.25%;
                                            }
                                            .Image-wrapper img{
                                                position: absolute;
                                                object-fit: cover;
                                                width: 100%;
                                                max-width: 250px;
                                            }
                                        </style>
                                        <input type="file" id="Image" wire:model="Imagen">
                                        <div>
                                            <div wire:ignore id="map" style="height: 400px; width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" wire:click="guardarDatos" data-dismiss="modal">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead align="center">
                            <tr>
                                <th>Descripcion</th>
                                <th>Hipotesis</th>
                                <th>Imagen De La Evidencia</th>
                                <th>Detalles De La Escena</th>
                                <th>Id Persona</th>
                                <th>Testigo</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Referencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pruebas as $prueba)
                                <tr>
                                    <td>{{$prueba['Descripcion']}}</td>
                                    <td>{{$prueba['Hipotesis']}}</td>
                                    <td>{{$prueba['Imagen']}}</td>
                                    <td>{{$prueba['Detalle']}}</td>
                                    <td>{{$prueba['IdPersona']}}</td>
                                    <td>{{$prueba['Testigo']}}</td>
                                    <td>{{$prueba['Latitud']}}</td>
                                    <td>{{$prueba['Longitud']}}</td>
                                    <td>{{$prueba['Referencias']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col">
                    <button class="btn btn-ligth form-control">OPERATIVO POLICIAL</button>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead align="center">
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Estado Del Operativo</th>
                                    <th>Id Ubicacion</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Referencia</th>
                                </tr>
                            </thead>
                        </table>  
                    </div>
                </div>
                <div class="col">
                    <div>
                        <input class="form-control" placeholder="Buscar Por Nombres o Apellidos Del Oficial">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead align="center">
                                    <tr>
                                        <th>Id Oficial</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Id Operativo</th>
                                        <th>Id Oficial</th>
                                        <th>Id Operativo</th>
                                        <th>Profesion</th>
                                    </tr>
                                </thead>
                            </table>  
                        </div>
                    </div>
                </div>
            </div> --}}
            <div>
                <input type="text" class="form-control" placeholder="Anotar Alguna Observacion" wire:model="Observacion"><br>
                <input type="submit" class="btn btn-success form-control" value="REGISTRAR DENUNCIA">
            </div>
        </form>
    </div>
</div>

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCanxcbSBgyFJxU5yzHFVoTVGzsq1LigUI&callback=initMap">
    </script>
    <script>
        document.getElementById('Image').addEventListener('change',cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload =(event) => {
                document.getElementById('Picture').setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
        
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', (message, component) => {
            if (message.updateCoordinates) {
                window.initMap(); // Llamar a initMap() para actualizar el mapa
            }
        });
    });

    function initMap() {
        const latitude = parseFloat(@json($latitude)) || 0;
        const longitude = parseFloat(@json($longitude)) || 0;

        const map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: latitude, lng: longitude },
            zoom: 15
        });

        const marker = new google.maps.Marker({
            /* position: { lat: latitude, lng: longitude }, */
            position: {lat: -17.338739672237296, lng: -63.272357421875014}, // Ejemplo: Nueva York
            map: map,
            draggable: true
        });

        marker.addListener('dragend', function(event) {
            updateMarkerPosition(marker.getPosition());
        });

        map.setCenter(marker.getPosition());
        map.setZoom(15)

        function updateMarkerPosition(latLng) {
            marker.setPosition(latLng);

            document.getElementById('latitude').value = latLng.lat();
            document.getElementById('longitude').value = latLng.lng();

            const newLatitude = latLng.lat();
            const newLongitude = latLng.lng();

            Livewire.emit('updateCoordinates', newLatitude, newLongitude);
        }
    }
    </script>
@stop