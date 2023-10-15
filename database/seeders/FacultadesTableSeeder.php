<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facultades;

class FacultadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facultades::create([
            'id'=> 1,
            'name'=> 'Facultad de Arquitectura Diseño y Urbanismo',
            'status'=> true
        ]);
        
        Facultades::create([
            'id'=> 2,
            'name'=> 'Facultad de Cs Exactas y Naturales',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 3,
            'name'=> 'Facultad de Filosofía y Letras',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 4,
            'name'=> 'Facultad de Ingeniería ',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 5,
            'name'=> 'Facultad de Farmacia y Bioquímica',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 6,
            'name'=> 'Facultad de Derecho',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 7,
            'name'=> 'Facultad de Agronomía',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 8,
            'name'=> 'Facultad de Cs Veterinarias',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 9,
            'name'=> 'Facultad de Cs Económicas',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 10,
            'name'=> 'Facultad de Cs Sociales',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 11,
            'name'=> 'Facultad de Medicina',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 12,
            'name'=> 'Facultad de Psicología',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 13,
            'name'=> 'Facultad de Odontología',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 14,
            'name'=> 'Escuela Superior de Comercio Carlos Pellegrini',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 15,
            'name'=> 'CBC',
            'status'=> true
        ]);

        Facultades::create([
            'id'=> 16,
          'name'=> 'Colegio Nacional de Buenos Aires',
            'status'=> true
        ]);

    }
}
