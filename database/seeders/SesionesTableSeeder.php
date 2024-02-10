<?php

namespace Database\Seeders;

use App\Models\EstadoOrdenDia;
use Carbon\Carbon;
use App\Models\OrdenDia;
use App\Models\Sesion;
use App\Models\TemarioOrdenDia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SesionesTableSeeder extends Seeder
{

    /**
     * The seeder dependencies.
     *
     * @var array
     */
    protected $depends = [
        EstadoOrdenDia::class,
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-06-24');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario240609.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-07-08');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'temario 08-07-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-07-22');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 22-07-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-09-23');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 23-09-2009.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-08-12');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 12-08-09n.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-08-26');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 26-08-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-09-09');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 09-09-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-10-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 14-10-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-10-28');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 28-10-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-11-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario2 11-11-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-12-02');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario a 2-12-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2009-12-16');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 16-12-09.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-03-10');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario  10-03-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-05-12');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 12-05-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-05-26');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario  26-05-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-03-31');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 31-03-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-04-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario  14-04-10 1.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-04-28');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario  28-04-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-06-09');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario  9-06-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-06-23');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario  23-06-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-07-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario14-07-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-08-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 11-08-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-08-25');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 25-08-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-09-22');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 22-09-20100.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-09-08');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 8-09-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-09-22');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 22-09-2010.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-10-06');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'temario-06-10-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-10-20');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'temario 20-10-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-11-10');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Copia de Temario10-11-10 b.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-11-24');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 24-11-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-12-15');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 15-12-10.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-03-30');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 30-03-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-03-16');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 16-03-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-10-26');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 26-10-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-04-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 13-04-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-04-27');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 27-04-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-05-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 11-05-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-06-08');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 08-06-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-06-22');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 22-06-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-07-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 13-07-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-08-10');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 10-08-2011.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-11-09');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 09-11-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-08-24');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 24-08-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-09-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario a 14-09-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-09-28');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 28-09-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-10-12');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 12-10-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-11-23');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 23-11-11.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-12-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 14-12-2011.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2011-11-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 14-12-2011.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-03-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario14-3-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-03-28');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 28-03-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-04-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 11-4-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-04-25');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 25-4-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-05-09');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 9-05-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-05-23');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario23-05-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-06-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 13-06-2012 1.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-07-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 11-07-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-08-08');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 8-08-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-08-22');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 22-08-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-09-12');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 12-09--2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-09-26');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 26-09-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-10-10');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 10-10--2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-10-24');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 24-10-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-11-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 14-11-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-12-05');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 05-12-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-03-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario13- 03-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2012-12-19');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 19-12-2012.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-03-27');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 27- 03-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-04-10');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 10- 04-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-04-24');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 24- 04-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-05-15');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 15-05-2013.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-05-29');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 29- 05-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-06-12');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 12- 06-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-06-26');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 26- 06-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-07-10');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 10- 07-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-08-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 14-08-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-08-28');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 28-08-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-09-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 11-09-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-09-25');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 25-09-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-10-09');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 09-10-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-10-23');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 23-10-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-11-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 13-11-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-11-27');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'indice del 27-11-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2013-12-18');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 18-12-13.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-03-26');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 26-03-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-03-12');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 12-03-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-04-09');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 9-04-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-04-23');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 23-04-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-05-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 14-05-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-05-28');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 28-05-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-06-25');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 25-06-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-06-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 11-06-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-07-16');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Copia de Temario 16-07-14 (2).pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-08-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 13-08-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-08-27');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 27-08-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-09-24');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 24-09-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-09-10');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 10-09-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-10-08');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 08-10-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-10-22');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 22-10-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-11-12');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 12-11-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-11-26');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '17 Temario 26-11-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-12-17');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '18 Temario 17-12-14.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2014-12-23');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '23-12tapatemario.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-03-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '1 Temario 11-03-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-03-25');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '2 Temario 25-03-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-05-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '5 Temario 13-05-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-04-08');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '3 Temario 08-04-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-04-22');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '4 Temario 22-04-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-05-27');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '6 Temario 27-05-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-06-10');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'Temario 10-06-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-06-24');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '8 Temario 24-06-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-07-08');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '9 Temario 08-07-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-08-12');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '10 Temario 12-08-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-08-26');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '11 Temario 26-08-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-09-23');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '13 Temario 23-9.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-09-09');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '12 Temario 09-09-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2010-10-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-10-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '14 Temario 14-10-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-10-28');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '15 Temario 28-10-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-11-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '16 Temario 11-11-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-11-25');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '17 Temario 25-11-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-03-16');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '1 temario16-03- 16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2015-12-09');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '18 Temario 9-12-15.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-03-30');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '2 temario30-03- 16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-04-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '3 13-04- 16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-04-27');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '4 27-04-16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-05-11');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '5 11-05-16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-06-08');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '6 8-06-16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-06-22');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '7 22-06-16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-07-13');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '8 13-07-16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-08-17');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '9 17-08-16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-08-31');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '10 31-08-16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-09-14');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '11 14-09-16.pdf';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-09-28');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = '';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

////////////////////////////////////

$sesion = new sesion();
$sesion->fecha = Carbon::parse('2016-10-02');
$sesion->consejo = True;
$sesion->estado = 3;
$sesion->pdf = 'temario-01102016.gif';
$sesion->save();

$orden = new OrdenDia();
$orden->id_sesion = $sesion->id;
$orden->id_estado = 5;

$orden->save();

$temario = new TemarioOrdenDia();
$temario->id_orden_dia = $orden->id;
$temario->id_tema = 6;
$temario->orden = 1;
$temario->web = 0;
$temario->save();

//
    }
}
