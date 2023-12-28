<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsTemario extends Model
{
    use HasFactory;

    protected $table = 'items_temario';

    protected $fillable = ['id_tema',
                            'comision_id',
                            'facultad_id',
                            'tipo',
                            'numero',
                            'resolucion',
                            'resumen'];

    // public function tema()
    // {
    //     return $this->belongsTo(Tema::class, 'id_tema');
    // }

    // public function comision(){
    //     return $this->belongsTo(comision::class, 'comision_id');
    // }

}
