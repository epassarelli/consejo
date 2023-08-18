<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento_asisten extends Model
{
    use HasFactory;

    protected $table = 'eventos_asisten';

    protected $fillable = [
        'id',
        'evento_id',
        'nombre',
        'email',
        'telefono',
    ];
}
