<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class OrdenDia extends Model
{
    use HasFactory;

    protected $table = 'ordenes_dia';
    protected $fillable = ['id_sesion', 'id_estado'];

    public function sesion(): BelongsTo
    {
        return $this->belongsTo(Sesion::class, 'id_sesion');
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(EstadoOrdenDia::class, 'id_estado');
    }

    public function temariosOrdenDia(): HasMany
    {
        return $this->hasMany(TemarioOrdenDia::class, 'id_orden_dia');
    }

    public function votaciones(): HasManyThrough
    {
        return $this->hasManyThrough(Votacion::class, TemarioOrdenDia::class, 'id_orden_dia', 'id_temario', 'id', 'id');
    }

    public function votacionesActivas(): HasManyThrough
    {
        return $this->votaciones()->where("votaciones.estado", 2);
    }
}
