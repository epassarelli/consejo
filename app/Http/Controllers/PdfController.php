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
       // \DB::enableQueryLog();

        $sesion = Sesion::with(['ordenesDelDia.temarioOrdenDia.tema',
                                'ordenesDelDia.temarioOrdenDia.items' => function ($query) {
                                    $query->orderBy('items_temario.comision_id');
                                },
                                'ordenesDelDia.temarioOrdenDia.items.facultad',
                                'ordenesDelDia.temarioOrdenDia.items.comision',
                                'ordenesDelDia.temarioOrdenDia' => function ($query) {
                                    $query->orderBy('temarios_ordenes_dia.orden');
                                }]
                            )->findOrFail($id);

        // $sql = \DB::getQueryLog();

        $data = [
            'id' => $id,
            'fecha' => $sesion->fecha,
            'orden_del_dia' => $sesion->ordenesDelDia
        ];

        $html = View::make('pdf.pdf_content')->with($data)->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('ordendeldia.pdf');
    }
}
