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

    public function render()
    {
        $roles = Role::all();
        return view('livewire.admin.roles', compact('roles'))->layout('layouts.adminlte');
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:roles',
            'description' => 'nullable',
        ]);

        Role::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Rol creado exitosamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {

        $role = Role::findOrFail($id);
        // dd($role);
        logger("Llego al metodo Edit y obtengo el rol");
        $this->role_id = $id;
        $this->name = $role->name;
        $this->description = $role->description;
        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,' . $this->role,
            'description' => 'nullable',
        ]);

        $role = Role::findOrFail($this->role);
        $role->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Rol actualizado exitosamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('message', 'Rol eliminado exitosamente.');
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
