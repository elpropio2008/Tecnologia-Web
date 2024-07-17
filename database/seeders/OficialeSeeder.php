<?php

namespace Database\Seeders;

use App\Models\Imagene;
use App\Models\Oficiale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OficialeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Oficiale::create([
            'CI' => '12345678',
            'Nombres' => 'Antonio',
            'Apellidos' => 'Banderas',
            'FechaNacimiento' => '2000/05/07',
            'Grado' => 'Cabo',
            'Sueldo' => 4500,
            'Direccion' => 'Av. La Tirana Nª 159',
            'Telefono' => 77857857
        ]);
        Oficiale::factory(99)->create();
        /*$Oficiales=Oficiale::factory(10)->create();
        foreach($Oficiales as $Oficial)
        {
             Imagene::factory(1)->create([
                'IdPersona' => null,
                'IdOficial' => $Oficial->IdOficial,
                'IdEscena' => null,
                'IdEvidencia' => null
            ]); 
        }*/
    }
}
