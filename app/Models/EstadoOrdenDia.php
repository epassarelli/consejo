<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOrdenDia extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    protected $table = 'estados_orden_dia';


}
