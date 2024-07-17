<?php

namespace App\Livewire\Admin;

use App\Models\TipoPersona;
use Livewire\Component;

class Tipos extends Component
{
    public function render()
    {
        $tipos = TipoPersona::all();
        return view('livewire.admin.tipos',compact('tipos'));
    }

}
