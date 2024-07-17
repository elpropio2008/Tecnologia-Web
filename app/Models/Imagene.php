<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagene extends Model
{
    use HasFactory;
    protected $primaryKey ='id';
    public $timestamps=false;
    protected $fillable=[
        'url',
        'ImagenTable_id',
        'ImagenTable_type'
    ];

    public function ImagenTable()
    {
        return $this->morphTo();
    }
    /*public function Persona(){
        return $this->belongsTo('App\Models\Persona');
    }
    public function Oficial(){
        return $this->belongsTo('App\Models\Oficiale');
    }

    public function Escena(){
        return $this->belongsTo('App\Models\EscenaCrimen');
    }
    public function Evidencia(){
        return $this->belongsTo('App\Models\Evidencia');
    }*/
}
