<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HacesFaltaController extends Controller
{
    public function index()
    {
        return view('haces-falta');
    }
}
