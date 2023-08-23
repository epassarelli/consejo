<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Evento;
use App\Models\Evento_asisten;
use Illuminate\Support\Facades\Session;

class Eventos extends Component
{
    //* eventos *//
    public $evento;
    public $evento_id;
    public $titulo,$descripcion,$lugar,$fecha,$link_mapa,$estado,$destinatarios;
    public $muestraModal = 'none';
    protected $eventos;


    //* asistentes *//
    public $evento_asisten;
    public $evento_asisten_id=0;
    public $nombre,$email,$telefono;
    public $muestraModalAsisten = 'none';
    public $muestraModalDatosAsisten = 'none';
    protected $eventos_asisten;




    protected $listeners = ['delete'];

    public function render()
    {
        $this->eventos = Evento::paginate(10);
        if ($this->evento_id) {
            $this->eventos_asisten = Evento_asisten::where('evento_id','=',$this->evento_id)->get();
        }

        return view('livewire.admin.eventos', [
            'eventos' => $this->eventos,
            'eventos_asisten' => $this->eventos_asisten])
            ->layout('layouts.adminlte');
    }


    public function volver()
    {
        return redirect()->route('eventos');
    }

    protected function rules()
    {
        if ($this->muestraModalDatosAsisten !== 'block') {
            return [
                'titulo'      => 'required',
                'descripcion' => 'required',
                'lugar'       => 'required',
                'fecha'       => 'required',
                'link_mapa'   => 'url',
            ];
        }else{
            return [
                'nombre'      => 'required',
                'email'       => 'required | email',
            ];
        }
    }

    protected function messages()
    {
        return [
            'titulo.required'      => 'El titulo del evento  es requerido',
            'descripcion.required' => 'La descripcion del evento es requerido',
            'lugar.required'       => 'El lugar del evento es requerido',
            'link_mapa.url'        => 'El link no es un formato url.',
            'nombre.required'      => 'El nombre del asistente es requerido',
            'email.required'       => 'El email es requerido',
            'email.mail'           => 'El mail no tiene un formato valido',
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
        $this->destinatarios = $evento->destinatarios;
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
                'destinatarios' => $this->destinatarios,
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


    public function deleteAsisten($id)
    {
        Evento_asisten::find($id)->delete();

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
        $this->destinatarios;

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


    public function closeModalDatosAsisten()
    {
        // $this->isOpen = false;
        $this->muestraModalDatosAsisten = 'none';
    }


    public function openModalDatosAsisten()
    {
        // $this->isOpen = true;
        $this->muestraModalDatosAsisten = 'block';
    }


    private function resetInputFieldsDatosAsisten()
    {
        $this->evento_asisten_id=0;
        $this->nombre='';
        $this->email='';
        $this->telefono='';
    }

    public function createAsisten()
    {
        $this->resetInputFieldsDatosAsisten();
        $this->openModalDatosAsisten();
    }

    public function editAsisten($id)
    {

        $evento_asisten = Evento_asisten::findOrFail($id);
        $this->evento_asisten_id=$id;
        $this->nombre=$evento_asisten->nombre;
        $this->email=$evento_asisten->email;
        $this->telefono=$evento_asisten->telefono;
        $this->openModalDatosAsisten();
    }


    public function asistentes($evento_id)
    {
        $this->evento_id = $evento_id;
        $this->evento = Evento::where('id','=',$evento_id)->first();
        $this->eventos_asisten = Evento_asisten::where('evento_id','=',$evento_id)->get();
        $this->openModalAsisten();
    }

    public function storeAsisten()
    {
        $this->validate();

        Evento_asisten::updateOrCreate(
            [
                'id' => $this->evento_asisten_id,
            ],
            [
                'evento_id' => $this->evento_id,
                'nombre' => $this->nombre,
                'telefono' => $this->telefono,
                'email' =>  $this->email,
            ]
        );

        $this->closeModalDatosAsisten();
        $this->resetInputFieldsDatosAsisten();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }


}

