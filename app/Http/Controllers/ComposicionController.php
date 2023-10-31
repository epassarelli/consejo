<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $this->data['usuarios'] = User::all();
        dd($this->data['usuarios']);
        return view('composicion', $this->data);
    }
}
