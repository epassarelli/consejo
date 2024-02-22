<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sesion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\Livewire;

class PresentesSesion extends Component
{

    public $sesion;
    public $id_sesion;

    public function render()
    {

        $this->id_sesion = session('id_sesion');

        if (empty($this->id_sesion))
            return redirect()->route('sesiones');

        $this->sesion = Sesion::find($this->id_sesion);

        $user = User::find(Auth::user()->id);

        if (!$this->sesion->asistentes()->wherePivot('id_usuario', Auth::user()->id)->exists()) {
            $this->sesion->asistentes()->attach($user->id);
            $this->sesion->refresh();
        }
        return view(
            'livewire.admin.presentes-sesion',
            [
                'asistentes' => $this->sesion->asistentes()->with("cargo")->get(),
                "esAdmin" => Gate::allows("admin-sesion")
            ]
        )->layout('layouts.adminlte');
    }

    public function volver()
    {
        return redirect()->route('sesiones');
    }

    
    public function toggleVoteEnable($userId)
    {
        $asistente = $this->sesion->asistentes()->find($userId);
        $asistente->pivot->votante = !$asistente->pivot->votante;
        $asistente->pivot->save();
    }

}