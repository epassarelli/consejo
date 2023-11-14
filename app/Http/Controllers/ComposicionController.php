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

        $users = User::all();
        //$users = User::find(1);
        // dd($users->getCargo());
        $facultades = Facultad::all();
        return view('composicion', compact('users', 'facultades'));
    }
}
