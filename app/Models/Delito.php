<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delito extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $primaryKey ='IdDelito';
    protected $fillable=[
        'Delito'
    ];

    public function Declaracion(){
        return $this->hasMany('App\Models\RegistroDenuncia');
    }
}
