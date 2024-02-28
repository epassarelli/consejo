<div>
    @csrf
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Items</h3>
            </div>

            <div class="col-md-4 text-right">
                <button class="btn btn-secondary" wire:click="volver" data-target="#itemModal"><i class="fas fa-arrow-circle-left  mr-2" style="color: white;"></i>Volver</button>
                @if($esAdmin && in_array($sesion->estado, [1,4]))
                <button class="btn btn-success" wire:click="openModal" data-target="#itemModal"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar</button>
                @endif
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
                                <!-- <th class="text-center">ADJ</th> -->
                                <th style="width: 15%" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)

                            <tr>
                                <td>{{$item->tema}}</td>
                                <td class="">{{$item->comision}}</td>
                                <td class="">{{$item->facultad}}</td>
                                <td class="text-center">{{$item->numero}}</td>
                                <td class="text-center">{{$item->resolucion}}</td>
                                <!--<td></td> -->
                                <td class="p-1 text-center">
                                    <button wire:click="openEditModal({{ $item->id }}, true)" class="btn btn-sm btn-secondary" title="Ver"><i class="fa fa-eye"></i></button>
                                    @if($esAdmin && in_array($sesion->estado, [1,4]))
                                    <button wire:click="openEditModal({{ $item->id }}, false)" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-edit"></i></button>
                                    <button wire:click="$emit('alertDelete',{{ $item->id }})" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                                    @endif
                                    <button wire:click="openAttachModal({{ $item->id }})"  class="btn btn-sm btn-primary" title="atach"><i class="fa fa-file-pdf"></i></button>
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
                        @if ($item_id)
                        @if($readonly)
                        <h5 class="modal-title" id="itemModalLabel">Orden del Dia</h5>
                        @else
                        <h5 class="modal-title" id="itemModalLabel">Editar Orden del Dia - editar renglón</h5>
                        @endif
                        @else
                        <h5 class="modal-title" id="itemModalLabel">Crear Orden del Dia - agregar renglón</h5>
                        @endif


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
                                            <select class="form-control" name="comision" id="comision" wire:model="comision_id" @if($readonly) disabled @endif>
                                                <option value="">Seleccionar...</option>
                                                @foreach ($comisiones as $comision)
                                                <option value={{$comision->id}}>{{$comision->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('comision_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6 input-group-prepend">
                                            <label class="input-group-text">Facultad</label>
                                            <select class="form-control" name="facultad" id="facultad" wire:model="facultad_id" @if($readonly) disabled @endif>
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
                                        <div class="col-3 input-group-prepend">
                                            <label class="input-group-text">Tipo</label>
                                            <select class="form-control" name="tipo" id="tipo" wire:model="tipo" @if($readonly) disabled @endif>
                                                <option value="">Seleccionar...</option>
                                                <option value="EXPEDIENTE">Expediente</option>
                                                <option value="NOTA">Nota</option>
                                            </select>
                                        </div>

                                        <div class="col-5 input-group-prepend">
                                            <label class="input-group-text">Número</label>
                                            <input type="text" class="form-control" name="numero" id="numero" wire:model="numero" @if($readonly) disabled @endif>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-4 input-group-prepend">
                                            <label class="input-group-text">Resolución</label>
                                            <input type="text" class="form-control" name="resolucion" id="resolucion" wire:model="resolucion" @if($readonly) disabled @endif>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="col-12 input-group-prepend">
                                            <label class="input-group-text">Resumen</label>
                                            <textarea class="form-control" name="resumen" id="resumen" cols="30" rows="3" wire:model="resumen" @if($readonly) disabled @endif></textarea>

                                            @error('resumen')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        @if (!$readonly)
                        @if ($item_id)
                        <button wire:click="updateItem" class="btn btn-primary">Actualizar</button>
                        @else
                        <button wire:click="storeItem" class="btn btn-primary">Guardar</button>
                        @endif
                        @endif
                    </div>
                </div>

            @endif

            <!-- Modal -->
            @if($showAttachModal)

            <div wire:ignore.self class="modal fade show" id="itemModal2" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true" style="display: {{ $showAttachModal ? 'block':''}}">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="well">Documentos adjuntos</h3>
                            <button type="button" class="close" wire:click="closeAttachModal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                                <table id="basic-table" class="table table-hover table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Archivo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($archivos as $arch)
                                            <tr>
                                                <td>{{$arch->title }}</td>
                                                <td>
                                                    <a href="{{ 'descargar-pdf?path='.$arch->path }}" download>{{$arch->name }}</a></td>
                                                <td class="text-center">
                                                    <button wire:click="deleteAdj({{ $arch->id }})" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>

                            <p class="fs-6"><strong>total:</strong>{{ count($archivos) }} archivos adjuntos</p>

                            <div class="border p-2 rounded-2">

                                <div class="row">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="col-12 input-group-prepend">
                                            <label class="input-group-text">Título</label>
                                            <input type="text" class="form-control" wire:model="titulo" @if($readonly) disabled @endif>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="input-group mb-2 mr-sm-2"  >
                                        <div class="col-12 input-group-prepend">
                                            <input class="form-control" type="file" wire:model="archivo" accept="application/pdf">
                                            <button type="button" wire:click="guardarArchivos" class="btn btn-sm btn-primary" accept="application/pdf" wire:loading.attr="disabled"><i class="fas fa-upload" ></i></button>
                                        </div>
                                            <div wire:loading wire:target="archivo">Subiendo...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
    </div>


</div>


