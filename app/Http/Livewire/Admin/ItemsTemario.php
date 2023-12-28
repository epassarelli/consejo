<?php

namespace App\Http\Livewire\Admin;

use App\Models\ItemsTemario as ModelItemsTemario;
use App\Models\Facultad as ModelsFacultad;
use App\Models\Comision as ModelsComision;
// use App\Models\Comision;
use Livewire\Component;
// use Illuminate\Support\Facades\Auth;


class ItemsTemario extends Component
{
    private $facultades;
    private $comisiones;

    public $item_id;
    public $facultad_id;
    public $comision_id;
    public $tipo;
    public $numero;
    public $resolucion;
    public $resumen;
    public $showModal = 'none';
    public $showActionModal = false;
    public $loading = false;

    protected $items;
    protected $listeners = ['delete', 'update'];


    public function render()
    {
        $itemsController = new ModelItemsTemario();
        $this->items = $itemsController->join('facultades', 'items_temario.facultad_id', '=' , 'facultades.id')
                                        ->join('comisiones', 'items_temario.comision_id', '=', 'comisiones.id')
                                        ->join('temas', 'items_temario.id_tema', '=', 'temas.id')
            ->select('items_temario.*', 'facultades.name as facultad', 'comisiones.name as comision', 'temas.titulo as tema')
            ->get();

        $this->facultades = ModelsFacultad::all();
        $this->comisiones = ModelsComision::all();

        return view('livewire.admin.items-temario', [
                'items' => $this->items,
                'facultades' => $this->facultades,
                'comisiones' => $this->comisiones
            ])->layout('layouts.adminlte');
    }



    public function createItem()
    {
        $this->loading = true;

        try {

            $params = $this->validate([
                'numero' => 'required',
                'resolucion' => 'required',
                'resumen' => 'required',
                'comision_id' => 'required',
                'facultad_id' => 'required',
            ], [
                'numero.required' => 'El campo Número es obligatorio.',
                'resolucion.required' => 'El campo resolución es obligatorio.',
                'resumen.required' => 'El campo resumen es obligatorio.',
                'comision_id.required' => 'El campo comisión es obligatorio.',
                'facultad_id.required' => 'El campo facultad es obligatorio.',
            ]);



            ModelItemsTemario::create([
                'id_tema' => 1,
                'numero' => $params["numero"],
                'comision_id' => $params["comision_id"],
                'facultad_id' => $params["facultad_id"],
                'resolucion' => $params["resolucion"],
                'resumen' => $params["resumen"]
            ]);


            $this->reset(['numero']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El Item se agregó correctamente']);

        }catch (\Illuminate\Validation\ValidationException $e){
            $errors = $e->validator->getMessageBag();
            $this->emit('errorTitulo', ['errores' => $errors]);
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }


    }



    public function openEditModal($id){
        $this->item_id = $id;
        $ItemToUpdate = ModelItemsTemario::find($id);
        // Verifica si el tema existe antes de asignar el título
        if (!empty($ItemToUpdate)) {
            $this->facultad_id = $ItemToUpdate->facultad_id;
            $this->numero = $ItemToUpdate->numero;
        }
        $this->openModal();
    }

    public function openModal()
    {
        $this->showActionModal = true;
    }

    public function closeModal()
    {
        $this->item_id = 0;
        $this->showActionModal = false;
        $this->loading = false;
    }

    public function storeItem()
    {
        $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item: ' . $this->item_id]);
        $this->closeModal();
        $this->resetInputFields();
    }

    public function updateItem()
    {
        $this->emit('mensajeNegativo', ['mensaje' => 'Actualizar: ' . $this->item_id]);
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        try {
            $itemToDelete = ModelItemsTemario::find($id);

            // Verifica si el tema existe antes de intentar eliminarlo
            if (!empty($itemToDelete)) {
                $itemToDelete->delete();
            }

            $this->emit('mensajePositivo', ['mensaje' => 'El item se eliminó correctamente']);
        }
        catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al eliminar el item: ' . $e->getMessage()]);
        }
    }

    private function resetInputFields()
    {
        $this->item_id = 0;
        $this->facultad_id = '';
        $this->comision_id = '';
        $this->tipo = '';
        $this->numero = '';
        $this->resolucion = '';
        $this->resumen = '';
    }
}
