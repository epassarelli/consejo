<div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Temas</h3>
            </div>

            <div class="col-md-4 text-right">
                <button class="btn btn-success" wire:click="openModal"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar</button>
            </div>

            <div class="row w-100 mt-3">
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
                                <th wire:click="sortBy('titulo')" class="text-center">Título
                                    @if($sortColumn == 'titulo')
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
                                            <input wire:model="searchByTitle" type="search" placeholder="Buscar por título" class="form-control form-control-sm"></th>
                                        </div>
                                    </div>
                                </th>
                                <th class="text-center align-middle">
                                    <button wire:click="resetSearchFields" class="btn btn-sm btn-secondary">Limpiar Búsqueda</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temas as $tema)
                            <tr>
                                <td>{{ $tema->id }}</td>
                                <td>{{ $tema->titulo }}</td>
                                <td class="p-1 text-center">
                                    <button wire:click="openEditModal({{ $tema->id }})" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-edit"></i></button>
                                    <button wire:click="$emit('alertDelete',{{ $tema->id }})" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $temas->links('layouts.paginator') }}
                </div>
            </div>
        </div>

        <!-- Modal -->
        @if($showActionModal)
        <div wire:ignore.self class="modal fade show" id="temaModal" tabindex="-1" role="dialog" aria-labelledby="temaModalLabel" aria-hidden="true" style="display: {{ $showActionModal ? 'block':''}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="temaModalLabel">{{empty($id_tema) ? "Crear" : "Editar"}} Tema</h5>
                        <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido del modal -->
                        <div style="height: 91px;">
                            <!-- Loader -->
                            <div class="d-flex justify-content-center h-200">
                                <div wire:loading wire:target="createTema" class=" w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center">
                                    <svg class="animate-spin spinner-grow h-3 w-3 text-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"></circle>
                                        <path class="opacity-75" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014.009 18H2v-2h2.009a7.965 7.965 0 014.173-1.138l1.08 1.080zm8.142 1.088l1.083-1.083a7.965 7.965 0 011.138-4.173H22V6h-2.009a7.962 7.962 0 01-1.138 4.009l-1.083 1.083zM12 20c-4.418 0-8-3.582-8-8h2c0 3.314 2.686 6 6 6s6-2.686 6-6h2c0 4.418-3.582 8-8 8z"></path>
                                    </svg>
                                </div>

                                @if (!$loading)
                                <div class="input-group mb-2 mr-sm-2" wire:loading.class="d-none fade">
                                    <div class="col-12 input-group-prepend">
                                        <label class="input-group-text">Título</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo"  wire:model.defer="titulo">
                                    </div>

                                    <div class="col-12">
                                        @if(!empty($errorTitulo))
                                        <div class="text-danger">

                                                @foreach($errorTitulo as $error)
                                                <p>{{ $error }}</p>
                                                @endforeach

                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>



                        </div>
                        <!-- Contenido del modal -->
                        <div class="d-flex justify-content-end">
                        @if(empty($id_tema))
                            <button type="button" wire:click="createTema" wire:loading.attr="disabled" class="btn btn-primary">Crear</button>
                        @else
                            <button type="button" wire:click="updateTema" wire:loading.attr="disabled" class="btn btn-primary">Editar</button>
                        @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endif
    </div>
</div>
</div>
