<?php

namespace App\Http\Livewire\Admin;

use App\Models\TemarioOrdenDia as modelTemarioOrdenDia;
use App\Models\ItemsTemario as ModelItemsTemario;
use App\Models\Tema as ModelTemas;
use App\Models\Sesion as ModelSesion;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class TemarioOrdenDia extends Component
{

    public $temarios;
    public $sesion;
    public $loading = false;
    public $showActionModal = false;
    public $showActionModalVotacion = false;
    public $readonly = false;
    public $id_temario = 0;
    public $id_tema;
    public $orden;
    public $web = 0;
    private $id_sesion = 0;
    protected $listeners = ['delete', 'update'];

    public function openModal()
    {
        $this->showActionModal = true;
    }

    public function closeModal()
    {
        $this->id_tema = null;
        $this->orden = '';
        $this->web = false;
        $this->id_temario = 0;
        $this->showActionModal = false;
        $this->readonly = false;
        $this->loading = false;
    }

    public function render()
    {
        $this->id_sesion = session('id_sesion');

        if (empty($this->id_sesion))
            $this->redirect("/admin/sesiones");


        $this->sesion = ModelSesion::with(["temariosOrdenDia" => ["items", "tema"], "ordenDia"])->find($this->id_sesion);

        return view('livewire.admin.temario-orden-dia', [
            'temas' => modelTemas::all(),
            "esAdmin" => Gate::allows("admin-sesion")
        ])->layout('layouts.adminlte');
    }

    public function storeItemTemario()
    {
        $this->loading = true;

        try {
            $this->validate([
                'id_tema' => 'required',
                'orden' => 'required'
            ]);


            $this->emit('mensajePositivo', ['mensaje' => $this->orden]);

            $this->sesion->ordenDia->temariosOrdenDia()->firstOrcreate([
                'id_tema' => $this->id_tema
            ], [
                'orden' => $this->orden,
                'web' => $this->web,
            ]);

            $this->reset(['id_tema']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El Item se agregó correctamente']);
        } catch (\Illuminate\Validation\ValidationException $e) {

            $errors = $e->validator->getMessageBag();
            $this->emit('errores', ['errors' => $errors]);

            //       $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item 2: ' . $errors]);
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }
    }

    public function updateTemario()
    {
        $this->loading = true;

        try {

            $params = $this->validate(
                [
                    'id_tema' => 'required',
                    'orden' => 'required'
                ],
                [
                    'id_tema.required' => 'El campo Tema es obligatorio.',
                    'orden.required' => "el orden es obligatorio"
                ]
            );


            $temarioToUpdate = modelTemarioOrdenDia::find($this->id_temario);

            if (!empty($temarioToUpdate)) {
                $temarioToUpdate->id_tema =  $this->id_tema;
                $temarioToUpdate->orden = $params["orden"];
                $temarioToUpdate->web = $this->web;
                $temarioToUpdate->save();
            }

            $this->reset(['id_temario', 'orden', 'web']);
            $this->closeModal();

            $this->emit('mensajePositivo', ['mensaje' => "El temario se agrego correctamente"]);
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el temario: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }
    }

    public function delete($id)
    {
        try {
            $temarioToDelete = modelTemarioOrdenDia::where('id_orden_dia', '=', $id);
            $items = ModelItemsTemario::where('id_tema', $id)->count();

            // Verifica si el tema existe antes de intentar eliminarlo
            if (!empty($temarioToDelete && $items == 0)) {
                $temarioToDelete->delete();
                $this->emit('mensajePositivo', ['mensaje' => 'El temario se elimino correctamente']);
            } else if ($items > 0) {
                $this->emit('mensajeNegativo', ['mensaje' => 'El temario no pudo ser eliminado, por favor verifique que no tenga items y vuelva a intentarlo']);
            }
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al eliminar el temario: ' . $e->getMessage()]);
        }
    }

    public function openEditModal($id, $readonly)
    {

        $temarioToUpdate = modelTemarioOrdenDia::find($id);
        $this->readonly = $readonly;
        $this->id_temario = $id;

        if ($id == 0) {
            $this->readonly = true;
        }

        if (!empty($temarioToUpdate)) {
            $this->id_tema = $temarioToUpdate->id_tema;
            $this->orden = $temarioToUpdate->orden;
            $this->web = $temarioToUpdate->web;
        }

        $this->openModal();
    }

    public function items($id)
    {
        Session::put('id_temario', $id);
        return redirect()->route('items');
    }

    public function volver()
    {
        return redirect()->route('sesiones');
    }
}
