<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Roles</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-primary" data-toggle="modal" data-target="#roleModal">Agregar
                    Rol</button>
                <button wire:click="create" class="btn btn-primary">Agregar Rol</button>
                {{-- <button wire:click.prevent="incrementar()">Incrementar</button> --}}
            </div>
        </div>

        <!-- Roles Table -->
        {{-- <h1>Cantidad {{ $cantidad }}</h1> --}}
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <button wire:click="edit({{ $role->id }})" class="btn btn-sm btn-primary"
                                data-toggle="modal" data-target="#roleModal">Editar</button>
                            <button wire:click="delete({{ $role->id }})" class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Estás seguro de eliminar este rol?')">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Role Form Modal -->
    @if ($isOpen)

        <h1>Modal abierto</h1>

        <div class="modal" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel"
            aria-hidden="true">
            {{-- <div class="modal" tabindex="-1" role="dialog" wire:ignore.self> --}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">
                            @if ($role_id)
                                Editar Rol
                            @else
                                Crear Nuevo Rol
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Rol</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" wire:model="description"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        @if ($role_id)
                            <button wire:click="update" class="btn btn-primary">Actualizar</button>
                        @else
                            <button wire:click="store" class="btn btn-primary">Guardar</button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @endif

</div>
