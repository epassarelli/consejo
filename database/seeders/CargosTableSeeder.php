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
            'name' => 'Decano',
            'status' => true
        ]);

        Cargo::create([
            'id' => '2',
            'name' => 'Vicedecano',
            'status' => true
        ]);
        Cargo::create([
            'id' => '3',
            'name' => 'Profesores titulares',
            'status' => true
        ]);
        Cargo::create([
            'id' => '4',
            'name' => 'Profesores suplentes',
            'status' => true
        ]);
        Cargo::create([
            'id' => '5',
            'name' => 'Graduados titulares',
            'status' => true
        ]);

        Cargo::create([
            'id' => '6',
            'name' => 'Graduados suplentes',
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
    }
}
