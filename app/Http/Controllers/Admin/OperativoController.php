<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EstadoOperativo;
use App\Models\OperativoPolicial;
use App\Models\Ubicacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperativoController extends Controller
{
    public $registro1;
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $NroRegistro = session('registro1');
        
        $Operativo=new OperativoPolicial();
        $Operativo->HoraOperativo=date('H:i:s');
        $Operativo->FechaOperativo=date("d-m-y");
        $Operativo->Descripcion=$request->descripcion;
        $Operativo->NroRegistro=$NroRegistro;
        $Operativo->save();

        $Ubicacion=new Ubicacione();
        $Ubicacion->Latitud=$request->latitud;
        $Ubicacion->Longitud=$request->longitud;
        $Ubicacion->Referencias=$request->referencias;
        $Ubicacion->save();

        $EstadoOperativo=new EstadoOperativo();
        $EstadoOperativo->Estado = $request->estado;
        $EstadoOperativo->IdOperativo = $Operativo->IdOperativo;
        $EstadoOperativo->IdUbicacion = $Ubicacion->IdUbicacion;
        $EstadoOperativo->save();

        return redirect()->route('admin.operativo.show',$NroRegistro);
    }

    /**
     * Display the specified resource.
     */
    public function show($registro)
    {
        $operativo = OperativoPolicial::Where('NroRegistro',$registro)->get();
        return view('admin.operativos.index',compact('registro','operativo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NroRegistro)
    {
        session(['registro1' => $NroRegistro]);
        return view('admin.operativos.create',compact('NroRegistro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $IdOficial)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($IdOperativo)
    {
        $Operativo = OperativoPolicial::find($IdOperativo);
        $registro=$Operativo->NroRegistro;
        $Operativo->delete($Operativo);
        return redirect()->route('admin.operativo.show',['Operativo' => $registro]);
    }
}
