<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegistroDenuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrarDenunciasController extends Controller
{
    public $IdPersona;
    public function index()
    {
        //$Registro = RegistroDenuncia::all();
        //return $Registro;
        return view('admin.RegistrarDenuncias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return redirect()->route('admin.registro.index');
    }

    public function MostrarListaDeclaracion($NroRegistro)
    {
        return $NroRegistro;
        //return redirect()->route('admin.denuncias.index',compact('NroRegistro'));
    }

    public function show(string $IdPersona)
    {
        session(['IdPersona' => $IdPersona]);
        $registro=DB::select("call MostrarRegistro('$IdPersona')");
        return view('admin.denuncias.index',compact('registro'));
    }

    public function ObtenerListaDelitos($NroRegistro)
    {
        $lista=DB::table('lista_delitos')->select('*')->where('NroRegistro',$NroRegistro)->get();
        return $lista;
    }

    public function edit($NroRegistro)
    {
        $Declaracion=DB::table('Declaracione')->where('NroRegistro',$NroRegistro)->get();
        $registro=RegistroDenuncia::find($NroRegistro);
        //return $registro;
        /* $registro=DB::select("call MostrarRegistro('$NroRegistro')");
        return redirect()->route('admin.denuncias.index',compact('registro')); */
        return view('admin.denuncias.index',compact('registro'));
    }

    public function destroy($NroRegistro)
    {
        $Nro=RegistroDenuncia::find($NroRegistro);
        $IdPerson=session('IdPersona');
        $Nro->delete($Nro);
        return redirect()->route('admin.registro.show',['Registro' => $IdPerson]);
    }

    public function ObtenerDelistos($IdDelito)
    {
        $Delitos=DB::table('Delitos')->select('*')->where('IdDelito',$IdDelito)->get();
        return $Delitos;
    }
}
