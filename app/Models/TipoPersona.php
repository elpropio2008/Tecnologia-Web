<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    use HasFactory;
    protected $primaryKey ='IdTipo';
    protected $fillable=[
        'Tipo',
    ];

    public $timestamps=false;

    public function Declaracion(){
        return $this->hasMany('App\Models\Declaracion');
    }
    public function Tipo(){
        return $this->hasMany('App\Models\RegistroDenuncia');
    }
}
