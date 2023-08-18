<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Evento;
use App\Models\Tipoblog;
use Illuminate\Support\Facades\Session;

class Eventos extends Component
{
    public $evento;
    public $evento_id;
    public $titulo,$descripcion,$lugar,$fecha,$link_mapa,$estado;
    public $muestraModal = 'none';
    public $muestraModalAsisten = 'none';

    protected $eventos;
    protected $listeners = ['delete'];

    public function render()
    {
        $this->eventos = Evento::paginate(10);
        return view('livewire.admin.eventos', ['eventos' => $this->eventos])->layout('layouts.adminlte');
    }


    protected function rules()
    {
        return [
            'titulo'      => 'required',
            'descripcion' => 'required',
            'lugar'       => 'required',
            'fecha'       => 'required',
            'link_mapa'   => 'url',
        ];
    }

    protected function messages()
    {
        return [
            'titulo.required'      => 'El titulo del evento  es requerido',
            'descripcion.required' => 'La descripcion del evento es requerido',
            'lugar.required'       => 'El lugar del evento es requerido',
            'link_mapa.url'        => 'El link no es un formato url.'
        ];
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {

        $evento = Evento::findOrFail($id);
        $this->evento_id   = $id;
        $this->titulo      = $evento->titulo;
        $this->descripcion = $evento->descripcion;
        $this->lugar       = $evento->lugar;
        $this->fecha       = $evento->fecha;
        $this->link_mapa   = $evento->link_mapa;
        $this->estado      = $evento->estado;
        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        Evento::updateOrCreate(
            ['id' => $this->evento_id],
            [
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'lugar' => $this->lugar,
                'fecha' =>  $this->fecha,
                'link_mapa' =>  $this->link_mapa,
                'estado' => $this->estado,
            ]
        );

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function delete($id)
    {
        evento::find($id)->delete();

    }

    public function closeModal()
    {
        // $this->isOpen = false;
        $this->muestraModal = 'none';
    }

    public function openModal()
    {
        // $this->isOpen = true;
        $this->muestraModal = 'block';
    }

    private function resetInputFields()
    {

        $this->evento_id = 0;
        $this->titulo='';
        $this->descripcion='';
        $this->lugar='';
        $this->fecha=null;
        $this->link_mapa='';
        $this->estado=0;

    }


    //****** metodos asistentes ********/
    public function closeModalAsisten()
    {
        // $this->isOpen = false;
        $this->muestraModalAsisten = 'none';
    }

    public function openModalAsisten()
    {
        // $this->isOpen = true;
        $this->muestraModalAsisten = 'block';
    }

    public function Asisten()
    {
        $this->eventos = Evento::paginate(10);
        return view('livewire.admin.eventos', ['eventos' => $this->eventos])->layout('layouts.adminlte');
    }

}

