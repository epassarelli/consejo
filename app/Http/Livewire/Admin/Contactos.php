<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contacto;
use App\Models\Provincia;
use App\Models\Localidad;
use Illuminate\Support\Facades\Session;

class Contactos extends Component
{
    public $contacto;
    public $contacto_id;
    public $nombre,$provincia_id,$localidad_id,$mail,$telefono,$mensaje;
    public $isOpen = false;
    public $muestraModal = 'none';
    public $accion;

    protected $contactos,$provincias,$localidades;
    protected $listeners = ['delete'];

    public function render()
    {
        $this->contactos = Contacto::all();

        $this->provincias = Provincia::where('estado','=',1)->orderBy('nombre')->get();
        if ($this->provincia_id != 0) {
            $this->localidades = Localidad::where('estado', 1)->where('provincia_id', $this->provincia_id)->orderBy('nombre')->get();
        } else {
            $this->localidades = null;
        }


        return view('livewire.admin.contactos', [
            'contactos' => $this->contactos,
            'provincias' => $this->provincias,
            'localidades' => $this->localidades,
            ])->layout('layouts.adminlte');
    }


    protected function rules()
    {
            return [
                'nombre' => 'required',
                //'provincia_id' => 'required',
                // 'localidad_id' => 'required',
                'mail' => 'required | email',
                'telefono' => 'required',
            ];
    }

    protected function messages()
    {
           return [
                'nombre.required' => 'El nombre del contacto es requerido',
                //'provincia_id.required' => 'La provincia es requerida',
                // 'localidad_id.required' => 'La localidad es requerida',
                'mail.required' => 'El E-mail del contacto es requerido',
                'mail.email' => 'El E-mail no tiene formatode un e-mail',
                'telefono.required' => 'El telefono del contacto es requerido',
            ];
    }

    public function create()
    {
        $this->contacto_id = 0;
        $this->accion = 'crear';
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {

        $contacto = Contacto::findOrFail($id);
        $this->accion = 'editar';
        $this->contacto_id = $id;
        $this->provincia_id = $contacto->provincia_id;
        $this->localidad_id = $contacto->localidad_id;
        $this->mail = $contacto->mail;
        $this->telefono = $contacto->telefono;
        $this->mensaje = $contacto->mensaje;
        $this->nombre = $contacto->nombre;
        $this->openModal();
    }

    public function store()
    {
        $this->validate();


        Contacto::updateOrCreate(
            ['id' => $this->contacto_id],
            [
                'nombre' => $this->nombre,
                'provincia_id' => $this->provincia_id,
                'localidad_id' => $this->localidad_id,
                'mail' => $this->mail,
                'telefono' => $this->telefono,
                'mensaje' => $this->mensaje,
            ]
        );

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function delete($id)
    {
        Contacto::find($id)->delete();
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
        $this->nombre = '';
        $this->provincia_id = 0;
        $this->localidad_id = 0;
        $this->mail = '';
        $this->telefono = '';
        $this->mensaje = '';

    }
}
