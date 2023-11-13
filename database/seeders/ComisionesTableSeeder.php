<?php

namespace Database\Seeders;

use App\Models\Comision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComisionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comision::create([
            'id' => 1,
            'name' => "Comisión de Enseñanza",
            'orden' => "1",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 2,
            'name' => "Comisión de Concursos",
            'orden' => "2",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 3,
            'name' => "Comisión de Presupuesto",
            'orden' => "12",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 4,
            'name' => "Comisión de Posgrado",
            'orden' => "7",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 5,
            'name' => "Comisión de Convenios",
            'orden' => "13",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 6,
            'name' => "Comisión de Bienestar y Extensión Universitaria",
            'orden' => "8",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 7,
            'name' => "Comisión de Planificación",
            'orden' => "9",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 8,
            'name' => "Comisión de Investigación Cientí­fica y Tecnológica",
            'orden' => "6",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 9,
            'name' => "Comisión de Interpretación y Reglamento",
            'orden' => "11",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 10,
            'name' => "Comisiones de Convenios y de Presupuesto",
            'orden' => "14",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 11,
            'name' => "Comisiones de Interpretación y Reglamento y de Planificación",
            'orden' => "10",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 15,
            'name' => "Reglamento",
            'orden' => "15",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 16,
            'name' => "Comisiones de Investigación Científica y Tecnológica y de Presupuesto",
            'orden' => "4",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 17,
            'name' => "Comisión de Investigación ientífica y Tecnológica y Estudios de Posgrado",
            'orden' => "5",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 18,
            'name' => "Facultades / Colegios",
            'orden' => "17",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Comision::create([
            'id' => 20,
            'name' => "Comisión de Educación Media",
            'orden' => "3",
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
