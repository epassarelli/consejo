<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'estado',
        'usuarioAlta_id'
    ];

    public function comision()
    {
        return $this->belongsTo(Comision::class, 'comision_id');
    }
}
