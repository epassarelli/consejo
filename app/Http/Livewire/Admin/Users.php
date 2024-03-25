<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cargo;
use App\Models\Facultad;
use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\User_rol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;


class Users extends Component
{
    use WithPagination;

    public $user;
    public $facultades;
    public $cargos;
    public $user_id, $user_nombre_rol, $user_rol_id;
    public $orden;
    public $name;
    public $lastname;
    public $email;
    public $phone;
    public $password;
    public $repassword;
    public $facultad_id;
    public $cargo_id;
    public $web;
    public $rol_id;
    public $muestraModal     = 'none';
    public $muestraModalPass = 'none';
    public $muestraModalRoles = 'none';
    public $muestraModalRole = 'none';
    public $togleWeb = false;

    // Campos de busqueda
    public $searchByName = '';
    public $searchByLastname = '';
    public $searchByEmail = '';
    //Campos de ordenamiento

    public $sortColumn = 'id';
    public $sortDirection = 'asc';

    protected $queryString = [
        'searchByName',
        'searchByLastname',
        'searchByEmail',
    ];

    protected $users, $roles, $users_roles;
    protected $listeners = ['delete'];

    public function render()
    {
        $this->users = User::where('estado', true)->where('email','like','%'.$this->searchByEmail.'%')->where('lastname','like','%'.$this->searchByLastname.'%')->where('name','like','%'.$this->searchByName.'%')->orderBy($this->sortColumn, $this->sortDirection)->paginate(10);
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
            'facultades' => $this->facultades,
            'cargos' => $this->cargos,
            'users_roles' => $this->users_roles,
        ])->layout('layouts.adminlte');
    }


    public function resetSearchFields()
    {
        $this->searchByName = '';
        $this->searchByLastname = '';
        $this->searchByEmail = '';
    }

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    protected function rules()
    {

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
            'lastname.required' => 'El apellido del usuario es requerido',
            'name.required' => 'El nombre del usuario es requerido',
            'rol_id.required' => 'El rol del usuario es requerido',
            'email.required' => 'El E-mail del usuario es requerido',
            'email.email' => 'El E-mail no responde al formato de correo electronico',
            'password.required' => 'La password del usuario es requerida',
            'repassword.required' => 'La confirmacion de la password del usuario es requerida',
        ];
    }

    public function create()
    {
        $this->user_id = 0;
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->lastname = $user->lastname;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->facultad_id = $user->facultad_id;
        $this->cargo_id = $user->cargo_id;
        $this->orden = $user->orden;
        $this->web = $user->web;
        $this->togleWeb = $user->web == 'V' ? true : false;
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

    public function storeUser()
    {

        $validatedData = $this->validate([
            'lastname' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'string|nullable',
            'cargo_id' => 'integer|nullable',
            'rol_id' => 'required|integer',
            'facultad_id' => 'integer|nullable',
            'web' => 'string|in:V,F',
            'orden' => 'integer|nullable',
            'password' => 'required|string|same:repassword',
            'repassword' => 'required|string'
        ]);

        User::create([
            'usuarioAlta_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'cargo_id' => $validatedData['cargo_id'] ?: null,
            'facultad_id' => $validatedData['facultad_id'] ?: null,
            'web' => $validatedData['web'],
            'orden' => $validatedData['orden'] ?: null,
            'password' => bcrypt($validatedData['password'])
        ]);
        $user = User::where('email', $validatedData['email'])->first();
        $user->roles()->attach($validatedData['rol_id']);

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function updateUser()
    {

        $validatedData = $this->validate([
            'lastname' => 'required|string',
            'name' => 'required|string',
            'phone' => 'string|nullable',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'cargo_id' => 'integer|nullable',
            'facultad_id' => 'integer|nullable',
            'web' => 'string|in:V,F',
            'orden' => 'integer|nullable'
        ]);

        User::where('id', $this->user_id)->update([
            'usuarioModifica_id' => Auth::user()->id,
            'lastname' => $validatedData['lastname'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'cargo_id' => $validatedData['cargo_id'],
            'facultad_id' => $validatedData['facultad_id'],
            'web' => $validatedData['web'],
            'orden' => $validatedData['orden']
        ]);
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
        User::where('id', '=', $id)->update([
            'usuarioBaja_id' => Auth::user()->id,
            'fechaBaja' => now(),
            'estado' => false
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
        $this->lastname = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->cargo_id = '';
        $this->facultad_id = '';
        $this->orden = '';
        $this->web = 'F';
        $this->password = '';
        $this->repassword = '';
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

    public function changeToggle()
    {
        $this->togleWeb = !$this->togleWeb;
        $this->web = $this->togleWeb ? 'V' : 'F';
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
        // Busca el registro User_rol por su ID
        $userRol = User_rol::find($id);
        // Verifica si el usuario tiene más de un rol
        if (User_rol::where('user_id', $userRol->user_id)->get()->count() > 1) {
            // Si tiene más de un rol, procede con la eliminación
            $userRol->delete();
            $this->emit('mensajePositivo', ['mensaje' => 'Operación exitosa']);
        } else {
            // Si el usuario tiene solo un rol, emite un mensaje de error
            $this->emit('mensajeNegativo', ['mensaje' => 'No se puede eliminar el único rol del usuario']);
        }
    }
}
