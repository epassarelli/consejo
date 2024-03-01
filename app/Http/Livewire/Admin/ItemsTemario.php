<?php

namespace App\Http\Livewire\Admin;

use App\Models\ItemsTemario as ModelItemsTemario;
use App\Models\Facultad as ModelsFacultad;
use App\Models\Comision as ModelsComision;
use App\Models\Sesion;
use App\Models\Adjunto as ModelAdjunto;
use App\Models\TemarioOrdenDia;
use App\Models\Votacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ItemsTemario extends Component
{
    public $id_item_temario;
    public $tema; // id del tema que viene desde el temario
    protected $facultades;
    protected $comisiones;
    public $id_tema; // este en realidad es el id del temario al que esta relacionado
    public $item_id;
    public $facultad_id;
    public $comision_id;
    public $tipo;
    public $sesion;
    public $numero;
    public $resolucion;
    public $resumen;
    public $showModal = 'none';
    public $showActionModal = false;
    public $showAttachModal = false;
    public $loading = false;
    public $readonly = false;
    public $votaciones = null;
    public $items;
    /**** Propiedades Votacion Activa para edicion / asignacion Items   */
    public $votacionId = 0;
    public $votacionTitulo = "";
    public $votacionAceptacion;
    public $votacionEstado;
    /********************************************************************/
    public $votacionActiva;

    protected $listeners = ['delete', 'update'];
    public $archivos = [];
    public $archivo;
    public $errors = [];

    // para adjuntos
    public $titulo = '';

    use WithFileUploads;
    public $file;

    public function guardarArchivos()
    {

        $this->validate([
            'archivo' => 'required|file|max:2048',// 1024 kilobytes = 1 MB
            'titulo' => 'required'
        ]);


        if ($this->archivo && $this->archivo->getClientOriginalExtension() == 'pdf') {

            $rutaArchivo = $this->archivo->store('archivos');
            $newAdjunto = new ModelAdjunto();
            $newAdjunto->id_item_temario = $this->item_id;
            $newAdjunto->title = $this->titulo;
            $newAdjunto->name =  $this->archivo->getClientOriginalName();
            $newAdjunto->type = $this->archivo->getClientMimeType();
            $newAdjunto->size = $this->archivo->getSize();
            $newAdjunto->path = $rutaArchivo;

            $newAdjunto->save();
        }


        $this->reset('file');
        $this->titulo = '';
        $this->archivo = null;

        if(is_null($this->archivos)){
            $this->archivos = [];
        }

        $filesUpload = new ModelAdjunto();
        $this->archivos = $filesUpload->select('*')
        ->where('id_item_temario', '=', $this->item_id)
        ->get();

        $this->emit('mensajePositivo', ['mensaje' => 'Archivos PDF subidos correctamente.']);
        $this->readonly = false;
    }



    public function render()
    {
        if (empty(session("id_sesion")))
            $this->redirect("/admin/sesiones");

        if (empty(session('id_temario')))
            $this->redirect("/admin/temarios");
        
            $esAdmin = Gate::allows("admin-sesion");

        
        $this->sesion = Sesion::with(["ordenDia", "temariosOrdenDia" => ["votacionesActivas"]])->withCount("asistentes")->find(session("id_sesion"));
        $temario = $this->sesion->temariosOrdenDia()->find(session('id_temario'));
        if (empty($temario))
            $this->redirect("/admin/temarios");

        $this->votaciones = $temario->votaciones()->withCount(["participantes", "votaronAfirmativo", "votaronNegativo", "votaronAbstenerse"])->get();
        if (!$esAdmin || empty($this->votacionActiva))
            $this->votacionActiva = $this->votaciones->where("estado", 2)->first();
        else $this->votacionActiva = $this->votaciones->where("id", $this->votacionActiva->id)->first();
        if (!$esAdmin) {

            $this->votacionId = !empty($this->votacionActiva) ? $this->votacionActiva->id : null;
            $this->votacionTitulo = !empty($this->votacionActiva) ? $this->votacionActiva->titulo : null;
            $this->votacionAceptacion = !empty($this->votacionActiva) ? $this->votacionActiva->aceptacion : null;
        }
        $this->items = $temario->items()->with(["facultad", "comision", "tema"])->get();
        return view('livewire.admin.items-temario', [
            'facultades' => ModelsFacultad::all(),
            'comisiones' => ModelsComision::all(),
            'esAdmin' => $esAdmin
        ])->layout('layouts.adminlte');
    }

    public function storeItem()
    {

        $this->loading = true;
        try {

            $params = $this->validate(
                [
                    'numero' => 'required|string',
                    'resolucion' => 'required',
                    'resumen' => 'required',
                    'comision_id' => 'required',
                    'facultad_id' => 'required',
                    'tipo' => 'required',
                ],
                [
                    'numero.required' => 'El campo Número es obligatorio.',
                    'resolucion.required' => 'El campo resolución es obligatorio.',
                    'resumen.required' => 'El campo resumen es obligatorio.',
                    'comision_id.required' => 'El campo comisión es obligatorio.',
                    'facultad_id.required' => 'El campo facultad es obligatorio.',
                    'tipo.required' => 'El campo tipo es obligatorio.',
                ]
            );

            $temario = TemarioOrdenDia::find(session('id_temario'));
            $temario->items()->create([
                'id_tema' => $temario->id_tema,
                'numero' => $this->numero,
                'comision_id' => $this->comision_id,
                'facultad_id' => $this->facultad_id,
                'resolucion' => $this->resolucion,
                'resumen' => $this->resumen,
                'tipo' => $this->tipo
            ]);

            $this->reset(['numero']);
            $this->closeModal();
            $this->emit('mensajePositivo', ['mensaje' => 'El Item se agregó correctamente']);
        } catch (\Illuminate\Validation\ValidationException $e) {

            $errors = $e->validator->getMessageBag();
            $this->emit('errores', ['errors' => $errors]);
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al agregar el item: ' . $e->getMessage()]);
        } finally {
            // Independientemente de si hubo un error o no, cierra el modal y restablece el estado del loader
            $this->loading = false;
        }
    }


    public function updateItem()
    {
        $this->loading = true;

        Storage::disk('local')->put('archivo.txt', 'Contenido del archivo');
        try {

            $params = $this->validate([
                'numero' => 'required|string',
                'resolucion' => 'required',
                'resumen' => 'required',
                'comision_id' => 'required',
                'facultad_id' => 'required',
                'tipo' => 'required',
            ], [
                'numero.required' => 'El campo Número es obligatorio.',
                'resolucion.required' => 'El campo resolución es obligatorio.',
                'resumen.required' => 'El campo resumen es obligatorio.',
                'comision_id.required' => 'El campo comisión es obligatorio.',
                'facultad_id.required' => 'El campo facultad es obligatorio.',
                'tipo.required' => 'El campo tipo es obligatorio.',
            ]);

            $ItemToUpdate = ModelItemsTemario::find($this->item_id);

            if (!empty($ItemToUpdate)) {
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
        } catch (\Illuminate\Validation\ValidationException $e) {
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
        } catch (\Exception $e) {
            // Manejar otros errores
            $this->emit('mensajeNegativo', ['mensaje' => 'Error al eliminar el item: ' . $e->getMessage()]);
        }
    }


    public function openEditModal($id, $readonly)
    {
        $this->readonly = $readonly;
        $this->item_id = $id;
        $ItemToUpdate = ModelItemsTemario::find($id);

        if ($id == 0) {
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


    public function deleteAdj($id){

        $f = ModelAdjunto::find($id);

        Storage::delete($f->path);
        $f->delete();

        $filesUpload = new ModelAdjunto();
        $this->archivos = $filesUpload->select('*')
        ->where('id_item_temario', '=', $this->item_id)
        ->get();

    }

    public function openAttachModal($id){
        $this->item_id = $id;

        $filesUpload = new ModelAdjunto();

        $this->archivos = $filesUpload->select('*')
        ->where('id_item_temario', '=', $id)
        ->get();

        if(is_null($this->archivos)){
            $this->archivos = [];
        }

        $this->showAttachModal = true;
    }

    public function closeAttachModal(){
        $this->showAttachModal = false;
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

    public function createVotacion()
    {
        $temario = $this->sesion->temariosOrdenDia()->with("tema")->find(session('id_temario'));
        $this->votacionTitulo = $temario->tema->titulo . "-{$this->sesion->ordenDia->id}-" . ($temario->votaciones()->count() + 1);
        $newVotacion = $temario->votaciones()->create(["titulo" => $this->votacionTitulo, "estado" => 1, "aceptacion" => "mayoria"]);
        $this->votaciones = $temario->refresh();
        $this->votacionId = $newVotacion->id;
        $this->votacionAceptacion = $newVotacion->aceptacion;
        $this->votacionEstado = $newVotacion->estado;

        $this->emit(['mensajePositivo', ['mensaje' => "Se agrego la votacion {$this->votacionTitulo} correctamente"]]);
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


    public function volver()
    {
        return redirect()->route('temarios');
    }


    public function activeVotacion($id)
    {
        if (Gate::allows("admin-sesion")) {
            $this->votacionId = $id;
            $votacion = $this->votaciones->where("id", $id)->first();
            $votacion->refresh();
            $this->votacionTitulo = $votacion->titulo;
            $this->votacionAceptacion = $votacion->aceptacion;
            $this->votacionEstado = $votacion->estado;
            if (in_array($votacion->estado, [2, 3]))
                $this->votacionActiva = $votacion;
            else $this->votacionActiva = null;
        }
    }

    public function removeVotacion($id)
    {
        $this->votacionId = $id;
        $votacion = $this->votaciones->where("id", $id)->first();
        $votacion->participantes()->detach();
        $votacion->items()->update(["id_votacion" => null]);
        $votacion->delete();
        $this->votacionId = null;
        $this->votacionTitulo = "";
        $this->votacionAceptacion = "";
    }

    public function updateVotacion()
    {
        Votacion::where("id", $this->votacionId)->update([
            "titulo" => $this->votacionTitulo,
            "aceptacion" => $this->votacionAceptacion
        ]);
        $this->emit(['mensajePositivo', ['mensaje' => "Se actualizó correctamnente la Votación"]]);
    }

    public function addVotacion($itemId, $votacionId, $add)
    {
        $item = $this->items->where("id", $itemId)->first();
        if ($add) $item->id_votacion = $votacionId;
        elseif ($item->id_votacion == $votacionId) $item->id_votacion = null;
        $item->save();
        $this->emit(['mensajePositivo', ['mensaje' => "Se " . ($add ? "agrego" : "quito") . " el item de la votacion."]]);
    }

    public function enableVotacion($id, $estado)
    {
        $this->votacionId = $id;
        $votacion = $this->votaciones->where("id", $id)->first();
        $votacion = Votacion::withCount(["participantes", "votaronAfirmativo", "votaronNegativo", "votaronAbstenerse"])->find($votacion->id);
        if ($votacion->estado == 1) {
            $votacion->titulo = $this->votacionTitulo;
            $votacion->aceptacion = $this->votacionAceptacion;
        }
        $votacion->estado = $estado;
        if ($estado == 3) {
            $sesionParticipantes = $this->sesion->votantes()->count();
            $votacionParticipantes = $votacion->participantes()->count();
            $votacionAfirmativos = $votacion->votaronAfirmativo()->where("voto", 1)->count();

            if ($votacionParticipantes == $sesionParticipantes) {
                if ($votacion->aceptacion == "mayoria") $votacion->resultado = ($sesionParticipantes / 2) < $votacionAfirmativos;
                elseif ($votacion->aceptacion == "absoluto") $votacion->resultado = $sesionParticipantes == $votacionAfirmativos;
                elseif ($votacion->aceptacion == "mayoria2/3") $votacion->resultado = ($sesionParticipantes * 2 / 3) <= $votacionAfirmativos;
                else $votacion->resultado = null;
            } else $votacion->resultado = null;
        } else {
            $votacion->resultado = null;
        }

        $votacion->save();
        $this->votacionActiva = in_array($estado, [2, 3]) ? $votacion : null;
        $this->votacionEstado = $estado;
        $this->emit(['mensajePositivo', ['mensaje' => "Se habilito la votacion {$votacion->titulo} el item de la votacion."]]);
    }


    public function setVoto($voto = null)
    {
        #if (Gate::allows("votante")) {
            if (!$this->votacionActiva->participantes()->where("users.id", Auth::user()->id)->exists()) {
                $this->votacionActiva->participantes()->attach(Auth::user()->id, ['voto' => $voto]);
            } else {
                $this->votacionActiva->participantes()->updateExistingPivot(Auth::user()->id, ['voto' => $voto]);
            }
            $this->emit(['mensajePositivo', ['mensaje' => "Se registro con exito su voto."]]);
        /*} else {
            $this->emit(['mensajNegativo', ['mensaje' => "No tiene permiso para votar."]]);
        }*/
    }

    public function removeVoto()
    {
        $this->votacionActiva->participantes()->detach(Auth::user()->id);
        $this->emit(['mensajePositivo', ['mensaje' => "Se elimino con exito su voto."]]);
    }
}
