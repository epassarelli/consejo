<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Role;
use Illuminate\Support\Facades\Session;

class Roles extends Component
{
    public $role;
    public $role_id;
    public $name;
    public $description;
    public $isOpen = false;
    public $muestraModal = 'none';

    protected $roles;
    protected $listeners = ['delete'];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.admin.roles', compact('roles'))->layout('layouts.adminlte');
    }


    protected function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'El nombre del rol es requerido',
        ];
    }

    public function create()
    {
        $this->role_id = 0;
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {

        $role = Role::findOrFail($id);
        $this->role_id = $id;
        $this->name = $role->name;
        $this->description = $role->description;
        $this->openModal();
    }

    public function store()
    {
        $this->validate();


        Role::updateOrCreate(
            ['id' => $this->role_id],
            [
                'name' => $this->name,
                'description' => $this->description
            ]
        );

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function delete($id)
    {
        User::find($id)->delete();

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
        $this->description = '';
    }
}
