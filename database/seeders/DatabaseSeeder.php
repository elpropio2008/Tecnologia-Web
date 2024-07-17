<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Imagene;
use App\Models\Oficiale;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\User;
use Carbon\Factory;
use DateTime;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(PersonaSeeder::class);
        $this->call(OficialeSeeder::class);

        $Rol=new Rol();
        $Rol->ModoUsuario="Administrador";
        $Rol->save();
        $Rol1=new Rol();
        $Rol1->ModoUsuario="Usuario";
        $Rol1->save();

        /*$Oficial=new Oficiale();
        $Oficial->CI=12345678;
        $Oficial->Nombres='Antonio';
        $Oficial->Apellidos='Banderas';
        $Oficial->FechaNacimiento="2000/05/07";
        $Oficial->Grado='Cabo';
        $Oficial->Sueldo=4500;
        $Oficial->Direccion='Av. La Tirana Nª 159';
        $Oficial->Telefono=77857857;
        $Oficial->save();*/

        $Usuario=new User();
        $Usuario->name='Admin';
        $Usuario->email='Admin@gmail.com';
        //$Usuario->password='12345';
        $Usuario->password=bcrypt('12345');
        $Usuario->HoraCreacion=date("H:i:s");
        $Usuario->FechaCreacion=date("d-m-y");
        $Usuario->IdRol=1;
        $Usuario->IdOficial=1;
        $Usuario->save();

    }
}
