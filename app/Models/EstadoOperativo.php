<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOperativo extends Model
{
    use HasFactory;
    protected $table='estado_operativo';
    protected $primaryKey ='id';
    protected $fillable=[
        'Estado',
        'IdOperativo',
        'IdUbicacion',
    ];

    public $timestamps=false;
}
