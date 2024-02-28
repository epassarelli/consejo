<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Asistentes</h3>
            </div>

            <div class="col-md-4 text-right">
                <button class="btn btn-secondary" wire:click="volver" data-target="#itemModal"><i class="fas fa-arrow-circle-left  mr-2" style="color: white;"></i>Volver</button>
                @if($sesion->ordenDia->id_estado == 4 && $esAdmin)
                <button class="btn btn-warning" wire:click="openOrder(1)" data-target="#itemModal"><i class="fas fa-flag-checkered  mr-2"></i>Iniciar Orden del Día</button>
                @endif
                @if($sesion->ordenDia->id_estado == 6)
                <button class="btn btn-warning" wire:click="openOrder(0)" data-target="#itemModal"><i class="fas fa-arrow-circle-right mr-2"></i>Orden del Día</button>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12" wire:poll>
                <table id="basic-table" class="table table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Cargo</th>
                            <th class="text-center">Vota</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asistentes as $asistente)
                        <tr>
                            <td>{{ $asistente->name }}</td>
                            <td>{{ ($asistente->cargo) ? $asistente->cargo->nombre : "-"}}</td>
                            <td><input type="checkbox" wire:click="toggleVoteEnable({{ $asistente->id }})" {{ $asistente->pivot->votante ? 'checked' : '' }} {{$esAdmin ? '' : 'disabled'}} /></td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>