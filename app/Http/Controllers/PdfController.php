<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Sesion;

class PdfController extends Controller
{
    public function generatePdf($id)
    {

       //  \DB::enableQueryLog();

        $sesion = Sesion::with(['ordenDia.temariosOrdenDia.tema',
                                'ordenDia.temariosOrdenDia.items' => function ($query) {
                                    $query->orderBy('items_temario.comision_id');
                                },
                                'ordenDia.temariosOrdenDia.items.comision',
                                'ordenDia.temariosOrdenDia' => function ($query) {
                                    $query->orderBy('temarios_ordenes_dia.orden');
                                }     ,
                                'ordenDia.temariosOrdenDia.items.facultad' => function($query) {
                                    $query->orderBy('name');
                                },
        ])->findOrFail($id);



      //  $sql = \DB::getQueryLog();

      //  dd($sql);

        $data = [
            'id' => $id,
            'fecha' => $sesion->fecha,
            'orden_del_dia' => $sesion->ordenDia
        ];

        $html = View::make('pdf.ordenDelDiaPdf')->with($data)->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('Orden del dia '.$sesion->fecha.'.pdf');
    }
}
