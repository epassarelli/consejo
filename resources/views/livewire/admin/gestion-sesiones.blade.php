<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Sesiones del Consejo</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                    Sesión</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table id="basic-table" class="table table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Fec. comunicación</th>
                            <th class="text-center">Fec. finaiización</th>
                            <th style="width: 15%" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sesiones as $sesion)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($sesion->fecha)) }}</td>
                            <td>{{ $estados[$sesion->estado - 1] }}</td>
                            <td>
                                {{ $sesion->fComunicacion ? date('d-m-Y', strtotime($sesion->fComunicacion)) : '' }}
                            </td>
                            <td>
                                {{ $sesion->fFinalizacion ? date('d-m-Y', strtotime($sesion->fFinalizacion)) : '' }}
                            </td>
                            <td class="p-1 text-center">
                                <button wire:click="edit({{ $sesion->id }})" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#roleModal" title="Editar"><i class="fa fa-edit"></i></button>

                                <button wire:click="openOrdenModal({{ $sesion->id }})" class="btn btn-sm btn-info" data-toggle="modal" data-target="#roleModal" title="Orden del dia"><i class="fas fa-file-alt"></i></button>

                                <button wire:click="notificar({{ $sesion->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#roleModal" title="notificar"><i class="far fa-bell"></i></button>

                                <button wire:click="descargarPdf({{ $sesion->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#roleModal" title="Descargar pdf"><i class="far fa-file-pdf"></i></button>

                                @if($sesion->estado != 4 && $esAdmin)
                                <button wire:click="iniciarSesion({{ $sesion->id }})" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#roleModal" title="Iniciar sesión"><i class="fas fa-users"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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