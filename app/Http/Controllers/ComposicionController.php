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

        $users = User::where("cargo_id", 1)->orderBy("id", "desc")->paginate(10);
        //$users = User::find(1);
        // dd($users->getCargo());
        $facultades = Facultad::all();
        return view('composicion', compact('users', 'facultades'));
    }
}
