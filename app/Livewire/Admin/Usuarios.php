<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    public $Buscador;
    
    public function render()
    {
        $Users = User::Where('email','like','%'.$this->Buscador.'%')->get();
        //$Users = User::all();
        return view('livewire.admin.usuarios',compact('Users'));
    }
}
