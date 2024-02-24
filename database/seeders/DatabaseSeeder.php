<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EstadoOrdenDia;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Positions;
use App\Models\ItemsTemario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            CargosTableSeeder::class,
            FacultadesTableSeeder::class,
            UsuariosTableSeeder::class,
            ComisionesTableSeeder::class,
            TemasTableSeeder::class,
            EstadosOrdenDiaTableSeeder::class,
            SesionesTableSeeder::class
        ]);
        
        ItemsTemario::factory(540)->create();
    }
}
