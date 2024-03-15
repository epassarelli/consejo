<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ItemsTemario;

class BusquedaController extends Controller
{
    public function __invoke()
    {

        if (isset(request()->parameter) ) {

            $inputs = request()->parameter;
            
            $query =ItemsTemario::join('temarios_ordenes_dia','items_temario.id_temario','=','temarios_ordenes_dia.id')
                            ->join('ordenes_dia','temarios_ordenes_dia.id_orden_dia','=','ordenes_dia.id')
                            ->join('sesiones','ordenes_dia.id_sesion','=','sesiones.id')
                            ->join('comisiones','items_temario.comision_id','=','comisiones.id');

            $flag = false;

            if (! is_null($inputs['P_clave']) && ($inputs['P_clave'] != '') ) {
                $query->where('items_temario.resumen', 'LIKE', '%' . $inputs['P_clave'] . '%');
                $flag = true;
            }

            if (isset($inputs['fecha'] )) {
                //$dia = date('Y-m-d', $inputs->fecha);
                $query->where('sesiones.fecha', '=', $inputs['fecha']);
                $flag = true;
            }
            
            if (isset($inputs['comision_id'] )) {
                $query->where('items_temario.comision_id', '=', $inputs['comision_id']);
                $flag = true;
            }
            
            if (isset($inputs['facultad_id'] )) {
                $query->where('items_temario.facultad_id', '=', $inputs['facultad_id']);
                $flag = true;
            }
            
            /* if ((isset($inputs->N_expediente )) && (isset($inputs->a_expediente ))) {
                $dato = $inputs->N_expediente . '/' . $inputs->a_expediente;
                $query->where('XXXXX.XXXX', '=', $dato);
            } */
            
            if ((isset($inputs['N_resolucion'] )) && (isset($inputs['a_resolucion'] ))) {
                $dato = $inputs['N_resolucion'] . '/' . $inputs['a_resolucion'];
                $query->where('items_temario.numero', '=', $dato);
                $flag = true;
            }
            
            if (($flag == true)) {
                
                $items_busqueda = $query->get();
            } else {
                $items_busqueda = null;
            }
                            
            return view('ItemsBusqueda',compact('items_busqueda','query'));

    
        }   else
            
        {
            $comisiones = DB::table('comisiones')
                            ->select('id', 'name')
                            ->get();

            $facultades = DB::table('facultades')
                            ->select('id', 'name')
                            ->get();
                            
            return view('Prueba_busqueda',compact('comisiones', 'facultades'));
        }
    }

    
}
