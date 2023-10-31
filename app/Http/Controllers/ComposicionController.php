<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Facultad;
use Illuminate\Http\Request;

class ComposicionController extends Controller
{
    public $data;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $facultades = Facultad::all();
        $users = User::all();

        return view('composicion', compact('facultades', 'users'));
        /* $this->data['usuarios'] = User::all();
        dd($this->data['usuarios']);
        return view('composicion', $this->data); */
    }
}
