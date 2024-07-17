<?php

namespace App\Livewire\Admin;

use App\Models\Investigadores as ModelsInvestigadores;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Investigadores extends Component
{
    public $IdOperativo;
    public $BuscarOficial="";
    public $Oficiales;

    public function render()
    {
        $Buscar=$this->BuscarOficial;
        $IdOp=$this->IdOperativo;
        $this->Oficiales=DB::select("call MostrarInvestigadores('$Buscar','$IdOp')");
        //return view('livewire.admin.investigadores',compact('Oficiales'));
        return view('livewire.admin.investigadores');
    }

    public function AgregarInvestigador($IdOficial, $index)
    {
        ModelsInvestigadores::create([
            'Profesion' => $this->Oficiales[$index]->Profesion,
            'IdOperativo' => $this->IdOperativo,
            'IdOficial' => $IdOficial,
        ]);

        $this->Oficiales[$index]->Profesion = "";
        session()->flash('success', 'El Investigador Ha Sido agregado correctamente.');
    }
}
