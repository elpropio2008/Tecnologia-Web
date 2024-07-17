<div class="card">
    <div class="card-header">
        <div class="input-group mp-3">
            <form action="{{route('admin.tipos.store')}}" method="POST">
                @csrf
                <div>
                    <input class="form-control" placeholder="Ingrese El Tipo De Persona" name="TxtTipo">
                    <input type="submit" class="btn btn-secondary" value="Agregar Tipo">
                </div>
            </form>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success text-center">{{session('message')}}</div>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Tipo</th>
                    <th>Tipo</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipos as $ti)
                    <tr>
                        <td>{{$ti->IdTipo}}</td>
                        <td>{{$ti->Tipo}}</td>
                        <td width="10px">
                            <form action="{{route('admin.tipos.destroy',$ti->IdTipo)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>