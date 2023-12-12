<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemarioOrdenDia extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_orden_dia', 'id_tema', 'orden', 'web'];

    public function ordenDia()
    {
        return $this->belongsTo(OrdenDia::class, 'id_orden_dia');
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'id_tema');
    }
}
