<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
    use HasFactory;

    protected $table = 'items_temario_adjuntos';

    protected $fillable = [
        'id',
        'id_item_temario',
        'name',
        'size',
        'path',
        'id_item',
        'title',
    ];


}
