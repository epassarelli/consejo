<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class ItemsTemario extends Model
{
    use HasFactory;

    protected $table = 'items_temario';

    protected $fillable = [
        'id_tema',
        'comision_id',
        'facultad_id',
        'tipo',
        'numero',
        'resolucion',
        'resumen',
        'id_votacion',
        'id_temario'
    ];

    public function tema(): HasOneThrough
    {
        return $this->hasOneThrough(Tema::class, TemarioOrdenDia::class, 'id', 'id', 'id_temario', 'id_tema');
    }

    public function temario(): HasOne
    {
        return $this->hasOne(TemarioOrdenDia::class, 'id', 'id_temario');
    }


    public function facultad(): BelongsTo
    {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }

    public function comision(): BelongsTo
    {
        return $this->belongsTo(Comision::class, 'comision_id');
    }

    public function votacion(): BelongsTo
    {
        return $this->belongsTo(Votacion::class, 'id', 'votacion_id');
    }

}
