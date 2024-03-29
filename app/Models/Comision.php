<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    use HasFactory;

    protected $table = 'comisiones';

    protected $fillable = [
        'id',
        'name',
        'orden',
        'status',
        'usuarioAlta_id'
    ];

    public function sesiones()
    {
        return $this->hasMany(Sesion::class, 'comision_id');
    }
}
