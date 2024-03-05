<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReglamentosController extends Controller
{
    public function index()
    {
        return view('reglamento');
    }
}
