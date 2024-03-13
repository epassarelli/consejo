<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\TemarioOrdenDia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdendeldiaController extends Controller
{
    public function index()
    {
        $title = 'Orden del día';

        $parameter = [2, 5];

        $sesion = Sesion::join('ordenes_dia','sesiones.id','=','ordenes_dia.id_sesion')
                        ->whereIn('ordenes_dia.id_estado',$parameter)
                        ->orderBy('fecha', 'DESC')->first();

        return $this->print_orden($title, $sesion);
    
    }

    public function Sesiones($fecha)
    {
        $title = 'Orden del día';

        $parameter = [2, 5];

        $sesion = DB::table('sesiones')
                    ->join('ordenes_dia','sesiones.id','=','ordenes_dia.id_sesion')
                    ->where('fecha', '=', $fecha)
                    ->whereIn('ordenes_dia.id_estado',$parameter)->first();
        
        return $this->print_orden($title, $sesion);
    
    }

    public function SesionesAnteriores($fecha)
    {
        $title = 'Sesiones anteriores al ' . $fecha;

        $parameter = [2, 5];

        $sesiones = DB::table('sesiones')
                    ->join('ordenes_dia','sesiones.id','=','ordenes_dia.id_sesion')
                    ->where('fecha', '<>', $fecha)
                    ->whereIn('ordenes_dia.id_estado',$parameter)->orderBy('fecha','desc')->get();
        
        return view('SesionesAnteriores',compact(['fecha','title','sesiones']));
    
    }

    public function print_orden($title, $sesion)
    {
        $query = "SELECT count( T.nombre_comision), T.nombre_comision, T.comision_id FROM 
                (SELECT items_temario.*, comisiones.name as nombre_comision FROM items_temario 
                JOIN temarios_ordenes_dia ON items_temario.id_temario = temarios_ordenes_dia.id 
                JOIN ordenes_dia ON temarios_ordenes_dia.id_orden_dia = ordenes_dia.id 
                JOIN sesiones ON ordenes_dia.id_sesion = sesiones.id
                JOIN comisiones ON items_temario.comision_id = comisiones.id WHERE sesiones.id = $sesion->id)
                AS T GROUP BY T.nombre_comision";
        $comisiones = DB::select($query);

        $itemsTemario = DB::table('items_temario')
        ->join('temarios_ordenes_dia', 'items_temario.id_temario', '=', 'temarios_ordenes_dia.id')
        ->join('ordenes_dia','temarios_ordenes_dia.id_orden_dia','=','ordenes_dia.id')
        ->join('sesiones','ordenes_dia.id_sesion','=','sesiones.id')
        ->join('comisiones', 'items_temario.comision_id', '=', 'comisiones.id')
        ->select('items_temario.*', 'comisiones.name as nombre_comision')
        ->where('sesiones.id', $sesion->id)
        ->orderBy('items_temario.comision_id', 'asc')
        ->get();

        $sesiones = Sesion::where('fecha', '<', $sesion->fecha)->orderBy('fecha','desc')->get();
        return view('ordendelDia', compact('title', 'sesion', 'comisiones', 'itemsTemario','sesiones'));
    }

    public function comision($fecha, $comision)
    {
        $parameter = [2, 5];

        /* $sesion = DB::table('sesiones')
                    ->join('ordenes_dia','sesiones.id','=','ordenes_dia.id_sesion')
                    ->whereIn('ordenes_dia.id_estado',$parameter)
                    ->where('sesiones.fecha', '=', $fecha)
                    ->orderBy('fecha','desc')->first(); */
        $name_comision = DB::table('comisiones')
                            ->where('id','=',$comision)->first()->name;

        $items_comision = DB::table('sesiones')
                    ->join('ordenes_dia','sesiones.id','=','ordenes_dia.id_sesion')
                    ->join('temarios_ordenes_dia','ordenes_dia.id','=','temarios_ordenes_dia.id_orden_dia')
                    ->join('items_temario', 'temarios_ordenes_dia.id', '=', 'items_temario.id_temario')
                    ->whereIn('ordenes_dia.id_estado',$parameter)
                    ->where('sesiones.fecha', '=', $fecha)
                    ->where('items_temario.comision_id','=',$comision)->get();

        $title = 'Items por comisión';


        //$sesiones = Sesion::where('fecha', '<', $sesion->fecha)->orderBy('fecha','desc')->get();
        return view('ItemsXcomision_OD', compact('title', 'name_comision', 'itmes_comision','fecha'));
    }
}
