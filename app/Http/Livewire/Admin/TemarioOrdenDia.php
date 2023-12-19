<?php

namespace App\Http\Livewire\Admin;

use App\Models\TemarioOrdenDia as ModelsTemarioOrdenDia;
use Livewire\Component;

class TemarioOrdenDia extends Component
{

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

}
