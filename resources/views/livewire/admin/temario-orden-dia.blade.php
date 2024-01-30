<div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Orden del Día - Temario</h3>
            </div>

            <div class="col-md-4 text-right">
                <button class="btn btn-success" wire:click="openModal"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar</button>
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
                            @foreach ($temarios as $temario)
                                <tr>
                                    <td class="text-center">{{$temario->tema}}</td>
                                    <td class="text-center">{{$temario->orden}}</td>
                                    <td class="text-center">{{$temario->items}}</td>
                                    <td class="text-center">{{$temario->web}}</td>
                                    <td class="p-1 text-center">
                                        <button wire:click="items({{$temario->id}})" class="btn btn-sm btn-info" title="items"><i class="fas fa-file-alt""></i></button>
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
                                            <select class="form-control" name="tema" id="id_tema" wire:model="id_tema" @if($readonly) disabled @endif>
                                                <option value="">Seleccionar...</option>
                                                @foreach ($temas as $tema)
                                                    <option value={{$tema->id}}>{{$tema->titulo}}</option>
                                                @endforeach
                                            </select>
                                            @error('comision_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-4 input-group-prepend">
                                            <label class="input-group-text">Orden</label>
                                            <input type="text" class="form-control" name="orden" id="orden" wire:model="orden" @if($readonly) disabled @endif>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="col-8 input-group-prepend">
                                            <label class="input-group-text">Web</label>
                                            <input type="checkbox" class="form-check-input" name="web" id="web" wire:model="web" style="margin-left:200px" readonly checked='true'>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" wire:click="closeModal" class="btn btn-secondary"
                                    data-dismiss="modal">Cerrar</button>
                                    @if (!$readonly)
                                    <button wire:click="storeItemTemario" class="btn btn-primary">Guardar</button>
                                    {{--@if ($tema_id)
                                            <button wire:click="updateItem" class="btn btn-primary">Actualizar</button>
                                        @else
                                            <button wire:click="storeItem" class="btn btn-primary">Guardar</button>
                                        @endif --}}
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
