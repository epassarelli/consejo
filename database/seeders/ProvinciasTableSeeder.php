<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provincia;


class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pr = new Provincia(); $pr->id =  2; $pr->nombre='Ciudad Autonoma de Buenos Aires';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  6; $pr->nombre='Buenos Aires';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  10; $pr->nombre='Catamarca';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  14; $pr->nombre='Cordoba';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  18; $pr->nombre='Corrientes';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  22; $pr->nombre='Chaco';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  26; $pr->nombre='Chubut';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  30; $pr->nombre='Entre Rios';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  34; $pr->nombre='Formosa';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  38; $pr->nombre='Jujuy';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  42; $pr->nombre='La Pampa';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  46; $pr->nombre='La Rioja';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  50; $pr->nombre='Mendoza';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  54; $pr->nombre='Misiones';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  58; $pr->nombre='Neuquen';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  62; $pr->nombre='Rio Negro';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  66; $pr->nombre='Salta';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  70; $pr->nombre='San Juan';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  74; $pr->nombre='San Luis';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  78; $pr->nombre='Santa Cruz';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  82; $pr->nombre='Santa Fe';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  86; $pr->nombre='Santiago del Estero';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  90; $pr->nombre='Tucuman';$pr->estado=1; $pr->save();
        $pr = new Provincia(); $pr->id =  94; $pr->nombre='Tierra del Fuego, Antartida e Islas del Atlantico Sur';$pr->estado=1; $pr->save();
    }
}
