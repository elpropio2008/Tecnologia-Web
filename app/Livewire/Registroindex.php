<?php

namespace App\Livewire;

use App\Models\Declaracion;
use App\Models\Delito;
use App\Models\ListaDelitos;
use App\Models\Persona;
use App\Models\RegistroDenuncia;
use App\Models\TipoPersona;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Psy\CodeCleaner\AssignThisVariablePass;

class Registroindex extends Component
{
    use WithFileUploads;
    public $searchTerm="";
    public $personas;
    public $datosespeciales=[];

    public $BuscarDelitos="";
    public $delitos;
    public $dDatosDelitos=[];

    public $ListaTipoPersona;

    public $Imagen;

    public $pruebas=[];

    public $pruebas2=[
        'Descripcion' => '',
        'Hipotesis' => '',
        'Imagen' => '',
        'Detalle' => '',
        'IdPersona' => '',
        'Testigo' => '',
        'Latitud' => '',
        'Longitud' => '',
        'Referencias' => '',
    ];

    public $latitude;
    public $longitude;

    public $Observacion;
    public $Declaracion;
    public function render()
    {
        $TipoPersonas=TipoPersona::all();
        return view('livewire.admin.registroindex',compact('TipoPersonas'));
    }

    public function updatedSearchTerm($value)
    {
        if(!empty($value))
        {
            $this->personas = Persona::where('nombres', 'like', '%' . $value . '%')
                                 ->orWhere('apellidos', 'like', '%' . $value . '%')
                                 ->limit(10) // Limitar a 10 resultados
                                 ->get();
        }
        else
        { $this->personas=[]; }
    }
    public function seleccionarPersona($personaId)
    {
        $Persona=Persona::find($personaId);
        if($Persona)
        {
            $this->datosespeciales[] =[
                'IdPersona' => $Persona->IdPersona,
                'Nombres' => $Persona->Nombres,
                'Apellidos' => $Persona->Apellidos,
            ];
        }
        $this->personas="";
        $this->searchTerm="";
    }
    public function updatedBuscarDelitos($value)
    {
        if(!empty($value))
        {
            $this->delitos = Delito::where('Delito', 'like', '%' . $value . '%')
                                 ->limit(10) // Limitar a 10 resultados
                                 ->get();
        }
        else
        { $this->delitos=[]; }
    }
    public function seleccionarDelitos($delitoId)
    {
        $delito=Delito::find($delitoId);
        if($delito)
        {
            $this->dDatosDelitos[] =[
                'Id' => $delito->IdDelito,
                'Delito' => $delito->Delito,
            ];
        }
        $this->delitos=[];
        $this->BuscarDelitos="";
    }

    public function guardarDatos()
    {
       $this->pruebas[]=[
        'Descripcion' => $this->pruebas2['Descripcion'],
        'Hipotesis' => $this->pruebas2['Hipotesis'],
        /* 'Imagen' => $this->pruebas2['Imagen'], */
        'Imagen' => $this->Imagen,
        'Detalle' => $this->pruebas2['Detalle'],
        'IdPersona' => $this->pruebas2['IdPersona'],
        'Testigo' => $this->pruebas2['Testigo'],
        /* 'Latitud' => $this->pruebas2['Latitud'], */
        'Latitud' => $this->latitude,
        /* 'Longitud' => $this->pruebas2['Longitud'], */
        'Longitud' => $this->longitude,
        'Referencias' => $this->pruebas2['Referencias'],
       ];

    }
    public function AgregarDenuncia()
    {
        RegistroDenuncia::create([
            'Hora' => date("H:i:s"),
            'Fecha' => date("d-m-y"),
            'Observaciones' => $this->Observacion,
            'id' => auth()->user()->id,
        ]);
        $NroRegistro=RegistroDenuncia::orderBy('NroRegistro','desc')->pluck('NroRegistro')->first(); 

        foreach($this->datosespeciales as $dato)
        {
            Declaracion::create([
                'Declaracion' => $dato['Declaracion'],
                'IdPersona' => $dato['IdPersona'],
                'NroRegistro' => $NroRegistro,
                'IdTipo' => $dato['IdTipo'],
            ]);
        }

        foreach($this->dDatosDelitos as $dato2)
        {
            ListaDelitos::create([
                'Descripcion' => $dato2['Descripcion'],
                'IdDelitos' => $dato2['Id'],
                'NroRegistro' => $NroRegistro,
            ]);
        }
        //session()->flash('message', 'Delito guardado correctamente.');
        $this->reset(['dDatosDelitos','datosespeciales','Observacion']);
    }
}
