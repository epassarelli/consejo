<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;

    protected $table = 'items_temario_adjuntos';

    protected $fillable = [
        'id',
        'id_temario',
        'name',
        'size',
        'path',
        'id_item',
        'title',

    ];


}
