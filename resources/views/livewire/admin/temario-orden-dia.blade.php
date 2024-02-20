<div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Orden del Día - {{date("d/m/Y", strtotime($sesion->fecha))}}</h3>
            </div>

            <div class="col-md-4 text-right">
                <button class="btn btn-secondary" wire:click="volver" data-target="#itemModal"><i class="fas fa-arrow-circle-left  mr-2" style="color: white;"></i>Volver</button>
                @if($esAdmin && in_array($sesion->estado, [1,4]))
                <button class="btn btn-success" wire:click="openModal"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar</button>
                @endif
            </div>

            <div class="row w-100 mt-3">
                <div class="col-12">
                    <table id="basic-table" class="table table-hover table-bordered mt-3">
                        <thead>
                            <tr>
                                <th class="text-center">TEMAS</th>
                                <th class="text-center">ORDEN</th>
                                <th class="text-center">ITEMS</th>
                                <th class="text-center">WEB</th>
                                <th style="width: 15%" class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sesion->temariosOrdenDia as $temario)
                            <tr>
                                <td class="">{{$temario->tema->titulo}}</td>
                                <td class="text-center">{{$temario->orden}}</td>
                                <td class="text-center">{{$temario->tema->items->count()}}</td>
                                <td class="text-center">{{$temario->web}}</td>
                                <td class="p-1 text-center">
                                    <button wire:click="items({{$temario->id}}, {{$temario->id_tema}})" class="btn btn-sm btn-info" title="items"><i class="fas fa-file-alt"></i></button>
                                    <button wire:click="openEditModal({{$temario->id}}, true)" class="btn btn-sm btn-secondary" title="Ver"><i class="fa fa-eye"></i></button>
                                    @if($esAdmin && in_array($sesion->estado, [1,4]))
                                    <button wire:click="openEditModal({{$temario->id}}, false)" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-edit"></i></button>
                                    <button wire:click="$emit('alertDelete',{{ $temario->id_orden_dia }})" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Modal -->
            @if($showActionModal)
            <div wire:ignore.self class="modal fade show" id="temaModal" tabindex="-1" role="dialog" aria-labelledby="temaModalLabel" aria-hidden="true" style="display: {{ $showActionModal ? 'block':''}}">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="temaModalLabel">{{empty($id_tema) ? "Crear" : "Editar"}} Temario</h5>
                            <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="container-fluid">

                                <div class="row">

                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="col-8 input-group-prepend">
                                            <label class="input-group-text">Tema</label>
                                            <select class="form-control" name="id_tema" id="id_tema" wire:model="id_tema" @if($readonly) disabled @endif>
                                                <option value="">Seleccionar...</option>
                                                @foreach ($temas as $tema)
                                                <option value={{$tema->id}}>{{$tema->titulo}}</option>
                                                @endforeach
                                            </select>
                                            @error('id_tema')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-4 input-group-prepend">
                                            <label class="input-group-text">Orden</label>
                                            <input type="text" class="form-control" name="orden" id="orden" wire:model="orden" @if($readonly) disabled @endif>
                                            @error('orden')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="col-8 input-group-prepend">
                                            <label class="input-group-text">Web</label>
                                            <input type="checkbox" class="" name="web" id="web" wire:model="web" style="margin-left:10px" @if($readonly) disabled @endif checked="{{$web == 1 ? 'true':'false' }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                @if (!$readonly)
                                    @if ($id_temario)
                                <button wire:click="updateTemario" class="btn btn-primary">Actualizar</button>
                                    @else
                                <button wire:click="storeItemTemario" class="btn btn-primary">Guardar</button>
                                    @endif
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