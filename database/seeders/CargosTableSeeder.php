<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Cargo::create([
            'id' => '1',
            'name' => 'Decano/a',
            'status' => true
        ]);

        Cargo::create([
            'id' => '2',
            'name' => 'Vicedecano/a',
            'status' => true
        ]);
        Cargo::create([
            'id' => '3',
            'name' => 'Profesores/as titulares',
            'status' => true
        ]);
        Cargo::create([
            'id' => '4',
            'name' => 'Profesores/as suplentes',
            'status' => true
        ]);
        Cargo::create([
            'id' => '5',
            'name' => 'Graduados/as titulares',
            'status' => true
        ]);

        Cargo::create([
            'id' => '6',
            'name' => 'Graduados/as suplentes',
            'status' => true
        ]);

        Cargo::create([
            'id' => '7',
            'name' => 'Estudiantes titulares',
            'status' => true
        ]);
        Cargo::create([
            'id' => '8',
            'name' => 'Estudiantes suplentes',
            'status' => true
        ]);
        
        Cargo::create([
            'id' => '9',
            'name' => 'Director/a CBC',
            'status' => true
        ]);
        
        Cargo::create([
            'id' => '10',
            'name' => 'Representante no docente',
            'status' => true
        ]);
        
        Cargo::create([
            'id' => '11',
            'name' => 'Rector',
            'status' => true
        ]);
        
        Cargo::create([
            'id' => '12',
            'name' => 'Vicerrector',
            'status' => true
        ]);
    }
}
