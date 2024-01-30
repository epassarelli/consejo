<?php

namespace App\Http\Livewire\Admin;

use App\Models\OrdenDia as ModelsOrdenDia;
use App\Models\TemarioOrdenDia;
use Livewire\Component;

class OrdenesDelDia extends Component
{
    public $orden;
    public $id_orden;
    public $id_sesion;
    public $id_estado;
    public $loading = false;
    public $showActionModal = false;
    public $titulo;
    public $temario;
    protected $listeners = ['errorTitulo' => 'handleErrorTitulo', 'delete', 'openOrdenModal'];
    public $errorTitulo = [];

    public function render()
    {
        $this->orden = ModelsOrdenDia::with(["estado"])->where('id_sesion', $this->id_sesion)->first();

        return view('livewire.admin.ordenes-del-dia', ['orden' => $this->orden])
            ->layout('layouts.adminlte');
    }

    public function openAddTemarioModal($id_orden){
        $this->emit('openAddTemarioModal', $id_orden);
    }

    /*
    public function openOrdenModal($id_sesion)
    {
        $this->id_sesion = $id_sesion;
        $this->showActionModal = true;
    }





    */
}
