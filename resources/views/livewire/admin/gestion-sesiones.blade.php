<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Sesiones del Consejo</h3>
            </div>
            <div class="col-md-4 text-right">
                @if($esAdmin)
                <!-- Usar el método de Livewire para abrir el modal en vez de data-toggle y data-target -->
                <button wire:click="create" class="btn btn-success"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar Sesión</button>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
            </div>
            <div class="col-12">
                <table id="" class="table table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th  wire:click="sortBy('fecha')" class="text-center">
                                Fecha
                                @if($sortColumn == 'fecha')
                                    @if($sortDirection == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort"></i>
                                @endif
                            </th>
                            <th style="width: 15%" wire:click="sortBy('estado')" class="text-center">
                                Estado
                                @if($sortColumn == 'estado')
                                    @if($sortDirection == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="sortBy('fComunicacion')" class="text-center">
                                Fec. comunicación
                                @if($sortColumn == 'fComunicacion')
                                    @if($sortDirection == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort"></i>
                                @endif
                            </th>
                            <th wire:click="sortBy('fFinalizada')" class="text-center">
                                Fec. finalización
                                @if($sortColumn == 'fFinalizada')
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
                    </thead>
                    <tbody>
                        @foreach ($sesiones as $sesion)
                        <tr>
                            <!-- Usar Carbon para formatear fechas -->
                            <td class="text-center">{{ \Carbon\Carbon::parse($sesion->fecha)->format('d-m-Y') }}</td>
                            <td>{{ $estados[$sesion->estado - 1] }}</td>
                            <td class="text-center">
                                {{ $sesion->fComunicacion ? \Carbon\Carbon::parse($sesion->fComunicacion)->format('d-m-Y') : '' }}
                            </td>
                            <td class="text-center">
                                {{ $sesion->fFinalizada ? \Carbon\Carbon::parse($sesion->fFinalizada)->format('d-m-Y') : '' }}
                            </td>
                            <td class="p-1 text-center">
                                <!-- Simplificación del código eliminando data-toggle y data-target -->
                                <button wire:click="edit({{ $sesion->id }})" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-edit"></i></button>
                                <button wire:click="openOrdenModal({{ $sesion->id }})" class="btn btn-sm btn-info" title="Orden del día"><i class="fas fa-file-alt"></i></button>
                                <button wire:click="notificar({{ $sesion->id }})" class="btn btn-sm btn-warning" title="Notificar"><i class="far fa-bell"></i></button>
                                <button wire:click="descargarPdf({{ $sesion->id }})" class="btn btn-sm btn-danger" title="Descargar PDF"><i class="far fa-file-pdf"></i></button>
                                @if($esAdmin && $sesion->estado == 1)
                                <button wire:click="iniciarSesion({{ $sesion->id }})" class="btn btn-sm btn-secondary" title="Iniciar sesión"><i class="fas fa-users"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                <div class="row">
                                    <label for="searchByDateStart" class="col-sm-2 col-form-label">Desde: </label>
                                    <div class="col-sm-10">
                                      <input wire:model="searchByDateStart" id="searchByDateStart" type="date" placeholder="Buscar por fecha desde" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <label for="searchByDateEnd" class="col-sm-2 col-form-label">Hasta: </label>
                                    <div class="col-sm-10">
                                        <input wire:model="searchByDateEnd" id="searchByDateEnd" type="date" placeholder="Buscar por fecha hasta" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input wire:model="searchByState" type="search" placeholder="Buscar por estado" class="form-control form-control-sm"></th>
                                    </div>
                                </div>

                            <th>
                                <div class="row">
                                    <label for="searchByDateComStart" class="col-sm-2 col-form-label">Desde: </label>
                                    <div class="col-sm-10">
                                        <input wire:model="searchByDateComStart" id="searchByDateComStart" type="date" placeholder="Buscar por fecha desde" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <label for="searchByDateComEnd" class="col-sm-2 col-form-label">Hasta: </label>
                                    <div class="col-sm-10">
                                        <input wire:model="searchByDateComEnd" id="searchByDateComEnd" type="date" placeholder="Buscar por fecha hasta" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="row">
                                    <label for="searchByDateFinishStart" class="col-sm-2 col-form-label">Desde: </label>
                                    <div class="col-sm-10">
                                      <input wire:model="searchByDateFinishStart" id="searchByDateFinishStart" type="date" placeholder="Buscar por fecha desde" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="mt-2 row">
                                    <label for="searchByDateFinishEnd" class="col-sm-2 col-form-label">Hasta: </label>
                                    <div class="col-sm-10">
                                        <input wire:model="searchByDateFinishEnd" id="searchByDateFinishEnd" type="date" placeholder="Buscar por fecha hasta" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </th>
                            <th class="text-center align-middle">
                                <button wire:click="resetSearchFields" class="btn btn-sm btn-secondary">Limpiar Búsqueda</button>
                            </th>
                        </tr>
                    </tfoot>
                </table>
                {{ $sesiones->links('layouts.paginator') }}
            </div>
        </div>
    </div>

    @if ($muestraModal == 'block')
    <!-- Role Form Modal -->
    <div class="modal fade show" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true" style="display: {{ $muestraModal }}">
        {{-- <div class="modal" tabindex="-1" role="dialog" wire:ignore.self> --}}

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleModalLabel">
                        @if ($sesion_id)
                        Editar Sesión
                        @else
                        Crear Sesión
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
                                <label class="sr-only" for="fecha">Fecha <small class="text-danger">
                                        *</small></label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Fecha <span class="text-danger"> *</span>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control" name="fecha" id="fecha" wire:model="fecha">

                                </div>
                                @error('fecha')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label class="sr-only" for="urlYoutube">YouTube</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">YouTube &nbsp;<i class="fab fa-youtube "></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="urlYoutube" id="urlYoutube" wire:model="urlYoutube">

                                </div>
                                @error('urlYoutube')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    @if ($sesion_id !== 0)
                    <button wire:click="updateSesion" class="btn btn-primary">Actualizar</button>
                    @else
                    <button wire:click="storeSesion" class="btn btn-primary">Guardar</button>
                    @endif
                </div>
            </div>
        </div>

    </div>
    @endif


    @livewire('admin.ordenes-del-dia')
</div>