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

        // $decanos = User::join('facultades', 'users.facultad_id', '=', 'facultades.id')
        //     ->select('users.*', 'facultades.*')
        //     ->where('users.web', 'V')
        //     ->where('users.estado', true)
        //     ->whereNotNull('users.facultad_id')
        //     ->orderBy('users.orden')
        //     ->orderBy('facultades.name')
        //     ->get();

        $profesoresT = User::join('cargos', 'users.cargo_id', '=', 'cargos.id')
            ->select('users.*', 'cargos.*')
            ->where('users.web', 'V')
            ->where('users.estado', true)
            ->where('users.cargo_id', 3)
            ->whereNotNull('users.cargo_id')
            ->orderBy('users.orden')
            ->orderBy('cargos.id')
            ->get();

        $graduadosT = User::join('cargos', 'users.cargo_id', '=', 'cargos.id')
            ->select('users.*', 'cargos.*')
            ->where('users.web', 'V')
            ->where('users.estado', true)
            ->where('users.cargo_id', 5)
            ->whereNotNull('users.cargo_id')
            ->orderBy('users.orden')
            ->orderBy('cargos.id')
            ->get();

        $estudiantesT = User::join('cargos', 'users.cargo_id', '=', 'cargos.id')
            ->select('users.*', 'cargos.*')
            ->where('users.web', 'V')
            ->where('users.estado', true)
            ->where('users.cargo_id', 7)
            ->whereNotNull('users.cargo_id')
            ->orderBy('users.orden')
            ->orderBy('cargos.id')
            ->get();

        $profesoresS = User::join('cargos', 'users.cargo_id', '=', 'cargos.id')
            ->select('users.*', 'cargos.*')
            ->where('users.web', 'V')
            ->where('users.estado', true)
            ->where('users.cargo_id', 4)
            ->whereNotNull('users.cargo_id')
            ->orderBy('users.orden')
            ->orderBy('cargos.id')
            ->get();

        $graduadosS = User::join('cargos', 'users.cargo_id', '=', 'cargos.id')
            ->select('users.*', 'cargos.*')
            ->where('users.web', 'V')
            ->where('users.estado', true)
            ->where('users.cargo_id', 6)
            ->whereNotNull('users.cargo_id')
            ->orderBy('users.orden')
            ->orderBy('cargos.id')
            ->get();

        $estudiantesS = User::join('cargos', 'users.cargo_id', '=', 'cargos.id')
            ->select('users.*', 'cargos.*')
            ->where('users.web', 'V')
            ->where('users.estado', true)
            ->where('users.cargo_id', 8)
            ->whereNotNull('users.cargo_id')
            ->orderBy('users.orden')
            ->orderBy('cargos.id')
            ->get();
        $facultades = Facultad::all();
        // foreach ($facultades as $facultad) {
        //     foreach($facultad->users as $user){
        //         dump($user->name);
        //     }
        // }
        // die();
        return view('composicion', [
            'profesoresT' => $profesoresT,
            'graduadosT' => $graduadosT,
            'estudiantesT' => $estudiantesT,
            'profesoresS' => $profesoresS,
            'graduadosS' => $graduadosS,
            'estudiantesS' => $estudiantesS,
            'facultades' => $facultades
        ]);
    }
}
