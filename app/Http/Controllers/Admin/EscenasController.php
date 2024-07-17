<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EscenaCrimen;
use App\Models\Imagene;
use App\Models\Ubicacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EscenasController extends Controller
{
    public function index()
    {
        return view('admin.escenas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.escenas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Ubicacion=new Ubicacione();
        $Ubicacion->Latitud = $request->latitud;
        $Ubicacion->Longitud = $request->longitud;
        $Ubicacion->Referencias = $request->referencias;
        $Ubicacion->save();
        $escena=new EscenaCrimen();
        $escena->Descripcion= $request->descripcion1;
        $escena->IdUbicacion = $Ubicacion->IdUbicacion;
        $escena->save();
        if($request->file('TxtFile')){
            $ruta=$request->file('TxtFile')->store('public/Imagenes/Escenas');
            Imagene::create([
                'url' => basename($ruta),
                'ImagenTable_id' => $escena->IdEscena,
                'ImagenTable_type' => EscenaCrimen::class,
            ]);
        }
        session()->flash('message','Escena Del Crimen ha sido agregado correctamente');
        return redirect()->route('admin.escenas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy($IdEscena)
    {
        $Escena=EscenaCrimen::find($IdEscena);
        $Ubicacion = Ubicacione::find($Escena->IdUbicacion);
        $Ubicacion->delete($Ubicacion);
        $Imagen = Imagene::Where('ImagenTable_id',$Escena->IdEscena)->Where('ImagenTable_type',EscenaCrimen::class)->get();
        foreach($Imagen as $img)
        {
            $ruta="public/Imagenes/Escenas/". $img->Url;
            Storage::delete($ruta);
            $img->delete($img);
        }
        $Escena->delete($Escena);
        session()->flash('message','Eliminacion Completada');
        return redirect()->route('admin.escenas.index');
    }
}
