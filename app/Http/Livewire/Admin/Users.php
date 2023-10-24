<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cargo;
use App\Models\Facultad;
use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\User_rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Users extends Component
{
    public $user;
    public $facultades;
    public $cargos;
    public $user_id, $user_nombre_rol, $user_rol_id;
    public $name;
    public $email;
    public $password;
    public $muestraModal     = 'none';
    public $muestraModalPass = 'none';
    public $muestraModalRoles = 'none';
    public $muestraModalRole = 'none';

    protected $users, $roles, $users_roles;
    protected $listeners = ['delete'];

    public function render()
    {
        $this->users = User::all();
        $this->roles = Role::all();
        $this->facultades = Facultad::all();
        $this->cargos = Cargo::all();
        if ($this->user_id) {
            $this->users_roles = User_rol::select([
                'users_roles.id',
                'roles.name as rol_nombre'
            ])
                ->leftJoin('roles', 'roles.id', '=', 'users_roles.rol_id')
                ->where('users_roles.user_id', '=', $this->user_id)
                ->get();
        }

        return view('livewire.admin.users', [
            'users' => $this->users,
            'roles' => $this->roles,
            'users_roles' => $this->users_roles,
            'facultades' => $this->facultades,
            'cargos' => $this->cargos,
        ])->layout('layouts.adminlte');
    }

    protected function rules()
    {

        if ($this->muestraModal == 'block') {
            return [
                'name' => 'required',
                'email' => 'required | email',
            ];
        }

        if ($this->muestraModalPass == 'block') {
            return [
                'password' => 'required',
            ];
        }

        if ($this->muestraModalRole == 'block') {
            return [
                'user_rol_id' => 'required',
            ];
        }
    }



    protected function messages()
    {
        return [
            'name.required' => 'El nombre del usuario es requerido',
            'email.required' => 'El E-mail del usuario es requerido',
            'email.email' => 'El E-mail no responde al formato de correo electronico',
            'password.required' => 'La password del usuario es requerida',
            'user_rol_id.required' => 'Debe seleccionar un role',
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

    public function closeModalRoles()
    {
        // $this->isOpen = false;
        $this->muestraModalRoles = 'none';
    }

    public function openModalRoles()
    {
        // $this->isOpen = true;
        $this->muestraModalRoles = 'block';
    }


    public function closeModalRole()
    {
        // $this->isOpen = false;
        $this->muestraModalRole = 'none';
    }

    public function openModalRole()
    {
        // $this->isOpen = true;
        $this->muestraModalRole = 'block';
    }



    public function roles($id)
    {
        $this->user_id = $id;
        $this->user_nombre_rol = User::where('id', '=', $id)->value('name');


        $this->users_roles = User_rol::select([
            'users_roles.id',
            'roles.name as rol_nombre'
        ])
            ->leftJoin('roles', 'roles.id', '=', 'users_roles.rol_id')
            ->where('users_roles.user_id', '=', $id)
            ->get();

        $this->openModalRoles();
    }


    public function newRole()
    {
        $this->openModalRole();
    }


    public function storeRole()
    {
        $this->validate();


        User_rol::updateOrCreate(
            [
                'user_id' => $this->user_id,
                'rol_id' => $this->user_rol_id
            ],
            [
                'user_id' => $this->user_id,
                'rol_id' => $this->user_rol_id
            ]
        );

        $this->closeModalRole();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }


    public function deleteRole($id)
    {
        User_rol::where('id', '=', $id)->delete();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }
}
