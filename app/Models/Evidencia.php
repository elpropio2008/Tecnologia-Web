<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;
    protected $primaryKey ='IdEvidencia';
    protected $fillable=[
        'Descripcion',
        'declaracion_id',
        'IdEscena',
    ];

    public $timestamps=false;
    public function Imagenes(){
        return $this->morphMany('App\Models\Imagene','ImagenTable');
    }

    public function RegistroDenuncias(){
        return $this->belongsToMany(RegistroDenuncia::class,'Hipotesis')->withPivot('Detalles','NroRegistro','IdEvidencia');
    }
}
