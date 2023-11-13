<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User_rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contrasenaHasheada = bcrypt('sadmin');

        //inserto usuario admin
        $user = new User();
        $user->name = "sadmin";
        $user->email = "sadmin@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->estado = true;
        $user->save();

        //inserto rol sadmin del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 1;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        $contrasenaHasheada = bcrypt('admin');

        //inserto usuario admin
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->estado = true;
        $user->save();

        //inserto rol sadmin del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 2;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        $contrasenaHasheada = bcrypt('consejero');
        //inserto usuario consejero
        $user = new User();
        $user->name = "consejero";
        $user->email = "consejero@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->estado = true;
        $user->save();

        //inserto rol sadmin del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        $contrasenaHasheada = bcrypt('observador');
        //inserto usuario observador
        $user = new User();
        $user->name = "observador";
        $user->email = "observador@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->estado = true;
        $user->save();

        //inserto rol sadmin del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 4;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        $contrasenaHasheada = bcrypt('secretaria');
        //Inserto usuario sevretaría
        $user = new User();
        $user->name = "secretaria";
        $user->email = "secretaria@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->estado = true;
        $user->save();

        //inserto rol sadmin del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 5;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();
    }
}
