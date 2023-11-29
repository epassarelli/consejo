<div class="container mt-4">

<div class="row">
            <div class="col-md-8">
                <h3>Temas</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i
                        class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                    Tema</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <table id="basic-table" class="table table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Título</th>
                            <th style="width: 15%" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($temas as $tema)
                            <tr>
                                <td>{{ $tema->id }}</td>
                                <td>{{ $tema->titulo }}</td>
                                <td class="p-1 text-center">
                                    <button wire:click="edit({{ $tema->id }})" class="btn btn-sm btn-primary"
                                        data-toggle="modal" data-target="#roleModal" title="Editar"><i
                                            class="fa fa-edit"></i></button>
                                    <button wire:click="$emit('alertDelete',{{ $tema->id }})"
                                        class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"
                                            style="color: white "></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
