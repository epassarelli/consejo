<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Users extends Component
{
    public $user;
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $muestraModal     = 'none';
    public $muestraModalPass = 'none';

    protected $users;
    protected $listeners = ['delete'];

    public function render()
    {
        $users = User::all();
        return view('livewire.admin.users', compact('users'))->layout('layouts.adminlte');
    }


    protected function rules()
    {
        if ($this->muestraModalPass == 'none') {
            return [
                'name' => 'required',
                'email' => 'required | email',
            ];
        }
        return [
            'password' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'El nombre del usuario es requerido',
            'email.required' => 'El E-mail del usuario es requerido',
            'email.email' => 'El E-mail no responde al formato de correo electronico',
            'password.required' => 'La password del usuario es requerida',
        ];
    }

    public function create()
    {
        $this->user_id = 0;
        $this->password = 'asdffasd***1asdsf***..webpass';
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->openModal();
    }


    public function changepass($id)
    {

        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = null;
        $this->openModalPass();
    }



    public function store()
    {
        $this->validate();


        User::updateOrCreate(
            ['id' => $this->user_id],
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
            ]
        );

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }


    public function cambiapass()
    {
        $this->validate();


        User::updateOrCreate(
            ['id' => $this->user_id],
            [
                'password' => $this->password,
            ]
        );

        $this->closeModalPass();
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
        $this->email = '';
        $this->password = '';
    }


    public function closeModalPass()
    {
        // $this->isOpen = false;
        $this->muestraModalPass = 'none';
    }

    public function openModalPass()
    {
        // $this->isOpen = true;
        $this->muestraModalPass = 'block';
    }
}
