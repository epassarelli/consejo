<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comision;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class GestionComisiones extends Component
{
    use WithPagination;

    public $comision_id;
    public $name;
    public $status;
    public $orden;
    public $muestraModal = 'none';

    protected $comisiones;
    protected $listeners = ['delete'];

    // Campos de busqueda
    public $searchByName = '';
    //Campos de ordenamiento

    public $sortColumn = 'id';
    public $sortDirection = 'asc';

    protected $queryString = [
        'searchByName',
    ];

    public function resetSearchFields()
    {
        $this->searchByName = '';
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

    public function render()
    {
        $comisiones = Comision::where('name', 'like', '%'.$this->searchByName.'%')
        ->where('status', true)

        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate(10);;

        return view('livewire.admin.gestion-comisiones', [
            'comisiones' => $comisiones,
        ])->layout('layouts.adminlte');
    }

    protected function messages()
    {
        return [
            'name.required' => 'El nombre de la comisión es requerido.',
            'orden.required' => 'El orden de la comisión es requerido.',
            'orden.unique' => 'El nro de orden ya se encuentra registrado, elija otro.'
        ];
    }

    public function create()
    {
        $this->comision_id = 0;
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {
        $comision = Comision::findOrFail($id);
        $this->comision_id = $id;
        $this->name = $comision->name;
        $this->orden = $comision->orden;
        $this->openModal();
    }

    public function storeComision()
    {

        $validatedData = $this->validate([
            'name' => 'required|string',
            'orden' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    $exists = DB::table('comisiones')
                        ->where('orden', $value)
                        ->where('status', true) // Verifica que el estado sea 'true'
                        ->exists();
                    if ($exists) {
                        $fail('El valor de ' . $attribute . ' ya está en uso.');
                    }
                },
            ],
        ]);

        Comision::create([
            'usuarioAlta_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'orden' => $validatedData['orden'],
            'status' => true
        ]);

        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }

    public function updateComision()
    {

        $validatedData = $this->validate([
            'name' => 'required|string',
            'orden' => 'required|integer|unique:comisiones,orden,' . $this->comision_id
        ]);

        Comision::where('id', $this->comision_id)->update([
            'usuarioModifica_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'orden' => $validatedData['orden']
        ]);
        $this->closeModal();
        $this->resetInputFields();
        $this->emit('mensajePositivo', ['mensaje' => 'Operacion exitosa']);
    }


    public function delete($id)
    {
        Comision::where('id', '=', $id)->update([
            'usuarioBaja_id' => Auth::user()->id,
            'fechaBaja' => now(),
            'status' => false
        ]);
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
        $this->name = '';
        $this->status = '';
        $this->orden = '';
    }
}
