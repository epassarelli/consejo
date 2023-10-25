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

        <table class="table table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">E-mail</th>
                    <th style="width: 15%" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="p-1 text-center">
                            <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-primary"
                                data-toggle="modal" data-target="#roleModal" title="Editar"><i
                                    class="fa fa-edit"></i></button>
                            <button wire:click="$emit('alertDelete',{{ $user->id }})" class="btn btn-sm btn-danger"
                                title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                        <input type="text" class="form-control" name="lastname" id="lastname">

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
                                        <input type="text" class="form-control" name="name" id="name">

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
                                        <input type="text" class="form-control" name="email" id="email">

                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6 mb-2">
                                    <label class="sr-only" for="phone">Teléfono</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Teléfono <span class="text-danger"> *</span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="phone" id="phone">

                                    </div>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-6 mb-2">
                                    <label class="sr-only" for="phone">Cargo <small class="text-danger">
                                            *</small></label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Cargo</span>
                                            </div>
                                        </div>

                                        <select class="form-control" id="cargo"
                                            aria-label="Default select example">
                                            <option selected>Seleccione un cargo</option>
                                            @foreach ($cargos as $cargo)
                                                <option value="{{ $cargo->id }}">{{ $cargo->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('cargo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6 mb-2">
                                    <label class="sr-only" for="rol">Rol</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rol</span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="rol"
                                            aria-label="Default select example">
                                            <option selected>Seleccione un rol</option>
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('rol')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-5 mb-2">
                                    <label class="sr-only" for="facultad">Facultad</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Facultad</span>
                                            </div>
                                        </div>
                                        <select class="form-control" id="facultad"
                                            aria-label="Default select example">
                                            <option selected>Seleccione un facultad</option>
                                            @foreach ($facultades as $facultad)
                                                <option value="{{ $facultad->id }}">{{ $facultad->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('facultad')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-5 mb-2">
                                    <label class="sr-only" for="web">Conformación del consejo (web)</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Conformación del consejo (web)</div>
                                        </div>
                                        <input type="text" class="form-control" name="web" id="web">

                                    </div>
                                    @error('web')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-2 mb-2">
                                    <label class="sr-only" for="orden">Orden</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Orden <span class="text-danger"> *</span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="orden" id="orden">

                                    </div>
                                    @error('orden')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6 mb-2">
                                    <label class="sr-only" for="password">Contraseña</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Contraseña <span class="text-danger"> *</span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" wire:model="password">
                                    </div>
                                    @error('repassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6 mb-2">
                                    <label class="sr-only" for="password">Repetir contraseña</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Repetir contraseña <span class="text-danger"> *</span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" wire:model="password">
                                    </div>
                                    @error('repassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        @if ($user_id !== 0)
                            <button wire:click="store" class="btn btn-primary">Actualizar</button>
                        @else
                            <button wire:click="store" class="btn btn-primary">Guardar</button>
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
                            <label for="password">Nueva Password</label>
                            <input type="password" class="form-control" wire:model="password">
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
                            Crear Nuevo Role
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
