<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3>Blogs</h3>
            </div>
            <div class="col-md-4 text-right">
                <button wire:click="create" class="btn btn-success" data-toggle="modal" data-target="#roleModal"><i
                        class="fas fa-plus-circle mr-2" style="color: white;"></i>Agregar
                    Blog</button>
            </div>
        </div>

        <!-- Roles Table -->
        {{-- <h1>Cantidad {{ $cantidad }}</h1> --}}
        <table class="table table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Subtitulo</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Modificado</th>
                    <th class="text-center">Publicado</th>
                    <th style="width: 10%" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->subtitulo }}</td>
                        <td>{{ $blog->usuario }}</td>
                        <td>{{ $blog->updated_at }}</td>
                        <td class="text-center">{{ $blog->publicado == 1 ? 'SI' : 'NO' }}</td>
                        <td class="p-1 text-center">
                            <button wire:click="edit({{ $blog->id }})" class="btn btn-sm btn-primary"
                                data-toggle="modal" data-target="#roleModal" title="Editar"><i
                                    class="fa fa-edit"></i></button>
                            <button wire:click="$emit('alertDelete',{{ $blog->id }})" class="btn btn-sm btn-danger"
                                title="Eliminar"><i class="fas fa-trash-alt" style="color: white "></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @if ($muestraModal == 'block')
        <!-- Role Form Modal -->
        <div class="modal fade show" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel"
            aria-hidden="true" style="display: {{ $muestraModal }}">
            {{-- <div class="modal" tabindex="-1" role="dialog" wire:ignore.self> --}}

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">
                            @if ($blog_id)
                                Editar Blog
                            @else
                                Crear Nuevo Blog
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <label>Tipo de Blog <span class="text-danger">*</span></label>
                        <select class="form-control" id="provincia_id" wire:model="tipoblog_id">
                            <option value="0">
                                Seleccione un Tipo
                            </option>
                            @if ($tiposblog)
                                @foreach ($tiposblog as $tipoblog)
                                    <option value="{{ $tipoblog->id }}">
                                        {{ $tipoblog->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('tipoblog_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <textarea class="form-control" wire:model="titulo"></textarea>
                            @error('titulo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="subtitulo">Subtitulo</label>
                            <input type="text" class="form-control" wire:model="subtitulo">
                            @error('subtitulo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="volanta">Volanta</label>
                            <input type="text" class="form-control" wire:model="volanta">
                            @error('volanta')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contenido">Contenido</label>
                            <textarea class="form-control" wire:model="contenido"></textarea>
                            @error('contenido')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" id="imagen" wire:model="imagen" wire:change="cambioImagen"
                                class="btn btn-warning">
                            @if ($imagen)
                                <div class="form-group">
                                    {{ $imagen }}
                                </div>
                            @endif
                            @error('imagen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            {{-- <div class="mb-3">
                                @if ($cambioImg)
                                    @if (gettype($imagen) === 'object')
                                        @if ($imagen->extension() == 'png' || $imagen->extension() == 'jpg' || $imagen->extension() == 'jpeg')
                                            <img class="h-20 w-20" src="{{ $imagen->temporaryUrl() }}">
                                        @endif
                                    @endif
                                @else
                                    @if ($accion === 'editar')
                                            <img class="h-20 w-20" src="{{ asset('storage/img/blogs/' . $imagen) }}"
                                                alt="">
                                    @endif

                                @endif
                            </div> --}}
                        </div>

                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" wire:model="link">
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="publicado">Publicado</label>
                            <select class="form-control" wire:model="publicado">
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                        </div>

                        @if ($blog_id !== 0)
                            <div class="form-group mt-5">
                                <p>Usuario utlima modificacion {{ $blog->usuario }}</p>
                                <p>Fecha {{ $blog->updated_at }}</p>
                            </div>
                        @endif



                    </div>








                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-dismiss="modal">Cerrar</button>
                        @if ($blog_id !== 0)
                            <button wire:click="store" class="btn btn-primary">Actualizar</button>
                        @else
                            <button wire:click="store" class="btn btn-primary">Guardar</button>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>
