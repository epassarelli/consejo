<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;
class TemarioOrdenDia extends Model
{
    use HasFactory;
    protected $table = 'temarios_ordenes_dia';
    protected $fillable = ['id_orden_dia', 'id_tema', 'orden', 'web'];

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'id_tema');
    }

}
