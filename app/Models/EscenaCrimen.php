<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscenaCrimen extends Model
{
    use HasFactory;
    protected $primaryKey ='IdEscena';
    protected $fillable=[
        'Descripcion',
        'IdUbicacion',
    ];

    public $timestamps=false;

    public function Imagenes(){
        return $this->morphMany('App\Models\Imagene','ImagenTable');
    }
}
