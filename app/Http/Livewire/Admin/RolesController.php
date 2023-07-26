<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Role;

class RolesController extends Component
{
    public $role;
    public $role_id = 1;
    public $name;
    public $description;
    public $isOpen = false;
    public $cantidad = 3;

    public function render()
    {
        $roles = Role::all();
        $cantidad = $this->cantidad;
        $role_id = $this->role_id;
        return view('livewire.admin.roles', compact('roles', 'cantidad', 'role_id'))->layout('layouts.adminlte');
    }

    public function incrementar()
    {
        $this->cantidad = $this->cantidad + 1;
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
        $this->role = $role->id;
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
        $this->isOpen = false;
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
    }
}
