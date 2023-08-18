<div>
    <div class="container mt-4">
    @if ($muestraModalAsisten !== 'block')

        <div class="row">
            <div class="col-md-8">
                <h3>Evento</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i
                        class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                    Evento</button>
            </div>
        </div>

        <table class="table table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Descripcion</th>
                    <th style="width: 10%" class="text-center">Habilitado</th>
                    <th style="width: 10%" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->id }}</td>
                        <td>{{ $evento->titulo }}</td>
                        <td>{{ $evento->descripcion }}</td>
                        <td class="text-center">{{ $evento->estado == 1 ? 'SI' : 'NO' }}</td>
                        <td class="p-1 text-center">
                            <button wire:click="edit({{ $evento->id }})" class="btn btn-sm btn-primary"
                                data-toggle="modal" data-target="#roleModal" title="Editar"><i
                                    class="fa fa-edit"></i></button>
                            <button wire:click="$emit('alertDelete',{{ $evento->id }})" class="btn btn-sm btn-danger"
                                title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>

                            <button wire:click="asistentes({{ $evento->id }})" class="btn btn-sm btn-warning"
                                data-toggle="modal" data-target="#roleModal" title="Asistentes"><i
                                    class="fa fa-users"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <div class="row">

            {{ $eventos->links() }}

        </div> --}}
    @else

        @include('livewire.admin.eventos-asistentes-form')

    @endif

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
                            @if ($evento_id)
                                Editar Evento
                            @else
                                Crear Evento
                            @endif
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" wire:model="titulo">
                            @error('titulo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" wire:model="descripcion"></textarea>
                            @error('descripcion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="lugar">Lugar</label>
                            <input type="text" class="form-control" wire:model="lugar">
                            @error('lugar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" wire:model="fecha">
                            @error('fecha')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="link_mapa">Link Mapa</label>
                            <textarea class="form-control" wire:model="link_mapa"></textarea>
                            @error('link_mapa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select class="form-control" wire:model="estado">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        @if ($evento_id !== 0)
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
