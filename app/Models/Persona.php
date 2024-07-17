<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $primaryKey ='IdPersona';
    protected $fillable=[
        'CI',
        'Nombres',
        'Apellidos',
        'FechaNacimiento',
        'EstadoCivil',
        'Profesion',
        'Direccion',
        'Telefono',
    ];

    public $timestamps=false;
    /*public function RegistroDenuncia(){
        return $this->belongsToMany('App\Models\RegistroDenuncia');
    }*/

    public function Imagenes(){
        return $this->morphMany('App\Models\Imagene','ImagenTable');
    }

    public function RegistroDenuncias(){
        return $this->belongsToMany(RegistroDenuncia::class,'Declaracione')->withPivot('Declaracion','IdPersona','NroRegistro','IdTipo');
    }

    /* return $this->belongsToMany(Venta::class, 'detalle_venta')
                    ->withPivot('cantidad'); */
}
