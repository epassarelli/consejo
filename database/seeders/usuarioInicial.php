<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User_rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usuarioInicial extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contrasenaHasheada = bcrypt('admin123');

        //inserto usuario admin
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        //inserto rol sadmin del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 1;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();
    }
}
