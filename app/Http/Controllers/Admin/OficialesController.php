<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Imagene;
use Illuminate\Http\Request;
use App\Models\Oficiale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OficialesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Oficiales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Oficiales.create');
        /* $Oficial=Oficiale::whereDoesntHave('Imagenes',function(Builder $query)
        {
            $query->Where('ImagenTable_type',Persona::class)
            ->orWhere('ImagenTable_type',Evidencia::class)
            ->orWhere('ImagenTable_type',EscenaCrimen::class);
        })->join('Imagenes','Oficiales.IdOficial','=','Imagenes.ImagenTable_id')
        ->get(); */

        /* $Oficial=Oficiale::join('Imagenes',function(JoinClause $join){
            $join->on('Oficiales.IdOficial','=','Imagenes.ImagenTable_id');
        })->get(); */
        /* DB::table('users')
        ->join('contacts', function (JoinClause $join) {
            $join->on('users.id', '=', 'contacts.user_id')->orOn(/* ... */
        //})
        //->get(); */

        /*$Oficiales=Oficiale::all();
        $Imagenes=Imagene::Where('ImagenTable_id',$Oficiales->IdOficial)->get();
        $Oficial=$Oficiales->merge($Imagenes);*/

        /* $posts = App\Post::whereDoesntHave('comments', function (Builder $query) {
            $query->where('content', 'like', 'foo%');
        })->get(); */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Oficial=new Oficiale();
        $Oficial->CI=$request->TxtCI;
        $Oficial->Nombres=$request->TxtNombres;
        $Oficial->Apellidos=$request->TxtApellidos;
        $Oficial->FechaNacimiento=$request->TxtFecha;
        $Oficial->Grado=$request->TxtGrado;
        $Oficial->Sueldo=$request->TxtSueldo;
        $Oficial->Direccion=$request->TxtDireccion;
        $Oficial->Telefono=$request->TxtTelefono;
        $Oficial->save();
        $IdOficial=Oficiale::select('IdOficial')->orderBy('IdOficial','desc')->pluck('IdOficial')->first();
        if($request->file('TxtFile'))
        {
            $ruta= $request->file('TxtFile')->store('public/Imagenes/Oficiales');
            Imagene::create([
                'url' => basename($ruta),
                'ImagenTable_id' => $IdOficial,
                'ImagenTable_type' => Oficiale::class
            ]);
        }

        session()->flash('message','Nuevo Oficial ha sido agregado correctamente');
        return redirect()->route('admin.Oficiales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($IdOperativo)
    {
        return view('admin.Investigadores.index',compact('IdOperativo'));
        //return view('admin.Oficiales.edit',compact('Oficial'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($IdOficial)
    {
        $Oficial=Oficiale::find($IdOficial);
        $Img=Oficiale::find($IdOficial)->imagenes->select('Url')->pluck('Url')->first();

        return view('admin.Oficiales.edit',compact('Oficial','Img'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $IdOficial)
    {
        $Oficial=Oficiale::find($IdOficial);
        if($request->file('TxtFile'))
        {
            $Img=Oficiale::find($IdOficial)->imagenes->select('Url')->pluck('Url')->first();
            if($Img)
            {
                $url = $request->file('TxtFile')->store('public/Imagenes/Oficiales');
                $IdImagen=Oficiale::find($IdOficial)->imagenes->select('id')->pluck('id')->first();
                $ruta="public/Imagenes/Oficiales/".$Img;
                $Imagen=Imagene::find($IdImagen);
                $Imagen->update([
                    'id' => $IdImagen,
                    'url' => basename($url),
                    'ImagenTable_id' => $IdOficial,
                    'ImagenTable_type' => Oficiale::class
                ]);
                Storage::delete($ruta);
            }
            else
            {
                $url = $request->file('TxtFile')->store('public/Imagenes/Oficiales');
                Imagene::create([
                    'url' => basename($url),
                    'ImagenTable_id' => $IdOficial,
                    'ImagenTable_type' => Oficiale::class
                ]);
            }
        }
        $Oficial->update([
            'CI' => $request->TxtCI,
            'Nombres' => $request->TxtNombres,
            'Apellidos' => $request->TxtApellidos,
            'FechaNacimiento' => $request->TxtFecha,
            'Grado' => $request->TxtGrado,
            'Sueldo' => $request->TxtSueldo,
            'Direccion' => $request->TxtDireccion,
            'Telefono' => $request->TxtTelefono,
        ]);
        session()->flash('message','Datos Del Oficial ha sido Actualizado correctamente');
        return redirect()->route('admin.Oficiales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($IdOficial)
    {
        $Imagen=Oficiale::find($IdOficial)->imagenes;
        foreach($Imagen as $ima)
        {
            $Img=Oficiale::find($IdOficial)->imagenes->select('Url')->pluck('Url')->first();
            $ruta="public/Imagenes/Oficiales/". $Img;
            Storage::delete($ruta);
            $ima->destroy($ima->id);
        }
        $Oficial=Oficiale::where('IdOficial',$IdOficial)->first();
        $Oficial->destroy($IdOficial);

        session()->flash('message',' El Oficial '.$Oficial->Nombres.' '. $Oficial->Apellidos .' ha sido Eliminado correctamente');
        return redirect()->route('admin.Oficiales.index');
    }
}
