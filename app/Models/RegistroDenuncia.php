<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroDenuncia extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $primaryKey ='NroRegistro';
    protected $fillable=[
        'Hora',
        'Fecha',
        'Observaciones',
        'id',
    ];
    public function Personas(){
        return $this->belongsToMany(Persona::class,'Declaracione')->withPivot('Declaracion','IdPersona','NroRegistro','IdTipo');
    }

    public function Evidencia(){
        return $this->belongsToMany(Evidencia::class,'Hipotesis')->withPivot('Detalles','NroRegistro','IdEvidencia');
    }

    public function Tipo(){
        return $this->belongsTo('App\Models\TipoPersona');
    }

    public function Usuario(){
        return $this->belongsTo('App\Models\User');
    }

    public function OperativoPolicials(){
        return $this->hasMany('App\Models\OperativoPolicial');
    }
}
