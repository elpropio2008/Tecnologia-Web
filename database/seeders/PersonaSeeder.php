<?php

namespace Database\Seeders;

use App\Models\Imagene;
use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Personas= Persona::factory(5)->create();
        foreach($Personas as $Persona)
        {
            Imagene::factory(1)->create([
                'ImagenTable_id' => $Persona->IdPersona,
                'ImagenTable_type' => Persona::class
            ]);
        } 
    }
}
