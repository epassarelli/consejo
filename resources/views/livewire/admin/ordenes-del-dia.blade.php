<div>
    <!-- Modal visualizacion OD -->
    @if($showActionModal)
    <div wire:ignore.self class="modal fade show" id="ordenModal" tabindex="-1" role="dialog" aria-labelledby="ordenModalLabel" aria-hidden="true" style="display: {{ $showActionModal ? 'block':''}}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <h5 class="modal-title" id="ordenModalLabel">Órden del día - Temario</h5>
                            <p class="mb-0"> {{$orden->estado->nombre}}</p>
                        </div>
                        <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if($orden->estado->id == 1)
                        <div class="d-flex justify-content-end">
                            <button wire:click="openTemarioModal({{ $id_sesion }})" class="btn-sm btn-success mx-2" data-toggle="modal">
                                <i class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                            </button>
                            <button wire:click="openCerrarOrdenModal({{ $id_sesion }})" class="btn-sm btn-info mx-2" data-toggle="modal">
                                Cerrar
                            </button>
                        </div>
                        @endif
                        <!-- Contenido del modal -->
                        <div class="d-flex justify-content-end">
                        @if(($orden->temarioOrdenDia)->count() > 0)
                        <table id="basic-table" class="table table-hover table-bordered mt-3">
                        <thead>
                            <tr>
                                <th class="text-center">Temas</th>
                                <th class="text-center">Orden</th>
                                <th class="text-center">Items</th>
                                <th class="text-center">Web</th>
                                <th style="width: 15%" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orden->temarioOrdenDia as $temario)
                
                            <tr>
                                <td class="text-center">{{ $temario->tema->titulo }}</td>
                                <td class="text-center">{{ $temario->orden }}</td>
                                <td class="text-center">0</td>
                                <td class="text-center"><input type="checkbox" readonly checked="{{$temario->web == 1 ? 'true':'false' }}"/></td>
                                <td class="p-1 text-center">
                                    <button  class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    @livewire('admin.temario-orden-dia')
</div>
