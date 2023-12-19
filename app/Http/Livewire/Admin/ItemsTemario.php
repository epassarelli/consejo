<?php

namespace App\Http\Livewire\Admin;

use App\Http\Controllers\ItemsController;
use App\Models\Comision;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ItemsTemario extends Component
{
    public $id;
    public $facultad_id;
    public $comision_id;
    public $tipo;
    public $numero;
    public $resolucion;
    public $resumen;
    public $showModal = 'none';

    protected $items;
    protected $listeners = ['delete', 'update'];

    public function render()
    {
        $itemsController = new ItemsController();
        $this->items = $itemsController->getAll(1);

        return view('livewire.admin.items-temario', [
            'items' => $this->items,
        ])->layout('layouts.adminlte');
    }
}
