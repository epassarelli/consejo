<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Votacion;

class VotacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Votacion = new Votacion();
        $Votacion->id_temario = 4;
        $Votacion->titulo = 'Prueba1';
        $Votacion->estado = 3;
        $Votacion->aceptacion = 'mayoria';
        $Votacion->resultado = 0;
        $Votacion->save();
    }
}
