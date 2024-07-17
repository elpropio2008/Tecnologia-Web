<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Escenas extends Component
{
    public $escenas;

    public function render()
    {
        $esc=$this->escenas;
        $Escena=DB::select("call MostrarEscenasCrimen('$esc')");
        return view('livewire.admin.escenas',compact('Escena'));
    }
}
