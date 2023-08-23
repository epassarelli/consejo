<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Tipoblog;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class Tiposblog extends Component
{
    public $tipoblog;
    public $tipoblog_id;
    public $name;
    public $habilitado;
    public $muestraModal = 'none';

    protected $tiposblog;
    protected $listeners = ['delete'];

    public function render()
    {
        $tiposblog = Tipoblog::all();
        return view('livewire.admin.tiposblog', compact('tiposblog'))->layout('layouts.adminlte');
    }


    protected function rules()
    {
        return [
            'name' => 'required',
            'habilitado' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'El nombre del tipo de blog es requerido',
            'name.habilitado' => 'Debe habilitar o deshabilitar el tipo de blog',
        ];
    }

    public function create()
    {
        $this->tipoblog_id = 0;
        $this->habilitado = 0;
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {

        $tipoblog = Tipoblog::findOrFail($id);
        $this->tipoblog_id = $id;
        $this->name = $tipoblog->name;
        $this->habilitado = $tipoblog->habilitado;
        $this->openModal();
    }

    public function store()
    {
        $this->validate();


        Tipoblog::updateOrCreate(
            ['id' => $this->tipoblog_id],
            [
                'name' => $this->name,
                'habilitado' => $this->habilitado
            ]
        );

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function delete($id)
    {

        $cantidad = Blog::where('tipoblog_id','=',$id)->count();
        if ($cantidad  == 0) {
            Tipoblog::find($id)->delete();
            $this->emit('mensajePositivo', ['mensaje' => 'Registro eliminado']);
        }else {
            $this->emit('mensajeNegativo', ['mensaje' => 'Existen blogs asignados a este tipo de blog. No se eliminara']);
        }


    }

    public function closeModal()
    {
        // $this->isOpen = false;
        $this->muestraModal = 'none';
    }

    public function openModal()
    {
        // $this->isOpen = true;
        $this->muestraModal = 'block';
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->habilitado = 0;
    }
}
