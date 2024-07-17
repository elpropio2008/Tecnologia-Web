<div class="card">
    <div class="card-header">
        <div class="input-group mp-3">
            <input wire:model.live="BuscarOficial" class="form-control" placeholder="Buscar Por Nombres O Apellido Del Oficial">
        </div>
        <div>
            @if(session()->has('success'))
                <div style="margin-top: 10px; background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('error'))
                <div style="margin-top: 10px; background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px;">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Oficial</th>
                    <th>CI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha De Nacimiento</th>
                    <th>Grado</th>
                    <th>Sueldo</th>
                    <th>Direccion</th>
                    <th>Profesion</th>
                    <th>Telefono</th>
                    <th>Imagenes</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Oficiales as $Oficial)
                    <tr>
                        <td>{{$Oficial->IdOficial}}</td>
                        <td>{{$Oficial->CI}}</td>
                        <td>{{$Oficial->Nombres}}</td>
                        <td>{{$Oficial->Apellidos}}</td>
                        <td>{{$Oficial->FechaNacimiento}}</td>
                        <td>{{$Oficial->Grado}}</td>
                        <td>{{$Oficial->Sueldo}}</td>
                        <td>{{$Oficial->Direccion}}</td>
                        <td><input type="text" class="form-control" wire:model="Oficiales.{{$loop->index}}.Profesion"></td>
                        <td>{{$Oficial->Telefono}}</td>
                        @if($Oficial->url)
                            <td><img src="{{asset('Imagenes/Oficiales/'.$Oficial->url)}}" alt="" width="100px"></td>
                        @else
                            <td><img src="{{asset('Imagenes/Oficiales/SinImagen.png')}}" alt="" width="100px"></td>
                        @endif
                        <td width="10px">
                            <button class="btn btn-primary" wire:click="AgregarInvestigador({{$Oficial->IdOficial}},{{$loop->index}})">Agregar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- <div>
    {{$IdOperativo}}

</div> --}}