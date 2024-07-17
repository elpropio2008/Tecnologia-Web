<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacione extends Model
{
    use HasFactory;
    protected $primaryKey ='IdUbicacion';
    protected $fillable=[
        'Latitud',
        'Longitud',
        'Referencias',
    ];

    public $timestamps=false;
    public function Ubicaciones(){
        return $this->belongsToMany(OperativoPolicial::class,'estado_operativo')->withPivot('Estado');
    }
}
