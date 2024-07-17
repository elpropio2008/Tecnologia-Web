<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigadores extends Model
{
    use HasFactory;
    protected $table='Investigadores';
    protected $primaryKey ='id';
    protected $fillable=[
        'Profesion',
        'IdOperativo',
        'IdOficial',
    ];

    public $timestamps=false;
}
