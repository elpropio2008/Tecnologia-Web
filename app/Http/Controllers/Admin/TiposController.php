<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoPersona;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function index()
    {
        return view('admin.tipos.index');
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
        $tipo = new TipoPersona();
        $tipo->Tipo = $request->TxtTipo;
        $tipo->save();

        session()->flash('message','ha sido agregado correctamente');
        return redirect()->route('admin.tipos.index');
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
    public function destroy($IdTipo)
    {
        $tipo = TipoPersona::find($IdTipo);
        $tipo->delete($tipo);

        session()->flash('message','ha sido Eliminado correctamente');
        return redirect()->route('admin.tipos.index');
    }
}
