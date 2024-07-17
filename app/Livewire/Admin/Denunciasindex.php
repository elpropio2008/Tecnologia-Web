<?php

namespace App\Livewire\Admin;

use App\Models\Imagene;
use App\Models\Persona;
use App\Models\RegistroDenuncia;
use App\Models\TipoPersona;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use function Laravel\Prompts\table;

class Denunciasindex extends Component
{
    public $registro=[];
    public $personas=[];
    public $Evidencias=[];

    public function render()
    {
        //$registro=DB::select("call MostrarRegistro('$registro')");
        return view('livewire.admin.denunciasindex');
    }

    public function seleccionarRegistro($NroRegistro)
    {
        $this->personas=[];
        $ListaPersonas=DB::table('Declaracione')->where('NroRegistro',$NroRegistro)->get();
        foreach($ListaPersonas as $lista)
        {
            //$persona=Persona::with('Imagenes')->findOrFail($id);
            $tipo=TipoPersona::Where('IdTipo',$lista->IdTipo)->first();
            $persona = Persona::with('Imagenes')->findOrFail($lista->IdPersona);
            $ruta=Imagene::Where('ImagenTable_id',$lista->IdPersona)->Where('ImagenTable_type',Persona::class)->pluck('Url')->first();
            $this->personas[]=[
                'id' => $lista->id,
                'Declaracion' => $lista->Declaracion,
                'IdPersona' => $lista->IdPersona,
                'NroRegistro' => $lista->NroRegistro,
                'IdTipo' => $lista->IdTipo,
                'Tipo' => $tipo->Tipo,
                'Nombres' => $persona->Nombres,
                'Apellidos' => $persona->Apellidos,
                'Url' => $ruta,
            ];
        }
        $this->seleccionarEvidencias($NroRegistro);
    }
    protected function seleccionarEvidencias($NroRegistro)
    {
        $this->Evidencias=[];
        $ListaEvidencias=DB::table('Hipotesis')->where('NroRegistro',$NroRegistro)->get();
        foreach($ListaEvidencias as $lista)
        {
            $Evidencia=DB::table('Evidencias')->where('IdEvidencia',$lista->IdEvidencia)->first();
            $this->Evidencias[]=[
                'id' => $lista->id,
                'Detalles' => $lista->Detalles,
                'NroRegistro' => $lista->NroRegistro,
                'IdEvidencia' => $lista->IdEvidencia,
                'Descripcion' => $Evidencia->Descripcion,
                'Url' => null,
            ];
        }
    }
}
