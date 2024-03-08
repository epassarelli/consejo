<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Sesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Adjunto as modelAdjunto;

class PdfController extends Controller
{
    public function generatePdf($id)
    {

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




     public function descargarPDF(Request $request)
     {

        $path = $request->input('path');

        $apppath = storage_path('app/'. $request->input('path'));

          $file = modelAdjunto::where('path', '=', $path)->first();

        if (!Storage::exists($path)) {

            abort(404, 'El archivo no existe.');
        }

        return response()->download($apppath, $file->name);


    }

}
