<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficiale extends Model
{
    use HasFactory;
    protected $primaryKey ='IdOficial';
    protected $fillable=[
        'CI',
        'Nombres',
        'Apellidos',
        'FechaNacimiento',
        'Grado',
        'Sueldo',
        'Direccion',
        'Telefono',
    ];
    public $timestamps=false;
    public function User(){
        return $this->hasMany('App\Models\User');
    }

    public function Imagenes(){
        return $this->morphMany('App\Models\Imagene','ImagenTable');
    }
}
