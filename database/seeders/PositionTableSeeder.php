<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Positions;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Positions::create([
            'id' => '1',
            'title' => 'Decano',
            'status' => true
        ]);

        Positions::create([
            'id' => '2',
            'title' => 'Vicedecano',
            'status' => true
        ]);
        Positions::create([
            'id' => '3',
            'title' => 'Profesores titulares',
            'status' => true
        ]);
        Positions::create([
            'id' => '4',
            'title' => 'Profesores suplentes',
            'status' => true
        ]);
        Positions::create([
            'id' => '5',
            'title' => 'Graduados titulares',
            'status' => true
        ]);
        
        Positions::create([
            'id' => '6',
            'title' => 'Graduados suplentes',
            'status' => true
        ]);
        
        Positions::create([
            'id' => '7',
            'title' => 'Estudiantes titulares',
            'status' => true
        ]);
        Positions::create([
            'id' => '8',
            'title' => 'Estudiantes suplentes',
            'status' => true
        ]);
        
        
    }
}











