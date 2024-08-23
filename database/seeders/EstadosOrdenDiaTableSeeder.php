<?php

namespace Database\Seeders;

use App\Models\EstadoOrdenDia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosOrdenDiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoOrdenDia::create(['nombre' => 'En Revisión']);
        EstadoOrdenDia::create(['nombre' => 'Publicada']);
        EstadoOrdenDia::create(['nombre' => 'Cerrada']);
        EstadoOrdenDia::create(['nombre' => 'En Sesión']);
        EstadoOrdenDia::create(['nombre' => 'Finalizada']);
        EstadoOrdenDia::create(['nombre' => 'Sesionando']);
    }
}
