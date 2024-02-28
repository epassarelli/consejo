<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Adjunto as modelAdjunto;

class DescargarPDFController extends Controller
{
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
