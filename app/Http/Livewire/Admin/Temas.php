<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tema as ModelTemas;
use Livewire\Component;
use Livewire\WithPagination;


class Temas extends Component
{
    use WithPagination;

    protected $temas;
    public $id_tema;
    public $loading = false;
    public $showActionModal = false;
    public $titulo;
    protected $listeners = ['errorTitulo' => 'handleErrorTitulo', 'delete'];
    public $errorTitulo = [];

    // Campos de busqueda
    public $searchByTitle = '';
    //Campos de ordenamiento

    public $sortColumn = 'id';
    public $sortDirection = 'asc';

    protected $queryString = [
        'searchByTitle',
    ];

    private function resetInputFields()
    {
        $this->titulo = '';
    }

    public function resetSearchFields()
    {
        $this->searchByTitle = '';
    }

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function openModal()
    {
        $this->showActionModal = true;
    }

    public function closeModal()
    {
        $this->showActionModal = false;
        $this->loading = false;
    }

    public function createTema()
    {
        $this->loading = true;

        try {
            $params = $this->validate([
                'titulo' => 'required|string|unique:temas,titulo',
            ], [
                'titulo.required' => 'El campo título es obligatorio.',
                'titulo.string' => 'El campo título debe ser una cadena de texto.',
                'titulo.unique' => 'El campo título no debe repetirse.',

            ]);

            ModelTemas::create([
                'titulo' => $params["titulo"],
            ]);

            $this->reset(['titulo']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El tema se agregó correctamente']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            $this->emit('errorTitulo', ['errores' => $errors]);
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el tema: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }
    }

    public function handleErrorTitulo($errores)
    {
        $this->errorTitulo = $errores['errores']['titulo'];
    }

    public function openEditModal($id)
    {
        $this->id_tema = $id;
        $temaToUpdate = ModelTemas::find($id);

        // Verifica si el tema existe antes de asignar el título
        if (!empty($temaToUpdate)) {
            $this->titulo = $temaToUpdate->titulo;
        }

        $this->openModal();
    }

    public function openCreateModal()
    {
        $this->id_tema = 0;
        $this->resetInputFields();
        $this->openModal();
    }

    public function updateTema()
    {
        $this->loading = true;

        try {
            $params = $this->validate([
                'titulo' => 'required|string|unique:temas,titulo',
            ], [
                'titulo.required' => 'El campo título es obligatorio.',
                'titulo.string' => 'El campo título debe ser una cadena de texto.',
                'titulo.unique' => 'El campo título no debe repetirse.',

            ]);

            $temaToUpdate = ModelTemas::find($this->id_tema);

            if (!empty($temaToUpdate)) {
                $temaToUpdate->titulo =  $params["titulo"];
                $temaToUpdate->save();
            }

            $this->reset(['titulo']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El tema se modificó correctamente']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            $this->emit('errorTitulo', ['errores' => $errors]);
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al editar el tema: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }
    }

    public function delete($id)
    {
        try {
            $temaToDelete = ModelTemas::find($id);

            // Verifica si el tema existe antes de intentar eliminarlo
            if (!empty($temaToDelete)) {
                $temaToDelete->delete();
            }

            $this->emit('mensajePositivo', ['mensaje' => 'El tema se eliminó correctamente']);
        } catch (\Exception $e) {
            // Manejar otros errores
            if($e->getCode() == '23000' && $e->errorInfo[1] == 1451){
                $this->emit('mensajeNegativo', ['mensaje' => 'No es posible eliminar este tema porque está siendo utilizado por otros módulos del sistema']);
            }else{
                $this->emit('mensajeNegativo', ['mensaje' => 'Error al eliminar el tema: ' . $e->getMessage()]);
            }
        }
    }

    public function render()
    {
        $temas = ModelTemas::where('titulo', 'like', '%' . $this->searchByTitle . '%')
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(10);
        return view('livewire.admin.temas', ['temas' => $temas])
            ->layout('layouts.adminlte');
    }
}
