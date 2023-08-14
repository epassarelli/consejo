<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoblog extends Model
{
    use HasFactory;

    protected $table = 'tipos_blog';

    protected $fillable = [
        'id',
        'name',
        'habilitado'
    ];
}
