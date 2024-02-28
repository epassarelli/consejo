<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TemarioOrdenDia extends Model
{
    use HasFactory;
    protected $table = 'temarios_ordenes_dia';
    protected $fillable = ['id_orden_dia', 'id_tema', 'orden', 'web'];

    public function tema(): HasOne
    {
        return $this->hasOne(Tema::class, 'id', 'id_tema');
    }
    
    public function items(): HasMany
    {
        return $this->hasMany(ItemsTemario::class, 'id_temario', 'id');
    }

    public function ordenDia(): HasOne
    {
        return $this->hasOne(OrdenDia::class, 'id', 'id_orden_dia');
    }

    public function votaciones(): HasMany
    {
        return $this->hasMany(Votacion::class, 'id_temario', 'id');
    }

}
