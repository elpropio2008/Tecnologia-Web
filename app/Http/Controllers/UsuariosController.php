<?php

namespace App\Http\Controllers;

use App\Livewire\Admin\Usuarios;
use App\Models\Oficiale;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        return view('admin.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Rol = Rol::all();
        $Oficiales = Oficiale::all();
        return view('admin.usuarios.create',compact('Rol','Oficiales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario =new User();
        $usuario->name = "A quien le importa este nombre";
        $usuario->email = $request->TxtEmail;
        $usuario->password = bcrypt($request->TxtContraseña);
        
        $usuario->HoraCreacion=date("H:i:s");
        $usuario->FechaCreacion=date("d-m-y");
        $usuario->IdRol=$request->CmbRol;
        $usuario->IdOficial=$request->CmbOficial;
        $usuario->save();

        session()->flash('message','Un Usuario ha sido agregado correctamente');
        return redirect()->route('admin.usuarios.index');
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
    public function destroy($IdUser)
    {
        $user = User::find($IdUser);
        $user->delete($user);
        session()->flash('message','Un Usuario ha sido Eliminado correctamente');
        return redirect()->route('admin.usuarios.index');
    }
    public function ObtenerOficial($IdOficial)
    {
        return Oficiale::find($IdOficial);
    }
    public function ObtenerRol($IdRol)
    {
        return Rol::find($IdRol);
    }
}
