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
        /* $facultades = Facultad::all();
        $facultades = Facultad::where('id') ; */
        //$users = User::all();

        /* Destination::addSelect([
            'last_flight' => Flight::select('name')
            ->whereColumn('destination_id', 'destinations.id')
            ->orderByDesc('arrived_at')
            ->limit(1)
        ])->get(); */
        $facultades = User::addSelect(['name' =>
        Facultad::select('name')
            ->whereColumn('facultad_id', 'id')
            ->limit(1)])->get();
        return view('composicion', compact('facultades'));
        /* $this->data['usuarios'] = User::all();
        dd($this->data['usuarios']);
        return view('composicion', $this->data); */
    }
}
