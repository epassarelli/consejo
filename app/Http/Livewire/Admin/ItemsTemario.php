<?php

namespace App\Http\Livewire\Admin;

use App\Models\ItemsTemario as ModelItemsTemario;
use App\Models\Facultad as ModelsFacultad;
use App\Models\Comision as ModelsComision;
use Livewire\Component;
use Illuminate\Http\Request;

class ItemsTemario extends Component
{
    public $id_temario=100;
    protected $facultades;
    protected $comisiones;
    protected $items;
    public $id_tema;
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
    public $readonly = false;

    protected $listeners = ['delete', 'update'];

    public $errors = [];

    public function getParams($id)
    {
        // Acceder al valor del parámetro "id" desde la URL
        $this->id_temario = $id;

        // También puedes acceder a otros parámetros de la solicitud si es necesario
      //  $valorQuery = $request->query('nombre_del_parametro_query', 'valor_predeterminado');
      //  echo "El valor del parámetro de la consulta es: " . $valorQuery;

        // Resto de la lógica del controlador...
    }

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
                'comisiones' => $this->comisiones,
            ])->layout('layouts.adminlte');
    }

    public function storeItem()
    {
        $this->loading = true;
        try {

            $params = $this->validate([
                    'numero' => 'required|string',
                    'resolucion' => 'required',
                    'resumen' => 'required',
                    'comision_id' => 'required',
                    'facultad_id' => 'required',
                    'tipo' => 'required',
                ]
                , [
                    'numero.required' => 'El campo Número es obligatorio.',
                    'resolucion.required' => 'El campo resolución es obligatorio.',
                    'resumen.required' => 'El campo resumen es obligatorio.',
                    'comision_id.required' => 'El campo comisión es obligatorio.',
                    'facultad_id.required' => 'El campo facultad es obligatorio.',
                    'tipo.required' => 'El campo tipo es obligatorio.',
                ]
            );



            ModelItemsTemario::create([
                'id_tema' => 1,
                'numero' => $params["numero"],
                'comision_id' => $params["comision_id"],
                'facultad_id' => $params["facultad_id"],
                'resolucion' => $params["resolucion"],
                'resumen' => $params["resumen"],
                'tipo' => $params["tipo"]
            ]);

            $this->reset(['numero']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El Item se agregó correctamente']);

        }catch (\Illuminate\Validation\ValidationException $e){

           $errors = $e->validator->getMessageBag();
           $this->emit('errores', ['errors' => $errors]);

    //       $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item 2: ' . $errors]);
        } catch (\Exception $e) {
            // Manejar otros errores
           // $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item1: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }

    }


    public function updateItem()
    {
        $this->loading = true;


        try {

            $params = $this->validate([
                'numero' => 'required',
    //            'resolucion' => 'required',
    //            'resumen' => 'required',
    //            'comision_id' => 'required',
    //            'facultad_id' => 'required',
    //            'tipo' => 'required',
            ], [
                'numero.required' => 'El campo Número es obligatorio.',
    //            'resolucion.required' => 'El campo resolución es obligatorio.',
    //            'resumen.required' => 'El campo resumen es obligatorio.',
    //            'comision_id.required' => 'El campo comisión es obligatorio.',
    //            'facultad_id.required' => 'El campo facultad es obligatorio.',
    //            'tipo.required' => 'El campo tipo es obligatorio.',
            ]);

            $ItemToUpdate = ModelItemsTemario::find($this->item_id);

            if(!empty($ItemToUpdate)){
                $ItemToUpdate->id_tema =  1;
                $ItemToUpdate->numero = $params["numero"];
                $ItemToUpdate->comision_id = $params["comision_id"];
                $ItemToUpdate->facultad_id = $params["facultad_id"];
                $ItemToUpdate->resolucion = $params["resolucion"];
                $ItemToUpdate->resumen = $params["resumen"];
                $ItemToUpdate->tipo = $params["tipo"];
                $ItemToUpdate->save();
            }

            $this->reset(['numero', 'id_tema', 'comision_id', 'facultad_id', 'facultad_id', 'resolucion', 'resumen', 'tipo']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El item se modificó correctamente']);

        }catch (\Illuminate\Validation\ValidationException $e){
          //  $errors = $e->validator->getMessageBag();
            $this->emit('errores', ['errores' => $errors]);
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item2: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }
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


    public function openEditModal($id, $readonly){
        $this->readonly = $readonly;
        $this->item_id = $id;
        $ItemToUpdate = ModelItemsTemario::find($id);

        if($id===0){
            $this->readonly = true;
        }

        if (!empty($ItemToUpdate)) {
            $this->facultad_id = $ItemToUpdate->facultad_id;
            $this->numero = $ItemToUpdate->numero;
            $this->resolucion = $ItemToUpdate->resolucion;
            $this->tipo = $ItemToUpdate->tipo;
            $this->resumen = $ItemToUpdate->resumen;
            $this->comision_id = $ItemToUpdate->comision_id;
        }

        $this->openModal();
    }


    public function openModal()
    {
        $this->showActionModal = true;
    }

    public function closeModal()
    {
        $this->resetInputFields();
        $this->showActionModal = false;
        $this->readonly = false;
        $this->loading = false;
    }


    private function resetInputFields()
    {
        $this->item_id = '';
        $this->facultad_id = '';
        $this->comision_id = '';
        $this->tipo = '';
        $this->numero = '';
        $this->resolucion = '';
        $this->resumen = '';
    }
}
