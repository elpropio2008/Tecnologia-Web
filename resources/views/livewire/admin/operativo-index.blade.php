<div>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
                    <button class="btn btn-secondary form-control" onclick="location.href='{{route('admin.operativo.edit',$registro)}}'">Añadir Operativo</button>
                    @foreach($operativo as $op)
                        <button class="list-group-item" align="center" wire:click="seleccionarOperativo({{$op->IdOperativo}})">Operativo: {{$op->IdOperativo}}</button>
                        <div>
                            Hora Del Operativo: {{$op->HoraOperativo}}<br>
                            Fecha Del Operativo: {{$op->FechaOperativo}} <br>
                            Descripcion Del Operativo: {{$op->Descripcion}}
                        </div>
                        <div>
                            <br>
                            <a href="{{route('admin.Oficiales.show',$op->IdOperativo)}}">Agregar Integrantes</a><br>
                            <form action="{{route('admin.operativo.destroy',$op->IdOperativo)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <br>
                                <input type="submit" class="btn btn-danger form-control" value="Borrar Operativo">
                            </form>
                            <br>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">
                {{-- Contenido principal --}}
                <div class="card">
                    <div class="card-body">
                        <h5 align="center">INTEGRANTES DEL OPERATIVO</h5>
                        <div class="products-grid">
                            @foreach ($Integrantes as $Oficial)
                                <div class="product">
                                    @if ($Oficial['Url'])
                                        <img src="{{asset('storage/Imagenes/Oficiales/'.$Oficial['Url'])}}" alt="{{$Oficial['Nombres']}} {{$Oficial['Apellidos']}}">
                                    @else
                                        <img src="{{asset('storage/Imagenes/Oficiales/SinImagen.png')}}" alt="{{$Oficial['Nombres']}} {{$Oficial['Apellidos']}}">
                                    @endif
                                    <div class="product-title">{{$Oficial['Grado']}} {{$Oficial['Nombres']}} {{$Oficial['Apellidos']}}</div>
                                    <div class="product-price">{{$Oficial['Profesion']}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 align="center">UBICACIONES DE OPERATIVOS REALIZADOS</h5>
                            <div class="products-grid">
                                @foreach($Ubicaciones as $Ubicacion)
                                <div class="product">
                                    <div class="product-title">Id {{$Ubicacion['IdUbicacion']}}</div>
                                    <div class="product-price">Lat: {{$Ubicacion['Latitud']}}</div>
                                    <div class="product-price">Lon: {{$Ubicacion['Longitud']}}</div>
                                    <div class="product-price">Ref: {{$Ubicacion['Referencias']}}</div>
                                    <div class="product-title">Estado {{$Ubicacion['Estado']}}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCanxcbSBgyFJxU5yzHFVoTVGzsq1LigUI&callback=initMap">
    </script> --}}
    <script>

    </script>
@stop