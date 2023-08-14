<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        'id',
        'tipoblog_id',
        'subtitulo',
        'volanta',
        'contenido',
        'imagen',
        'link',
        'publicado',
        'usuario_id',
    ];


}


