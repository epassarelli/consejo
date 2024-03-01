<div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Items</h3>
            </div>
            <div class="col-md-4 text-right">
                <button class="btn btn-secondary" wire:click="volver" data-target="#itemModal"><i class="fas fa-arrow-circle-left  mr-2" style="color: white;"></i>Volver</button>
                @if($esAdmin && in_array($sesion->estado, [1,4]))
                <button class="btn btn-success" wire:click="openModal" data-target="#itemModal"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar Item</button>
                <button class="btn btn-warning" wire:click="createVotacion" data-target="#itemModalVotacion"><i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar Votación</button>
                @endif
            </div>
            @if($sesion->ordenDia->id_estado == 6)<div wire:poll></div>@endif

        </div>
        <div class="row">
            @if(!empty($votacionId))

            <div class="card card-primary mt-2">
                <div class="mt-1">
                    @if(!empty($votacionActiva) && $votacionActiva->id == $votacionId && $votacionEstado == 3)
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon {{(!empty($votacionActiva->resultado) ? 'bg-success' : ($votacionActiva->resultado === null ? 'bg-secondary' : 'bg-danger'))}}">
                            {{(!empty($votacionActiva->resultado) ? 'Aprobado' : ($votacionActiva->resultado === null ? 'Indefinido' : 'Rechazado'))}}
                        </div>
                    </div>
                    @endif
                    <div class="col-md-12 input-group">
                        <div class="col-4 input-group-prepend">
                            <label class="input-group-text">Votación</label>
                            <input type="text" class="form-control" name="VotTitulo" wire:model="votacionTitulo" @if(!$esAdmin || $votacionEstado!=1) disabled @endif>
                        </div>
                        <div class="col-3 input-group-prepend">
                            <label class="input-group-text">Aprobación</label>
                            <select class="form-control" name="comision" id="comision" wire:model="votacionAceptacion" @if(!$esAdmin || $votacionEstado!=1) disabled @endif>
                                <option value="mayoria">Mayoria Simple > 50%</option>
                                <option value="mayoria2/3">2/3 Sesionando</option>
                                <option value="absoluto">Mayoria</option>
                            </select>
                        </div>
                        @if($esAdmin)
                        <div class="col-5 text-right">
                            @if((empty($votacionActiva) || $votacionActiva->id != $votacionId) && $votacionEstado != 3 )
                            <button type="button" wire:click="removeVotacion({{$votacionId}})" class="btn btn-danger">Eliminar</button>&nbsp;
                            <button wire:click="updateVotacion" class="btn btn-primary">Actualizar</button>&nbsp;
                            @endif
                            @if(!empty($votacionActiva) && $votacionActiva->id == $votacionId && $votacionEstado == 2)
                            <button wire:click="enableVotacion({{$votacionId}},3)" class="btn btn-secondary">Cerrar Votación</button>&nbsp;
                            <button wire:click="enableVotacion({{$votacionId}},1)" class="btn btn-warning">Pausar Votación</button>
                            @elseif((empty($votacionActiva) || $votacionActiva->estado != 2) && $sesion->ordenDia->votacionesActivas()->count() == 0)
                            <button wire:click="enableVotacion({{$votacionId}},2)" class="btn btn-warning">Habilitar Votación</button>
                            @endif
                        </div>
                        @endif

                    </div>
                </div>
                @if(!empty($votacionActiva) && $votacionActiva->id == $votacionId && in_array($votacionActiva->estado, [2,3]))
                <div class="row mt-3">
                    <div class="col-lg-2 col-4">    
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$votacionActiva->votaron_afirmativo_count}}</h3>
                                <p>Afirmativos</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$votacionActiva->votaron_negativo_count}}</h3>
                                <p>Negativos</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-thumbs-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$votacionActiva->votaron_abstenerse_count}}</h3>
                                <p>Abstienen</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-yin-yang"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$votacionActiva->participantes_count}}</h3>
                                <p>Votaron</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-stamp"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="small-box bg-secundary">
                            <div class="inner">
                                <h3>{{$sesion->votantes->count() - $votacionActiva->participantes_count}}</h3>
                                <p>Faltan</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                        </div>
                    </div>
                    @if(!empty($votacionActiva) && $votacionActiva->estado == 2 && $sesion->votantes()->where("users.id", Auth::user()->id)->exists())
                    <div class="col-lg-2 col-6">
                        <div class="small-box bg-secundary">
                            <div class="inner">
                                <p>Voto</p>
                                @if(!$votacionActiva->participantes()->where("users.id", Auth::user()->id)->exists())
                                <button wire:click="setVoto(true)" class="btn btn-success" title="Afirmativo"><i class="fa fa-thumbs-up"></i></button>&nbsp;
                                <button wire:click="setVoto(false)" class="btn btn-danger" title="Negativo"><i class="fa fa-thumbs-down"></i></button>
                                <button wire:click="setVoto(null)" class="btn btn-info" title="Absenerse"><i class="fa fa-yin-yang"></i></button>
                                @else
                                <button wire:click="removeVoto({{$votacionId}})" class="btn btn-warning">Borrar Voto</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endif
            @endif
            @if(in_array($sesion->estado, [1,4]))
            <div class="mt-2 col-md-12 text-left btn-group btn-group-toggle" style="overflow-x: auto">
                @foreach ($votaciones as $votacion)
                <label 
                class="btn {{($votacion->estado == 2 ? 'bg-info' : ($votacion->estado == 3 ? (!empty($votacion->resultado) ? 'bg-success' : ($votacion->resultado === null ? 'bg-secondary' : 'bg-danger')) : 'bg-warning'))}} {{ $esAdmin ? ($votacionId == $votacion->id ? 'active':'') : ($votacion->estado == 2 ? 'active' : '')}}"
                style="text-decoration: {{$votacion->estado == 3 && $votacion->resultado == null && !$votacion->participantes()->where('users.id', Auth::user()->id)->exists() ? 'line-through' : 'none'}}"
                ><input type="radio" name="votacion" id="voto_{{$votacion->id}}" autocomplete="off" wire:click="activeVotacion({{$votacion->id}})" @if(!$esAdmin) disabled @endif  /> {{$votacion->titulo}}</label>
                @endforeach
            </div>
            @endif
            <div class="row w-100 mt-3">
                <div class="col-12">
                    <table  class="table table-hover table-bordered mt-3">
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
                                <td class="{{($itemEnVotacionActiva = (!empty($votacionId) && $item->id_votacion == $votacionId)) ? 'bg-warning' : ''}}">{{$item->tema->titulo}}</td>
                                <td class="{{$itemEnVotacionActiva ? 'bg-warning' : ''}}">{{$item->comision->name}}</td>
                                <td class="{{$itemEnVotacionActiva ? 'bg-warning' : ''}}">{{$item->facultad->name}}</td>
                                <td class="{{$itemEnVotacionActiva ? 'bg-warning' : ''}} text-center">{{$item->numero}}</td>
                                <td class="{{$itemEnVotacionActiva ? 'bg-warning' : ''}} text-center">{{$item->resolucion}}</td>
                                <td class="{{$itemEnVotacionActiva ? 'bg-warning' : ''}}"></td>
                                <td class="{{$itemEnVotacionActiva ? 'bg-warning' : ''}} p-1 text-center">
                                    <button wire:click="openEditModal({{ $item->id }}, true)" class="btn btn-sm btn-secondary" title="Ver"><i class="fa fa-eye"></i></button>
                                    @if($esAdmin && in_array($sesion->estado, [1,4]))
                                    <button wire:click="openEditModal({{ $item->id }}, false)" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-edit"></i></button>
                                    <button wire:click="$emit('alertDelete',{{ $item->id }})" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                                    @endif
                                    @if($esAdmin &&
                                    in_array($sesion->estado, [1,4]) &&
                                    $votacionEstado != 3 && # si esta cerrado no se puede asignar votacion
                                    !empty($votacionId) &&
                                    (empty($votacionActiva) || $votacionActiva->id != $votacionId )
                                    )
                                    @if(empty($item->id_votacion))
                                    <button wire:click="addVotacion({{ $item->id }}, {{$votacionId}}, true)" class="btn btn-sm btn-warning" title="Agregar" @if($item->id_votacion) disabled @endif><i class="fa fa-plus"></i></button>
                                    @elseif($item->id_votacion == $votacionId)
                                    <button wire:click="addVotacion({{ $item->id }}, {{$votacionId}}, false)" class="btn btn-sm bg-white" title="Quitar"><i class="fa fa-minus"></i></button>
                                    @endif

                                    @endif
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
                                                <option value="{{$comision->id}}">{{$comision->name}}</option>
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
            </div>
        </div>
        @endif

    </div>
</div>