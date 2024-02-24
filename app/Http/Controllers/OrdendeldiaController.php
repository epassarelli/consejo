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
        $sesion = Sesion::orderBy('id', 'DESC')->first();

        return $this->print_orden($title, $sesion);
    
    }

    public function Sesiones($fecha)
    {
        $title = 'Orden del día';

        $sesion = Sesion::where('fecha',$fecha)->first();
        
        return $this->print_orden($title, $sesion);
    
    }

    public function SesionesAnteriores($fecha)
    {
        $title = 'Sesiones anteriores al ' . $fecha;

        $sesiones = Sesion::where('fecha', '<', $fecha)->orderBy('fecha','desc')->get();
        
        return view('SesionesAnteriores',compact(['fecha','title','sesiones']));
    
    }

    public function print_orden($title, $sesion)
    {
        $query = "SELECT count( T.nombre_comision), T.nombre_comision FROM 
                (SELECT items_temario.*, comisiones.name as nombre_comision FROM items_temario 
                JOIN sesiones ON items_temario.id_tema = sesiones.id 
                JOIN comisiones ON items_temario.comision_id = comisiones.id WHERE sesiones.id = $sesion->id)
                AS T GROUP BY T.nombre_comision";
        $comisiones = DB::select($query);

        $itemsTemario = DB::table('items_temario')
        ->join('sesiones', 'items_temario.id_tema', '=', 'sesiones.id')
        ->join('comisiones', 'items_temario.comision_id', '=', 'comisiones.id')
        ->select('items_temario.*', 'comisiones.name as nombre_comision')
        ->where('sesiones.id', $sesion->id)
        ->orderBy('items_temario.comision_id', 'asc')
        ->get();

        $sesiones = Sesion::where('fecha', '<', $sesion->fecha)->orderBy('fecha','desc')->get();
        return view('ordendelDia', compact('title', 'sesion', 'comisiones', 'itemsTemario','sesiones'));
    }
}
