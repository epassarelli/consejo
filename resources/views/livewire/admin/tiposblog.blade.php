<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Tipos de Blog</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                    Tipo de Blog</button>
            </div>
        </div>

        <!-- Roles Table -->
        {{-- <h1>Cantidad {{ $cantidad }}</h1> --}}
        <table class="table table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th style="width: 10%" class="text-center">Habilitado</th>
                    <th  style="width: 10%" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposblog as $tipoblog)
                    <tr>
                        <td>{{ $tipoblog->id }}</td>
                        <td>{{ $tipoblog->name }}</td>
                        <td class="text-center">{{ ($tipoblog->habilitado==1) ? 'SI' : 'NO' }}</td>
                        {{-- <td>
                            @livewire(
                                'toggle-button',
                                [
                                    'model' => $tipoblog,
                                    'field' => 'habilitado',
                                ],
                                key($tipoblog->id)
                            )
                        </td> --}}
                        <td class="p-1 text-center">
                            <button wire:click="edit({{ $tipoblog->id }})" class="btn btn-sm btn-primary"
                                data-toggle="modal" data-target="#roleModal" title="Editar"><i class="fa fa-edit" ></i></button>
                            <button wire:click="$emit('alertDelete',{{ $tipoblog->id }})" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
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

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">
                            @if ($tipoblog_id)
                                Editar Tipo de Blog
                            @else
                                Crear Nuevo Tipo de Blog
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
                            <div class="form-group">
                                <label for="habilitado">Habilitado</label>
                                <select
                                    class="form-control"
                                    wire:model="habilitado">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        @if ($tipoblog_id !==0 )
                            <button wire:click="store" class="btn btn-primary">Actualizar</button>
                        @else
                            <button wire:click="store" class="btn btn-primary">Guardar</button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>
