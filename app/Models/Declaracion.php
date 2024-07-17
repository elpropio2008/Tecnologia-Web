<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaracion extends Model
{
    use HasFactory;
    protected $table='Declaracione';
    protected $primaryKey ='id';
    protected $fillable=[
        'Declaracion',
        'IdPersona',
        'NroRegistro',
        'IdTipo',
    ];

    public $timestamps=false;

    public function TipoPersona(){
        return $this->belongsTo('App\Models\TipoPersona');
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function RegistroDenuncia()
    {
        return $this->belongsTo(RegistroDenuncia::class);
    }
}
