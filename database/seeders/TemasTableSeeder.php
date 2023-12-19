<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titulos = [
            'ACTA',
            'COMUNICACIONES RECIBIDAS',
            'ASUNTOS GIRADOS A LAS COMISIONES',
            'RESOLUCIONES DICTADAS POR EL RECTOR PARA CONOCIMIENTO DEL CONSEJO SUPERIOR',
            'DICTAMEN DE COMISIONES',
            'DESPACHOS DE COMISIONES',
            'PROYECTOS PRESENTADOS',
            'PETICIONES O ASUNTOS PARTICULARES',
            'INFORME DEL RECTOR',
        ];
        
        foreach ($titulos as $titulo) {
            Tema::create(['titulo' => $titulo]);
        }
    }
}
