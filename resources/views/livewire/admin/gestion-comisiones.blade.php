<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Comisiones</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i
                        class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                    Comisión</button>
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
                                        <input wire:model="searchByName" type="search" placeholder="Buscar por nombre" class="form-control form-control-sm"></th>
                                    </div>
                                </div>
                            </th>
                            <th></th>
                            <th class="text-center align-middle">
                                <button wire:click="resetSearchFields" class="btn btn-sm btn-secondary">Limpiar Búsqueda</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comisiones as $comision)
                            <tr>
                                <td>{{ $comision->id }}</td>
                                <td>{{ $comision->name }}</td>
                                <td>{{ $comision->orden }}</td>
                                <td class="p-1 text-center">
                                    <button wire:click="edit({{ $comision->id }})" class="btn btn-sm btn-primary"
                                        data-toggle="modal" data-target="#roleModal" title="Editar"><i
                                            class="fa fa-edit"></i></button>
                                    <button wire:click="$emit('alertDelete',{{ $comision->id }})"
                                        class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"
                                            style="color: white "></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $comisiones->links('layouts.paginator') }}
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
                            @if ($comision_id)
                                Editar comisión
                            @else
                                Crear comisión
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
                                    <label class="sr-only" for="orden">Orden <small class="text-danger">
                                            *</small></label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Orden <span class="text-danger"> *</span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="orden" id="orden"
                                            wire:model="orden">

                                    </div>
                                    @error('orden')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        @if ($comision_id !== 0)
                            <button wire:click="updateComision" class="btn btn-primary">Actualizar</button>
                        @else
                            <button wire:click="storeComision" class="btn btn-primary">Guardar</button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @endif

</div>
