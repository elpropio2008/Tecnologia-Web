<?php

namespace App\Livewire\Admin;

use App\Models\Imagene;
use App\Models\Oficiale;
use App\Models\OperativoPolicial;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OperativoIndex extends Component
{
    public $operativo;
    public $Integrantes=[];
    public $Ubicaciones=[];

    public $registro;

    public function render()
    {
        return view('livewire.admin.operativo-index');
    }

    public function seleccionarOperativo($IdOperativo)
    {
        $this->Integrantes=[];
        $ListaOficiales=DB::table('Investigadores')->where('IdOperativo',$IdOperativo)->get();        
        foreach($ListaOficiales as $lista)
        {
            $Oficiales=Oficiale::find($lista->IdOficial);
            $ruta=Imagene::Where('ImagenTable_id',$lista->IdOficial)->Where('ImagenTable_type',Oficiale::class)->pluck('Url')->first();
            $this->Integrantes[]=[
                'Grado' => $Oficiales->Grado,
                'Nombres' => $Oficiales->Nombres,
                'Apellidos' => $Oficiales->Apellidos,
                'Profesion' => $lista->Profesion,
                'Url' => $ruta,
            ];;
        }
        $this->ObtenerUbicaciones($IdOperativo);
    }

    protected function ObtenerUbicaciones($IdOperativo)
    {
        $this->Ubicaciones=[];
        $ListaUbicaciones=DB::table('estado_operativo')->where('IdOperativo',$IdOperativo)->get();
        foreach($ListaUbicaciones as $Ubicaciones)
        {
            $Ubicacion=DB::table('Ubicaciones')->where('IdUbicacion',$Ubicaciones->IdUbicacion)->first();
            $this->Ubicaciones[]=[
                'IdUbicacion' => $Ubicacion->IdUbicacion,
                'Latitud' => $Ubicacion->Latitud,
                'Longitud' => $Ubicacion->Longitud,
                'Referencias' => $Ubicacion->Referencias,
                'Estado' => $Ubicaciones->Estado,
            ];
        }
    }
}
