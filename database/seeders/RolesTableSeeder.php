<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol = new Role();
        $rol->id     = 1;
        $rol->name = 'Super Admin';
        $rol->save();

        $rol = new Role();
        $rol->id     = 2;
        $rol->name = 'Admin';
        $rol->save();

        $rol = new Role();
        $rol->id     = 3;
        $rol->name = 'User';
        $rol->save();


    }
}
