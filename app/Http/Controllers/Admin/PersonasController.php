<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Declaracion;
use App\Models\Delito;
use App\Models\Imagene;
use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persona=Persona::all();
        return view('admin.Inicio.index',compact('persona'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.inicio.FrmAgregarPersona');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Persona=new Persona();
        $Persona->CI=$request->TxtCI;
        $Persona->Nombres=$request->TxtNombres;
        $Persona->Apellidos=$request->TxtApellidos;
        $Persona->FechaNacimiento=$request->TxtFecha;
        $Persona->EstadoCivil=$request->TxtEstadoCivil;
        $Persona->Profesion=$request->TxtProfesion;
        $Persona->Direccion=$request->TxtDireccion;
        $Persona->Telefono=$request->TxtTelefono;
        $Persona->save();
        $IdPersona=Persona::select('IdPersona')->orderBy('IdPersona','desc')->pluck('IdPersona')->first();
        if($request->file('TxtFile')){
            $Prueba =$request->file('TxtFile')->store('public/Imagenes/Personas');
            Imagene::create([
                //'url' => $request->file('TxtFile')->store('public/Personas'),
                'url' => basename($Prueba),
                'ImagenTable_id' => $IdPersona,
                'ImagenTable_type' => Persona::class
            ]);
        }
        else{
            $ruta=storage_path()."\app\public\Personas\SinImagen";
            Imagene::create([
                'url' => $ruta,
                'ImagenTable_id' => $IdPersona,
                'ImagenTable_type' => Persona::class
            ]);
        }
        session()->flash('message','Una Persona ha sido agregado correctamente');
        return redirect()->route('admin.inicio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /* $registro=DB::select("call MostrarRegistro('$id')");
        return view('admin.denuncias.index',compact('registro')); */
        $persona=Persona::with('Imagenes')->findOrFail($id);
        /* $persona=Persona::whereHas('RegistroDenuncias',function ($query){
            $query->where('RegistroDenuncias.NroRegistro', 2);
        })->with('RegistroDenuncias')->first(); */

        //$Imagenes=Imagene::Where('ImagenTable_id',$IdPersona)->Where('ImagenTable_type',Persona::class)->get();
        return $persona->imagenes[0]->Url;
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
        $Imagenes=Imagene::Where('ImagenTable_id',$IdPersona)->Where('ImagenTable_type',Persona::class)->get();
        while($Imagenes->count() > 0)
        {
            $IdImagen=Imagene::Where('ImagenTable_id',$IdPersona)->Where('ImagenTable_type',Persona::class)->pluck('id')->first();
            $ruta="public/Imagenes/Personas/".Imagene::select('url')->where('id',$IdImagen)->pluck('url')->first();
            //$ruta=Imagene::select('url')->where('id',$IdImagen)->pluck('url')->first();
            //$ruta=str_replace('\\','',$ruta);
            Storage::delete($ruta);
            $Imagen=Imagene::Where('id',$IdImagen)->first();
            $Imagen->destroy($IdImagen);
            $Imagenes=Imagene::Where('ImagenTable_id',$IdPersona)->Where('ImagenTable_type',Persona::class)->get();
        }
        $Persona=Persona::Where('IdPersona',$IdPersona);
        $Persona->delete($Persona);
        session()->flash('message','Una Persona ha sido Eliminado correctamente');
        return redirect()->route('admin.inicio.index');
        
        //$Id=Persona::find($IdPersona)->Imagenes->with("Imagenes");
        //$Id=Persona::with(["Imagenes"])->where('IdPersona',6)->first();

    }
}
