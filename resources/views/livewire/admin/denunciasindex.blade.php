<div>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
                    <h5 align="center">REGISTROS</h5>
                    @foreach($registro as $reg)
                        <button wire:click="seleccionarRegistro({{$reg->NroRegistro}})" class="list-group-item">Nro De Registro: {{$reg->NroRegistro}}</button>
                        <div>
                            <br>
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
                            <a href="{{route('admin.evidencia.show',$reg->NroRegistro)}}">Agregar Evidencia</a><br>
                            <a href="{{route('admin.operativo.show',$reg->NroRegistro)}}">Ver Operativo Policial</a><br>
                            <form action="{{route('admin.registro.destroy',$reg->NroRegistro)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <br>
                                <input type="submit" class="btn btn-danger form-control" value="Borrar Registro">
                            </form>
                            {{-- <a href="#">Borrar Registro</a> --}}
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">
                {{-- Contenido principal --}}
                <div class="card">
                    <div class="card-body">
                        <h5 align="center">Personas Implicadas En La Denuncia</h5>
                        <div class="products-grid">
                            @foreach($personas as $per)
                                <div class="product">
                                    @if ($per['Url'])
                                        <img src="{{asset('Imagenes/Personas/'.$per['Url'])}}" alt="{{$per['Nombres']}} {{$per['Apellidos']}}">
                                    @else
                                        <img src="{{asset('Imagenes/Personas/SinImagen.png')}}" alt="{{$per['Nombres']}} {{$per['Apellidos']}}">
                                    @endif
                                    <div class="product-title">{{$per['Nombres']}} {{$per['Apellidos']}}</div>
                                    <div class="product-title">{{$per['Tipo']}}</div>
                                    <div class="product-price">{{$per['Declaracion']}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 align="center">Lista De Evidencias</h5>
                            <div class="products-grid">
                                @foreach($Evidencias as $evidencia)
                                    <div class="product">
                                        @if ($evidencia['Url'])
                                            <img src="{{asset('Imagenes/Evidencias/'.$evidencias['Url'])}}" alt="Evidencias Nro: {{$evidencia['IdEvidencia']}}">
                                        @else
                                            <img src="{{asset('Imagenes/Evidencias/SinImagen.png')}}" alt="Evidencias Nro: {{$evidencia['IdEvidencia']}}">
                                        @endif
                                        <div class="product-title">Evidencia: {{$evidencia['Descripcion']}}</div>
                                        <div class="product-price">Hipotesis: {{$evidencia['Detalles']}}</div>
                                        <button class="btn btn-danger form-control">Elimnar Evidencia</button>
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
