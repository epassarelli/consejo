<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sesion;
use App\Models\User;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;


class GestionSesiones extends Component
{

    use WithPagination;
    public $sesion_id;
    public $fecha;
    public $urlYoutube;
    public $muestraModal = 'none';
    public $estados = ['En revisión', 'Publicada', 'Cerrada', 'En sesión', 'Finalizada', 'Sesionando'];

    protected $sesiones;
    protected $listeners = ['delete'];

    // Campos de busqueda
    public $searchByState = '';
    public $searchByDateStart = '';
    public $searchByDateEnd = '';
    public $searchByDateComStart = '';
    public $searchByDateComEnd = '';
    public $searchByDateFinishStart = '';
    public $searchByDateFinishEnd = '';

    //Campos de ordenamiento

    public $sortColumn = 'fecha';
    public $sortDirection = 'desc';

    protected $queryString = [
        'searchByState',
        'searchByDateStart',
        'searchByDateEnd',
        'searchByDateComStart',
        'searchByDateComEnd',
        'searchByDateFinishStart',
        'searchByDateFinishEnd'
    ];




    public function render()
    {


        // Iniciar la consulta base para sesiones.
        $query = Sesion::query();

        $busquedaNormalizada = $this->eliminarAcentos(strtolower($this->searchByState));
        $resultados = array_filter($this->estados, function ($estado) use ($busquedaNormalizada) {
            $estadoSinAcentos = $this->eliminarAcentos(strtolower($estado));
            return strpos($estadoSinAcentos, $busquedaNormalizada) !== false;
        });
        $indices = array_keys($resultados);
        $indicesAjustados = array_map(function ($indice) {
            return $indice + 1;
        }, $indices);

        if (!empty($indicesAjustados)) {
            $query->whereIn('estado', $indicesAjustados);
        }

        // Ejemplo de cómo aplicar el filtro para cada pareja de fechas.
        // Filtro para 'searchByDateStart' y 'searchByDateEnd'.
        $this->applyDateFilter($query, 'fecha', $this->searchByDateStart, $this->searchByDateEnd);

        // Filtro para 'searchByDateComStart' y 'searchByDateComEnd'.
        $this->applyDateFilter($query, 'fcomunicacion', $this->searchByDateComStart, $this->searchByDateComEnd);

        // Filtro para 'searchByDateFinishStart' y 'searchByDateFinishEnd'.
        $this->applyDateFilter($query, 'ffinalizada', $this->searchByDateFinishStart, $this->searchByDateFinishEnd);

        // Aquí puedes incluir otros filtros, como el filtro por estado que ya tenías.

        // Aplicar filtros adicionales como el del estado y la lógica de paginación.
        $esAdmin = Gate::allows("admin-sesion");
        $this->sesiones = $esAdmin ? $query->orderBy($this->sortColumn, $this->sortDirection)->paginate(10) : $query->whereIn("estado", [2, 3, 4])->orderBy($this->sortColumn, $this->sortDirection)->paginate(10);

        $esAdmin = Gate::allows("admin-sesion");
        // $this->sesiones = $esAdmin  ? Sesion::whereIn("estado", $indicesAjustados ?: [])->paginate(10) : Sesion::whereIn("estado", [2, 3, 4])->get()->paginate(10);
        return view('livewire.admin.gestion-sesiones', [
            'sesiones' => $this->sesiones,
            'esAdmin' => $esAdmin
        ])->layout('layouts.adminlte');
    }


    public function updating($propertyName)
    {
        $this->resetPage();
    }


    public function resetSearchFields()
    {
        $this->searchByState = '';
        $this->searchByDateStart = '';
        $this->searchByDateEnd = '';
        $this->searchByDateComStart = '';
        $this->searchByDateComEnd = '';
        $this->searchByDateFinishStart = '';
        $this->searchByDateFinishEnd = '';
    }

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    protected function applyDateFilter(&$query, $column, $startDate, $endDate)
    {
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween($column, [$startDate, $endDate]);
        } elseif (!empty($startDate)) {
            $query->where($column, '>=', $startDate);
        } elseif (!empty($endDate)) {
            $query->where($column, '<=', $endDate);
        }
    }

    protected function eliminarAcentos($cadena)
    {
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŔŕ';
        $modificadas = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUYBsaaaaaaaceeeeiiiidnoooooouuuuybyRr';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        return utf8_encode($cadena);
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

        try {
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
        } catch (\Exception) {
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
        dd('A la espera de sprint');
    }
    public function descargarPdf($id)
    {
        return redirect('admin/generate-pdf/' . $id);
    }
    public function iniciarSesion(Sesion $sesion)
    {
        $session_en_curso = Sesion::where('estado', '=', 4)->value('id');
        if (!$session_en_curso) {
            $sesion->estado = 4;
            $sesion->save();
            $sesion->ordenDia->id_estado = 4;
            $sesion->ordenDia->save();
            $this->emit('mensajePositivo', ['mensaje' => "La sesion cambio a estado '{$this->estados[$sesion->estado - 1]}'"]);
        } else {
            $this->emit('mensajeNegativo', ['mensaje' => "No es posible iniciar esta sesión porque ya hay una sesión en curso."]);
        }
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

    public function openOrdenModal($id_sesion)
    {
        Session::put('id_sesion', $id_sesion);
        $sesion = Sesion::find($id_sesion);
        return  redirect()->route($sesion->estado == 4 ? "asistentes" :  'temarios');
    }

    private function resetInputFields()
    {
        $this->fecha = '';
        $this->urlYoutube = '';
    }
}
