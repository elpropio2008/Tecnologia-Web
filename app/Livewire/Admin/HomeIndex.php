<?php

namespace App\Livewire\Admin;

use App\Models\Imagene;
use App\Models\Oficiale;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class HomeIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $Buscador="";

    public function render()
    {   
        /*$Personas = Persona::join('Imagenes','Personas.IdPersona','=','Imagenes.ImagenTable_id')
        ->select('Personas.*','Imagenes.url')
        ->Where('Personas.Nombres','LIKE','%'.$this->Buscador.'%')
        ->orWhere('Personas.Apellidos','LIKE','%'.$this->Buscador.'%')
        ->orderBy('Personas.IdPersona','desc')
        ->paginate();*/
        /*$Personas=Persona::where('Nombres','LIKE','%'. $this->Buscador .'%')
        ->orWhere('Apellidos','LIKE','%'.$this->Buscador.'%')
        ->orderBy('IdPersona','desc')
        ->paginate();
        $IdPersona=Persona::select('IdPersona')->where('Nombres','LIKE','%'. $this->Buscador .'%')
        ->orWhere('Apellidos','LIKE','%'.$this->Buscador.'%')->pluck('IdPersona')->first();
        //$Imagen=Imagene::Where('id',7)->first();
        $Imagen=Imagene::Where('id',$IdPersona)->first();*/
        $Persona=$this->Buscador;
        $Personas=DB::select("call MostrarPersonas('$Persona')");
        return view('livewire.admin.home-index',compact('Personas'));
    }
}
