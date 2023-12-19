<div>
 <!-- Modal Agregar Temario -->
 @if($showAddTemarioModal)
    <div wire:ignore.self class="modal fade show" id="agregarTemaOrdenDiaModal" tabindex="-1" role="dialog" aria-labelledby="agregarTemaOrdenDiaModalLabel" aria-hidden="true" style="display: {{ $showActionModal ? 'block':''}}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <h5 class="modal-title" id="ordenModalLabel">Agregar Tema</h5>
                        </div>
                        <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido del modal -->
                        <div style="height: 91px;">
                            <!-- Loader -->
                            <div class="d-flex justify-content-center h-200">
                                <div wire:loading wire:target="addTemario" class=" w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center">
                                    <svg class="animate-spin spinner-grow h-3 w-3 text-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"></circle>
                                        <path class="opacity-75" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014.009 18H2v-2h2.009a7.965 7.965 0 014.173-1.138l1.08 1.080zm8.142 1.088l1.083-1.083a7.965 7.965 0 011.138-4.173H22V6h-2.009a7.962 7.962 0 01-1.138 4.009l-1.083 1.083zM12 20c-4.418 0-8-3.582-8-8h2c0 3.314 2.686 6 6 6s6-2.686 6-6h2c0 4.418-3.582 8-8 8z"></path>
                                    </svg>
                                </div>

                                @if (!$loading)
                                <div class="input-group mb-2 mr-sm-2" wire:loading.class="d-none fade">
                                    <div class="col-12 form-group">
                                        <label class="input-group-text" for="id_tema">Seleccionar tema cabecera</label>
                                        <select  class="form-select" name="id_tema" id="id_tema">
                                            <option value="" selected disabled>Tema</option>
                                            @foreach($temas as $tema)
                                                <option value="{{$tema->id}}">{{$tema->titulo}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="orden"> Orden</label>
                                        <input type="number" value="" name="orden" id="orden">
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="web">
                                        <label class="form-check-label" for="web">Web</label>
                                    </div>

                                    <div class="col-12">
                                        @if(!empty($errorTitulo))
                                        <div class="text-danger">
                                            
                                                @foreach($errorTitulo as $error)
                                                <p>{{ $error }}</p>
                                                @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>

                            

                        </div>
                        <!-- Contenido del modal -->
                        <div class="d-flex justify-content-end">
                            <button type="button" wire:click="addTemario" wire:loading.attr="disabled" class="btn btn-primary">Agregar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
