<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $rol=Rol::all();
        return view('admin.Rol.index',compact('rol'));
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
        $rol =new Rol();
        $rol->ModoUsuario = $request->TxtRol;
        $rol->save();

        session()->flash('message','ha sido agregado correctamente');
        return redirect()->route('admin.rol.index');
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
    public function destroy($IdRol)
    {
        $rol = Rol::find($IdRol);
        $rol->delete($rol);
        session()->flash('message','ha sido Eliminado correctamente');
        return redirect()->route('admin.rol.index');
    }
}
