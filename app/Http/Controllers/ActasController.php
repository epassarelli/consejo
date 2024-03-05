<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActasController extends Controller
{
    public function index()
    {
        return view('actas');
    }
}
