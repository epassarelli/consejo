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

        $contrasenaHasheada = bcrypt('consejero');
        //inserto usuario Rodriguez Adriana
        $user = new User();
        $user->name = "Adriana";
        $user->lastname = "RODRIGUEZ";
        $user->email = "agonzalez@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 1;
        $user->facultad_id = 7;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 1;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //inserto usuario Gutierrez Boem
        $user = new User();
        $user->name = "Flabio Hernán";
        $user->lastname = "GUTIERREZ BOEM";
        $user->email = "fgutierrez@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 2;
        $user->facultad_id = 7;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 2;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //inserto usuario Venancio
        $user = new User();
        $user->name = "Carlos";
        $user->lastname = "VENANCIO";
        $user->email = "cvenancio@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 1;
        $user->facultad_id = 1;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 3;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //inserto usuario Gomez
        $user = new User();
        $user->name = "Walter";
        $user->lastname = "GOMEZ DIZ";
        $user->email = "wgomez@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 2;
        $user->facultad_id = 1;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 4;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //inserto usuario Pahlen
        $user = new User();
        $user->name = "Ricardo J.";
        $user->lastname = "PAHLEN";
        $user->email = "rpahlen@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 1;
        $user->facultad_id = 9;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 5;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //inserto usuario Albornoz
        $user = new User();
        $user->name = "Cesar Humberto";
        $user->lastname = "ALBORNOZ";
        $user->email = "calbornoz@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 2;
        $user->facultad_id = 9;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 6;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //Claustro Profesores YACOBITTI
        $user = new User();
        $user->name = "Emiliano Benjamin";
        $user->lastname = "YACOBITTI";
        $user->email = "eyacobitti@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 3;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 30;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //Claustro Profesores PAOLICCHI
        $user = new User();
        $user->name = "Graciela";
        $user->lastname = "PAOLICCHI";
        $user->email = "gpaolicchi@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 3;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 31;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //Claustro Profesores Arranz
        $user = new User();
        $user->name = "Cristina";
        $user->lastname = "ARRANZ";
        $user->email = "carranz@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 4;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 40;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //Claustro Profesores Vaquez
        $user = new User();
        $user->name = "Néstor";
        $user->lastname = "VAZQUEZ";
        $user->email = "nvazquez@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 4;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 41;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

        //Claustro Graduados Rojo
        $user = new User();
        $user->name = "Matias";
        $user->lastname = "ROJO";
        $user->email = "mrojo@consejo.com";
        $user->password = $contrasenaHasheada;
        $user->email_verified_at = now();
        $user->cargo_id = 5;
        $user->web = "V";
        $user->created_at = now();
        $user->updated_at = now();
        $user->orden = 50;
        $user->estado = true;
        $user->save();

        //inserto rol consejero del usuario creado
        $user_rol = new User_rol();
        $user_rol->user_id = $user->id;
        $user_rol->rol_id = 3;
        $user_rol->created_at = now();
        $user_rol->updated_at = now();
        $user_rol->save();

       //Claustro Graduados RODRIGUEZ SEREÑO
       $user = new User();
       $user->name = "Francisca";
       $user->lastname = "RODRIGUEZ SEREÑO";
       $user->email = "prodriguez@consejo.com";
       $user->password = $contrasenaHasheada;
       $user->email_verified_at = now();
       $user->cargo_id = 5;
       $user->web = "V";
       $user->created_at = now();
       $user->updated_at = now();
       $user->orden = 51;
       $user->estado = true;
       $user->save();

       //inserto rol consejero del usuario creado
       $user_rol = new User_rol();
       $user_rol->user_id = $user->id;
       $user_rol->rol_id = 3;
       $user_rol->created_at = now();
       $user_rol->updated_at = now();
       $user_rol->save();        
     
       //Claustro Graduados ROJAS
       $user = new User();
       $user->name = "María Alejandra";
       $user->lastname = "ROJAS";
       $user->email = "marojas@consejo.com";
       $user->password = $contrasenaHasheada;
       $user->email_verified_at = now();
       $user->cargo_id = 6;
       $user->web = "V";
       $user->created_at = now();
       $user->updated_at = now();
       $user->orden = 60;
       $user->estado = true;
       $user->save();

       //inserto rol consejero del usuario creado
       $user_rol = new User_rol();
       $user_rol->user_id = $user->id;
       $user_rol->rol_id = 3;
       $user_rol->created_at = now();
       $user_rol->updated_at = now();
       $user_rol->save();       
       
       //Claustro Graduados PONS
       $user = new User();
       $user->name = "Roberto";
       $user->lastname = "PONS";
       $user->email = "rpons@consejo.com";
       $user->password = $contrasenaHasheada;
       $user->email_verified_at = now();
       $user->cargo_id = 6;
       $user->web = "V";
       $user->created_at = now();
       $user->updated_at = now();
       $user->orden = 61;
       $user->estado = true;
       $user->save();

       //inserto rol consejero del usuario creado
       $user_rol = new User_rol();
       $user_rol->user_id = $user->id;
       $user_rol->rol_id = 3;
       $user_rol->created_at = now();
       $user_rol->updated_at = now();
       $user_rol->save();               
    }
}
