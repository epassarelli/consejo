<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'lugar',
        'fecha',
        'link_mapa',
        'estado',
        'destinatarios',

    ];

}
