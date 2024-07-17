<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Declaracion;
use App\Models\EscenaCrimen;
use App\Models\Evidencia;
use App\Models\Hipotesis;
use App\Models\Imagene;
use App\Models\Persona;
use Illuminate\Http\Request;

class Evidencias extends Controller
{    
    public $NroRegistro;
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $NroRegistro=session('NroRegistro');
        $Evidencia = new Evidencia();
        $Evidencia->Descripcion = $request->descripcion1;
        $Evidencia->declaracion_id = $request->select2;
        $Evidencia->IdEscena = $request->select3;
        $Evidencia->save();
        if($request->file('TxtFile'))
        {
            $ruta = $request->file('TxtFile')->store('public/Imagenes/Evidencias');
            Imagene::create([
                'url' => basename($ruta),
                'ImagenTable_id' => $Evidencia->IdEvidencia,
                'ImagenTable_type' => Evidencia::class
            ]);
        }
        $hipotesis = new Hipotesis();
        $hipotesis->Detalles = $request->hipotesis1;
        $hipotesis->NroRegistro = $NroRegistro;
        $hipotesis->IdEvidencia = $Evidencia->IdEvidencia;
        $hipotesis->save();
        return redirect()->route('admin.evidencia.show',['Evidencia' => $NroRegistro]);
    }

    /**
     * Display the specified resource.
     */
    public function show($NroRegistro)
    {
        session(['NroRegistro' => $NroRegistro]);
        $Declaracion = Declaracion::Where('NroRegistro',$NroRegistro)->get();
        $Escena=EscenaCrimen::all();
        return view('admin.Evidencias.create',compact('Declaracion','Escena'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($IdPersona)
    {
        //
    }
    public function ObtenerPersona($IdPersona)
    {
        $Persona=Persona::find($IdPersona);
        return $Persona;
    }
}
