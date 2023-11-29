<?php

namespace App\Http\Livewire\Admin;

use App\Models\Temas as ModelTemas;
use Livewire\Component;

class Temas extends Component
{
    public function render()
    {

        $temas = ModelTemas::all();
        
        return view('livewire.admin.temas', compact('temas'))
        ->layout('layouts.adminlte');
    }
}
