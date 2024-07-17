<?php

namespace App\Livewire\Admin;

use App\Models\EscenaCrimen;
use App\Models\Evidencia;
use App\Models\Oficiale;
use App\Models\Persona;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class OficialesIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $BuscarOficial="";

    public function render()
    {
        /* $Oficiales=Oficiale::all() */;
        /* $Oficiales = Oficiale::join('Imagenes','Oficiales.IdOficial','=','Imagenes.ImagenTable_id')
        ->select('Oficiales.*','Imagenes.*')
        ->Where('Oficiales.Nombres','LIKE','%'.$this->BuscarOficial.'%')
        ->Where('ImagenTable_type',Oficiale::class)
        ->orWhere('Oficiales.Apellidos','LIKE','%'.$this->BuscarOficial.'%')
        ->orderBy('Oficiales.IdOficial','desc')
        ->paginate(); */

        /* $Oficiales=Oficiale::whereDoesntHave('Imagenes',function(Builder $query)
        {
            $query->Where('ImagenTable_type',Persona::class)
            ->orWhere('ImagenTable_type',Evidencia::class)
            ->orWhere('ImagenTable_type',EscenaCrimen::class);
        })
        ->select('Oficiales.*')
        ->get(); */
        $Oficial=$this->BuscarOficial;
        $Oficiales=DB::select("call MostrarOficiales('$Oficial')");
        //$Oficiales=DB::select("call MostrarOficiales(?)",$this->BuscarOficial);
        //$Oficiales=DB::select('call MostrarOficiales("$this->BuscarOficial")');
        return view('livewire.admin.oficiales-index',compact('Oficiales'));
    }
}
