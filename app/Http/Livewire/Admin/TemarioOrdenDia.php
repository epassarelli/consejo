<?php

namespace App\Http\Livewire\Admin;

use App\Models\TemarioOrdenDia as modelTemarioOrdenDia;
use App\Models\Tema as ModelTemas;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TemarioOrdenDia extends Component
{

    public $temarios;
    public $loading = false;
    public $showActionModal = false;
    public $readonly = false;
    public $id_tema;
    public $orden;
    public $web = 0;

    public function openModal()
    {
        $this->showActionModal = true;
    }

    public function closeModal()
    {
        $this->showActionModal = false;
        $this->loading = false;
    }


    public function render()
    {
        $temariosController = new modelTemarioOrdenDia();
        $this->temarios = $temariosController
                            ->leftjoin('temas', 'temarios_ordenes_dia.id_tema', '=', 'temas.id')
                            ->leftjoin('items_temario', 'temarios_ordenes_dia.id', '=', 'items_temario.id_tema')
                            ->select('temarios_ordenes_dia.*', DB::raw('COALESCE(COUNT(items_temario.id_tema), 0) AS items'), 'temas.titulo as tema') // ', 'temas.titulo'
                            ->groupBy('temarios_ordenes_dia.id')
                            ->get();

        $this->temas = modelTemas::all();
        return view('livewire.admin.temario-orden-dia', ['temarios' => $this->temarios, 'temas' => $this->temas])->layout('layouts.adminlte');
    }

    public function storeItemTemario()
    {
        $this->loading = true;

        try {

            $params = $this->validate([
                    'id_tema' => 'required',
                    'orden' => 'required'
                ]
                , [
                    'id_tema.required' => 'El campo Tema es obligatorio.',
                    'orden.required' => "el orden es obligatorio"
                ]
            );

            modelTemarioOrdenDia::create([
                'id_orden_dia' => 5,
                'orden' => $params["orden"],
                'web' => $this->web,
                'id_tema' => $params["id_tema"],
            ]);

            $this->reset(['id_tema']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El Item se agregó correctamente']);

        }catch (\Illuminate\Validation\ValidationException $e){

           $errors = $e->validator->getMessageBag();
           $this->emit('errores', ['errors' => $errors]);

    //       $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item 2: ' . $errors]);
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item1: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }


    }


    public function items($id){
        return redirect()->route('items', ['id' => $id]);
    }


}








/*

    public $id_orden;
    public $showAddTemarioModal = false;
    protected $listeners = ['openAddTemarioModal'];
    public $temas;
    public $loading = false;
    public $ultimo_orden;

public function render()
    {

        $this->temas = Temas::all();
        $this->ultimo_orden = TemarioOrdenDia

        return view('livewire.admin.temario-orden-dia', ['temas' => $this->temas]);
    }


    public function openAddTemarioModal($id_orden){
        $this->id_orden = $id_orden;
        $this->showAddTemarioModal = true;
    }

    public function addTemario(){
        $this->loading = true;
        try {
            $params = $this->validate([
                'titulo' => 'required|string|unique:temas,titulo',
            ], [
                'titulo.required' => 'El campo título es obligatorio.',
                'titulo.string' => 'El campo título debe ser una cadena de texto.',
                'titulo.unique' => 'El campo título no debe repetirse.',

            ]);

            ModelsTemarioOrdenDia::create([
                'titulo' => $params["titulo"],
            ]);

            $this->reset(['titulo']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El tema se agregó correctamente']);
        }
        catch (\Illuminate\Validation\ValidationException $e) {
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
*/
