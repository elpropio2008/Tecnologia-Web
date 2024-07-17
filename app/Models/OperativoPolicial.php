<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperativoPolicial extends Model
{
    use HasFactory;
    protected $primaryKey ='IdOperativo';
    protected $fillable=[
        'HoraOperativo',
        'FechaOperativo',
        'Descripcion',
        'NroRegistro',
    ];

    public $timestamps=false;

    public function RegistroDenuncias(){
        return $this->belongsTo('App\Models\RegistroDenuncia');
    }
    public function Ubicaciones(){
        return $this->belongsToMany(Ubicacione::class,'estado_operativo')->withPivot('Estado');
    }
}
