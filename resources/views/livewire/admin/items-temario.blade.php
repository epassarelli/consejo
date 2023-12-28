<div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Items</h3>
            </div>

            <div class="col-md-4 text-right">
                <button class="btn btn-success" wire:click="openModal" data-target="#itemModal"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar</button>
            </div>

            <div class="row w-100 mt-3">
                <div class="col-12">

                    <table id="basic-table" class="table table-hover table-bordered mt-3">
                        <thead>
                            <tr>
                                <th class="text-center">TEMA</th>
                                <th class="text-center">COMISIÓN</th>
                                <th class="text-center">FACULTAD</th>
                                <th class="text-center">EXPEDIENTE</th>
                                <th class="text-center">RESOLUCIÓN</th>
                                <th class="text-center">ADJ</th>
                                <th style="width: 15%" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)

                            <tr>
                                <td>{{$item->tema}}</td>
                                <td>{{$item->comision}}</td>
                                <td>{{$item->facultad}}</td>
                                <td>{{$item->numero}}</td>
                                <td>{{$item->resolucion}}</td>
                                <td></td>
                                <td class="p-1 text-center">
                                    <button wire:click="openEditModal(0)"  class="btn btn-sm btn-secondary" title="Editar"><i class="fa fa-eye"></i></button>
                                    <button wire:click="openEditModal({{ $item->id }})"  class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-edit"></i></button>
                                    <button wire:click="$emit('alertDelete',{{ $item->id }})" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <!-- Modal -->
            @if($showActionModal)
                <div wire:ignore.self class="modal fade show" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true" style="display: {{ $showActionModal ? 'block':''}}">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="itemModalLabel">{{empty($id_item) ? "Crear" : "Editar"}} Orden del Dia - agregar renglón</h5>
                                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div style="">
                                    <!-- Loader -->
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="input-group mb-2 mr-sm-2">
                                            <div class="col-6 input-group-prepend">
                                                <label class="input-group-text">Comisión</label>
                                                <select class="form-control" name="comision" id="comision" wire:model="comision_id">
                                                    <option value="">Seleccionar...</option>
                                                    @foreach ($comisiones as $comision)
                                                        <option value={{$comision->id}}>{{$comision->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-6 input-group-prepend">
                                                <label class="input-group-text">Facultad</label>
                                                <select class="form-control" name="facultad" id="facultad" wire:model="facultad_id">
                                                    <option value="">Seleccionar...</option>
                                                    @foreach ($facultades as $facultad)
                                                        <option value={{$facultad->id}}>{{$facultad->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="col-2 input-group-prepend">

                                                    <select class="form-control" name="tipo" id="tipo" wire:model="tipo">
                                                        <option value="1">Expediente</option>
                                                        <option value="1">Nota</option>
                                                    </select>
                                                </div>

                                                <div class="col-5 input-group-prepend">
                                                    <label class="input-group-text">Número</label>
                                                    <input type="text" class="form-control" name="numero" id="numero" wire:model="numero">

                                                </div>

                                                <div class="col-5 input-group-prepend">
                                                    <label class="input-group-text">Resolución</label>
                                                    <input type="text" class="form-control" name="resolucion" id="resolucion" wire:model="resolucion">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="col-12 input-group-prepend">
                                                    <label class="input-group-text">Resumen</label>
                                                    <textarea class="form-control" name="resumen" id="resumen" cols="30" rows="3" wire:model="resumen"></textarea>
                                                /</div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" wire:click="closeModal" class="btn btn-secondary"
                                    data-dismiss="modal">Cerrar</button>
                                @if ($item_id !== 0)
                                    <button wire:click="updateItem" class="btn btn-primary">Actualizar</button>
                                @else
                                    <button wire:click="createItem" class="btn btn-primary">Guardar</button>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>
