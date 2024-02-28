<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrdenDia extends Model
{
    use HasFactory;

    protected $table = 'ordenes_dia';
    protected $fillable = ['id_sesion', 'id_estado'];

    public function sesion()
    {
        return $this->belongsTo(Sesion::class, 'id_sesion');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoOrdenDia::class, 'id_estado');
    }

    public function temariosOrdenDia()
    {
        return $this->hasMany(TemarioOrdenDia::class, 'id_orden_dia');
    }
}
