<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sesion;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GestionSesiones extends Component
{
    public $sesion_id;
    public $fecha;
    public $urlYoutube;
    public $muestraModal = 'none';
    public $estados = ['En revisión', 'Publicada', 'Cerrada'];

    protected $sesiones;
    protected $listeners = ['delete'];

    public function render()
    {
        $this->sesiones = Sesion::all();

        return view('livewire.admin.gestion-sesiones', [
            'sesiones' => $this->sesiones,
        ])->layout('layouts.adminlte');
    }

    protected function messages()
    {
        return [
            'fecha.required' => 'La fecha de la sesión es requerida.',
        ];
    }

    public function create()
    {
        $this->sesion_id = 0;
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {
        $sesion = Sesion::findOrFail($id);
        $this->sesion_id = $id;
        $this->fecha = $sesion->fecha;
        $this->urlYoutube = $sesion->urlYoutube;
        $this->openModal();
    }

    public function storeSesion()
    {
        $validatedData = $this->validate([
            'fecha' => 'required|date',
            'urlYoutube' => 'string|nullable',
        ]);

        try{
            DB::transaction(function () use ($validatedData) {
                $sesion = Sesion::create([
                    'usuarioAlta_id' => Auth::user()->id,
                    'fecha' => $validatedData['fecha'],
                    'urlYoutube' => $validatedData['urlYoutube'],
                    'consejo' => 'V',
                    'estado' => 1 //estados: 1 = En revision, 2 = publicada, 3 = Cerrada
                ]);

                $sesion->ordenDia()->create();

                $this->closeModal();
                $this->resetInputFields();
                $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
            });
        }catch(\Exception){
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al crear la sesión y la orden del día']);
        }

    }

    public function updateSesion()
    {

        $validatedData = $this->validate([
            'fecha' => 'required|date',
            'urlYoutube' => 'string|nullable',
        ]);

        Sesion::where('id', $this->sesion_id)->update([
            'usuarioModifico_id' => Auth::user()->id,
            'fecha' => $validatedData['fecha'],
            'urlYoutube' => $validatedData['urlYoutube']
        ]);
        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function notificar()
    {
        echo 'A la espera de sprint';
    }
    public function descargarPdf()
    {
        echo 'A la espera de sprint';
    }
    public function iniciarSesion()
    {
        echo 'A la espera de sprint';
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

    public function openOrdenModal($id_sesion){
        Session::put('id_sesion', $id_sesion);
        return redirect()->route('temarios');
    }

    private function resetInputFields()
    {
        $this->fecha = '';
        $this->urlYoutube = '';
    }
}
