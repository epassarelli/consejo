<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comision;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class GestionComisiones extends Component
{
    public $comision_id;
    public $name;
    public $status;
    public $orden;
    public $muestraModal = 'none';

    protected $comisiones, $roles, $users_roles;
    protected $listeners = ['delete'];

    public function render()
    {
        $this->comisiones = Comision::where('status', true)->get();

        return view('livewire.admin.gestion-comisiones', [
            'comisiones' => $this->comisiones,
        ])->layout('layouts.adminlte');
    }

    protected function messages()
    {
        return [
            'name.required' => 'El nombre de la comisión es requerido.',
            'orden.required' => 'El orden de la comisión es requerido.',
            'orden.unique' => 'El nro de orden ya se encuentra registrado, elija otro.'
        ];
    }

    public function create()
    {
        $this->comision_id = 0;
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {
        $comision = Comision::findOrFail($id);
        $this->comision_id = $id;
        $this->name = $comision->name;
        $this->orden = $comision->orden;
        $this->openModal();
    }

    public function storeComision()
    {

        $validatedData = $this->validate([
            'name' => 'required|string',
            'orden' => 'required|integer|unique:comisiones,orden',
        ]);

        Comision::create([
            'usuarioAlta_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'orden' => $validatedData['orden'],
            'status' => true
        ]);

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function updateComision()
    {

        $validatedData = $this->validate([
            'name' => 'required|string',
            'orden' => 'required|integer|unique:comisiones,orden,' . $this->comision_id
        ]);

        Comision::where('id', $this->comision_id)->update([
            'usuarioModifica_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'orden' => $validatedData['orden']
        ]);
        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }


    public function delete($id)
    {
        Comision::where('id', '=', $id)->update([
            'usuarioBaja_id' => Auth::user()->id,
            'fechaBaja' => now(),
            'status' => false
        ]);
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
        $this->status = '';
        $this->orden = '';
    }
}
