<div class="row">
    <div class="col-md-8">
        <h3>Asistentes al Evento: <strong>{{ $evento->titulo }}</strong></h3>
    </div>
    <div class="col-md-4 text-right">
        <button wire:click="createAsisten" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i
                class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar Asistente</button>
        <button wire:click="volver" class="btn btn-warning" data-toggle="modal" data-target="#roleModal"><i
                class="fas fa-solid fa-arrow-left mr-2" style="color: white;"></i>Volver</button>
    </div>
</div>

<table class="table table-hover table-bordered mt-3">
    <thead>
        <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">E-mail</th>
            <th class="text-center">Telefono</th>
            <th style="width: 10%" class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        {{-- @if ($eventos_asisten) --}}
        @foreach ($eventos_asisten as $evento_asisten)
            <tr>
                <td>{{ $evento_asisten->nombre }}</td>
                <td>{{ $evento_asisten->email }}</td>
                <td>{{ $evento_asisten->telefono }}</td>
                <td class="p-1 text-center">
                    <button wire:click="editAsisten({{ $evento_asisten->id }})" class="btn btn-sm btn-primary"
                        data-toggle="modal" data-target="#roleModal" title="Editar"><i class="fa fa-edit"></i></button>
                    <button wire:click="deleteAsisten({{ $evento_asisten->id }})" class="btn btn-sm btn-danger"
                        title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                </td>
            </tr>
        @endforeach
        {{-- @endif --}}
    </tbody>
</table>



@if ($muestraModalDatosAsisten == 'block')
    <!-- Role Form Modal -->
    <div class="modal fade show" id="roleModal2" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel2"
        aria-hidden="true" style="display: {{ $muestraModalDatosAsisten }}">
        {{-- <div class="modal" tabindex="-1" role="dialog" wire:ignore.self> --}}
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="roleModalLabel2">
                        <h1>{{ $evento_asisten_id}}</h1>
                        @if ($evento_asisten_id && $evento_asisten_id !==0)
                            Editar Asistente
                        @else
                            Nuevo Asistente
                        @endif
                    </h5>
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
                        <label for="email">Email</label>
                        <input type="text" class="form-control" wire:model="email">
                        @error('email')
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


                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModalDatosAsisten" class="btn btn-secondary"
                        data-dismiss="modal">Cerrar</button>
                    @if ($evento_asisten_id !== 0)
                        <button wire:click="storeAsisten" class="btn btn-primary">Actualizar</button>
                    @else
                        <button wire:click="storeAsisten" class="btn btn-primary">Guardar</button>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endif
