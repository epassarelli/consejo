<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Usuarios</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i
                        class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                    Usuario</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th wire:click="sortBy('id')" class="text-center" style="width: 5%">Id
                                @if($sortColumn == 'id')
                                @if($sortDirection == 'asc')
                                <i class="fas fa-sort-up"></i>

                                @else
                                <i class="fas fa-sort-down"></i>
                                @endif
                                @else
                                <i class="fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="sortBy('name')" class="text-center">Nombre
                                @if($sortColumn == 'name')
                                @if($sortDirection == 'asc')
                                <i class="fas fa-sort-up"></i>

                                @else
                                <i class="fas fa-sort-down"></i>
                                @endif
                                @else
                                <i class="fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="sortBy('lastname')" class="text-center">Apellido
                                @if($sortColumn == 'lastname')
                                @if($sortDirection == 'asc')
                                <i class="fas fa-sort-up"></i>

                                @else
                                <i class="fas fa-sort-down"></i>
                                @endif
                                @else
                                <i class="fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="sortBy('email')" class="text-center">E-mail
                                @if($sortColumn == 'email')
                                @if($sortDirection == 'asc')
                                <i class="fas fa-sort-up"></i>

                                @else
                                <i class="fas fa-sort-down"></i>
                                @endif
                                @else
                                <i class="fas fa-sort"></i>
                                @endif
                            </th>
                            <th class="text-center">Roles
                            </th>
                            <th wire:click="sortBy('orden')" class="text-center">Orden
                                @if($sortColumn == 'orden')
                                @if($sortDirection == 'asc')
                                <i class="fas fa-sort-up"></i>

                                @else
                                <i class="fas fa-sort-down"></i>
                                @endif
                                @else
                                <i class="fas fa-sort"></i>
                                @endif
                            </th>
                            <th style="width: 15%" class="text-center">Acciones</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th class="align-middle">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input wire:model="searchByName" type="search" placeholder="Buscar por nombre" class="form-control form-control-sm">
                            </th>
            </div>
        </div>
        </th>
        <th class="align-middle">
            <div class="row">
                <div class="col-sm-12">
                    <input wire:model="searchByLastname" type="search" placeholder="Buscar por apellido" class="form-control form-control-sm">
        </th>
    </div>
</div>
</th>
<th class="align-middle">
    <div class="row">
        <div class="col-sm-12">
            <input wire:model="searchByEmail" type="search" placeholder="Buscar por e-mail" class="form-control form-control-sm">
</th>
</div>
</div>
</th>
<th class="align-middle">
    <div class="row">
        <div class="col-sm-12">
            <input wire:model="searchByRoles" type="search" placeholder="Buscar por roles" class="form-control form-control-sm">
</th>
</div>
</div>
</th>

<th class="align-middle">
    <div class="row">
        <div class="col-sm-12">
        </div>
    </div>
</th>

<th class="text-center align-middle">
    <button wire:click="resetSearchFields" class="btn btn-sm btn-secondary">Limpiar Búsqueda</button>
</th>
</tr>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
        <td class="text-center">{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->roles_as_string }}</td>
        <td class="text-center">{{ $user->orden }}</td>
        <td class="p-1 text-center">
            <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-primary"
                data-toggle="modal" data-target="#roleModal" title="Editar"><i
                    class="fa fa-edit"></i></button>
            <button wire:click="$emit('alertDelete',{{ $user->id }})"
                class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"
                    style="color: white "></i></button>
            <button wire:click="changepass({{ $user->id }})" class="btn btn-sm btn-info"
                data-toggle="modal" data-target="#roleModal" title="Cambia Password"><i
                    class="fas fa-key" style="color: white "></i></button>
            <button wire:click="roles({{ $user->id }})" class="btn btn-sm btn-warning"
                data-toggle="modal" data-target="#roleModal" title="Roles"><i
                    class="fa fa-bars"></i></button>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{ $users->links('layouts.paginator') }}
</div>
</div>

</div>

