<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Sesion extends Model
{
    use HasFactory;

    protected $table = 'sesiones';

    protected $fillable = [
        'id',
        'fecha',
        'consejo',
        'comision_id',
        'fPublicada',
        'fFinalizada',
        'urlYoutube',
        'estado', # 1 = En revision, 2 = Publicada, 3 = Cerrada, 4 = En Sesión
        'usuarioAlta_id'
    ];

    public function comision()
    {
        return $this->belongsTo(Comision::class, 'comision_id');
    }

    public function ordenDia()
    {
        return $this->hasOne(OrdenDia::class, 'id_sesion');
    }

    public function temariosOrdenDia(): HasManyThrough
    {
        return $this->hasManyThrough(TemarioOrdenDia::class, OrdenDia::class, "id_sesion", "id_orden_dia", "id", "id");
    }
}
