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

        //inserto rol consejero del usuario creado
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

        //inserto rol observador del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 4;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        $contrasenaHasheada = bcrypt('secretaria');
        //Inserto usuario secretaria
        $user = new User();
        $user->name = "secretaria";
        $user->email = "secretaria@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->estado = true;
        $user->save();

        //inserto rol secretaria del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 5;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();


        /* INSERTO USUARIOS DECANOS Y VICEDECANOS QUE VAN A APARECER EN LA WEB */
        //Inserto usuarios Decanos y vicedecanos x cada facultad
        for ($i = 1; $i <= 16; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                $contrasenaHasheada = bcrypt('usuarioweb');
                $user = new User();
                $user->name = "usuario " . ($j % 2 == 0 ? 'Vicedecano' : 'Decano');
                $user->lastname = "web_" . $i . "_" . $j;
                $user->email = "usuario_" . $i . "_" . $j . "@consejo.com";
                $user->phone = "1111111111";
                $user->cargo_id = $j;
                $user->facultad_id = $i;
                $user->web = "V";
                $user->orden = $j;
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
            }
        }

        /* INSERTO USUARIOS QUE VAN A APARECER EN LA WEB */
        //Inserto usuarios Decanos y vicedecanos x cada facultad
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                $contrasenaHasheada = bcrypt('usuarioweb');
                $user = new User();
                $user->name = "usuario " . ($j % 2 == 0 ? 'Suplente' : 'Titular');
                $user->lastname = "web_profesor_" . $i . "_" . $j;
                $user->email = "usuario_profesor" . $i . "_" . $j . "@consejo.com";
                $user->phone = "1111111111";
                $user->cargo_id = $j % 2 == 0 ? 4 : 3;
                $user->facultad_id = NULL;
                $user->web = "V";
                $user->orden = $j;
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
            }
        }

        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                $contrasenaHasheada = bcrypt('usuarioweb');
                $user = new User();
                $user->name = "usuario " . ($j % 2 == 0 ? 'Suplente' : 'Titular');
                $user->lastname = "web_graduado_" . $i . "_" . $j;
                $user->email = "usuario_graduado" . $i . "_" . $j . "@consejo.com";
                $user->phone = "1111111111";
                $user->cargo_id = $j % 2 == 0 ? 6 : 5;
                $user->facultad_id = NULL;
                $user->web = "V";
                $user->orden = $j;
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
            }
        }

        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                $contrasenaHasheada = bcrypt('usuarioweb');
                $user = new User();
                $user->name = "usuario " . ($j % 2 == 0 ? 'Suplente' : 'Titular');
                $user->lastname = "web_estudiante_" . $i . "_" . $j;
                $user->email = "usuario_estudiante" . $i . "_" . $j . "@consejo.com";
                $user->phone = "1111111111";
                $user->cargo_id = $j % 2 == 0 ? 8 : 7;
                $user->facultad_id = NULL;
                $user->web = "V";
                $user->orden = $j;
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
            }
        }
    }
}