@if ($muestraModal == 'block')
<!-- Role Form Modal -->
<div class="modal fade show" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel"
    aria-hidden="true" style="display: {{ $muestraModal }}">
    {{-- <div class="modal" tabindex="-1" role="dialog" wire:ignore.self> --}}

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">
                    @if ($user_id)
                    Editar usuario
                    @else
                    Crear usuario
                    @endif
                </h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="sr-only" for="lastname">Apellido <small class="text-danger">
                                    *</small></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Apellido <span class="text-danger"> *</span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                    wire:model="lastname">

                            </div>
                            @error('lastname')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label class="sr-only" for="name">Nombre <small class="text-danger">
                                    *</small></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Nombre <span class="text-danger"> *</span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="name" id="name"
                                    wire:model="name">

                            </div>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label class="sr-only" for="email">E-mail <small class="text-danger">
                                    *</small></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">E-mail <span class="text-danger"> *</span>
                                    </div>
                                </div>
                                <input type="mail" class="form-control" name="email" id="email"
                                    wire:model="email">

                            </div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label class="sr-only" for="phone">Teléfono</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Teléfono</div>
                                </div>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    wire:model="phone">

                            </div>
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-6 mb-2">
                            <label class="sr-only" for="cargo_id">Cargo</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Cargo</div>
                                </div>

                                <select class="form-control" id="cargo_id"
                                    aria-label="Default select example" name="cargo_id"
                                    wire:model="cargo_id">
                                    <option selected>Seleccione un cargo</option>
                                    @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->id }}">{{ $cargo->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            @error('cargo_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col-6 mb-2">
                            <label class="sr-only" for="facultad_id">Unidad académica</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Unidad académica</span>
                                    </div>
                                </div>
                                <select class="form-control" id="facultad_id"
                                    aria-label="Default select example" name="facultad_id"
                                    wire:model="facultad_id">
                                    <option selected>Seleccione una unidad académica</option>
                                    @foreach ($facultades as $facultad)
                                    <option value="{{ $facultad->id }}">{{ $facultad->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('facultad_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col-3 mb-2">
                            <label class="sr-only" for="orden">Orden</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Orden</div>
                                </div>
                                <input type="number" class="form-control" name="orden" min="1" id="orden"
                                    wire:model="orden">

                            </div>
                            @error('orden')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-3 mb-2">
                            <label class="sr-only" for="web">Conformación del consejo (web)</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" wire:click="changeToggle">
                                        @if ($togleWeb)
                                        <i class="fas fa-toggle-on text-success fa-lg"></i>
                                        <input type="hidden" name="web" value="V"
                                            wire:model="web">
                                        @else
                                        <i class="fas fa-toggle-off text-default fa-lg"></i>
                                        <input type="hidden" name="web" value="F"
                                            wire:model="web">
                                        @endif
                                        &nbsp;&nbsp; Conformación del consejo
                                        (web)
                                    </div>
                                </div>
                            </div>
                            @error('web')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($user_id == 0)
                        <div class="col-6 mb-2">
                            <label class="sr-only" for="rol_id">Rol</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rol
                                        <span class="text-danger"> *</span>
                                    </div>
                                </div>
                                <select class="form-control" id="rol_id"
                                    aria-label="Default select example" name="rol"
                                    wire:model="rol_id">
                                    <option selected>Seleccione un rol</option>
                                    @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            @error('rol_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif
                        @if ($user_id == 0)
                        <div class="col-6 mb-2">
                            <label class="sr-only" for="password">Contraseña</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Contraseña
                                        <span class="text-danger"> *</span>
                                    </div>
                                </div>
                                <input type="password" class="form-control" name="password"
                                    wire:model="password">
                            </div>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label class="sr-only" for="repassword">Repetir contraseña</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Repetir contraseña

                                        <span class="text-danger"> *</span>
                                    </div>
                                </div>
                                <input type="password" class="form-control" id="repassword"
                                    name="repassword" wire:model="repassword">
                            </div>
                            @error('repassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif

                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                @if ($user_id !== 0)
                <button wire:click="updateUser" class="btn btn-primary">Actualizar</button>
                @else
                <button wire:click="storeUser" class="btn btn-primary">Guardar</button>
                @endif
            </div>
        </div>
    </div>

</div>
@endif



@if ($muestraModalPass == 'block')
<!-- Role Form Modal -->
<div class="modal fade show" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel"
    aria-hidden="true" style="display: {{ $muestraModalPass }}">
    {{-- <div class="modal" tabindex="-1" role="dialog" wire:ignore.self> --}}

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">
                    Cambia Password
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="password" for="password">Nueva Password</label>
                    <input type="password" id="password" class="form-control" wire:model="password"
                        name="password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModalPass" class="btn btn-secondary"
                        data-dismiss="modal">Cerrar</button>
                    <button wire:click="cambiapass" class="btn btn-primary">Cambiar Password</button>
                </div>
            </div>
        </div>

    </div>
    @endif



    @if ($muestraModalRoles == 'block')
    <!-- Role Form Modal -->
    <div class="modal fade show" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel"
        aria-hidden="true" style="display: {{ $muestraModalRoles }}">
        {{-- <div class="modal" tabindex="-1" role="dialog" wire:ignore.self> --}}

        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleModalLabel">
                        Roles
                    </h5>
                </div>
                <div class="modal-body">

                    <h2>{{ $user_nombre_rol }}</h2>
                    <div class="col-md-4 text-right float-right mb-1">
                        <button wire:click="newRole" class="btn btn-success" data-toggle="modal"
                            data-target="#roleModalRole"><i class="fas fa-plus-circle mr-2"
                                style="color: white;"></i>Agregar Role</button>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Rol</th>
                                <th class="p-2 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users_roles as $user_rol)
                            <tr>
                                <td style="width: 30%;" class="p-1 align-middle">{{ $user_rol->rol_nombre }}
                                </td>
                                <td style="width: 10%;" class="p-1 text-center">
                                    <button wire:click="deleteRole({{ $user_rol->id }})"
                                        class="btn btn-sm btn-danger" title="Eliminar"><i
                                            class="fas fa-trash-alt" style="color: white "></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="modal-footer">
                        <button type="button" wire:click="closeModalRoles" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>

        </div>
        @endif


        @if ($muestraModalRole == 'block')
        <!-- Role Form Modal -->
        <div class="modal fade show" id="roleModalRole" tabindex="-1" role="dialog"
            aria-labelledby="roleModalRoleLabel" aria-hidden="true" style="display: {{ $muestraModalRole }}">
            {{-- <div class="modal" tabindex="-1" role="dialog" wire:ignore.self> --}}

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">
                            Asignar Nuevo Role
                        </h5>
                    </div>
                    <div class="modal-body">

                        <label>Role <span class="text-danger">*</span></label>
                        <select class="form-control" id="user_rol_id" wire:model="user_rol_id">
                            <option value="0">
                                Seleccione un Role
                            </option>
                            @if ($roles)
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">
                                {{ $role->name }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                        @error('user_rol_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModalRole" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        <button wire:click="storeRole" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>

        </div>
        @endif

    </div>