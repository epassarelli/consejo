<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Contactos</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i
                        class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                    Contacto</button>
            </div>
        </div>

        <!-- Roles Table -->
        {{-- <h1>Cantidad {{ $cantidad }}</h1> --}}
        <table class="table table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Mail</th>
                    <th class="text-center">Telefono</th>
                    <th style="width: 10%" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->id }}</td>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->mail }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td class="p-1 text-center">
                            <button wire:click="edit({{ $contacto->id }})" class="btn btn-sm btn-primary"
                                data-toggle="modal" data-target="#roleModal" title="Editar"><i
                                    class="fa fa-edit"></i></button>
                            <button wire:click="$emit('alertDelete',{{ $contacto->id }})" class="btn btn-sm btn-danger"
                                title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
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
                            @if ($contacto_id)
                                Editar Contacto
                            @else
                                Crear Nuevo contacto
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" wire:model="nombre">
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mail">E-mail</label>
                            <input type="text" class="form-control" wire:model="mail">
                            @error('mail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" wire:model="telefono">
                            @error('telefono')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label>Provincia</label>
                                <select class="form-control" id="provincia_id" wire:model="provincia_id">
                                    <option value="0">
                                        Seleccione una Provincia
                                    </option>
                                    @if ($provincias)
                                        @foreach ($provincias as $provincia)
                                            <option value="{{ $provincia['id'] }}">
                                                {{ $provincia['nombre'] }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('provincia_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                                <label>Localidad</span></label>
                                <select class="form-control" id="localidad_id" wire:model="localidad_id">
                                    <option value="0">
                                        Seleccione una Localidad
                                    </option>
                                    @if ($localidades)
                                        @foreach ($localidades as $localidad)
                                            <option value="{{ $localidad['id'] }}">
                                                {{ $localidad['nombre'] }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('localidad_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>



                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea class="form-control" wire:model="mensaje"></textarea>
                            @error('mensaje')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        @if ($contacto_id !== 0)
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
