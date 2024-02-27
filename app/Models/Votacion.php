<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Votacion extends Model
{
    use HasFactory;

    public $table = "votaciones";
    public $fillable = [
        "id_temario",
        "titulo",
        "estado",
        "aceptacion"
    ];


    public function participantes(): BelongsToMany
    {
        return $this->belongsToMany(User::class,  "votos_usuarios", "id_votacion", "id_usuario", "id", "id")->withPivot("voto")->withTimestamps();
    }

    public function items(): HasMany
    {
        return $this->hasMany(ItemsTemario::class, "id_votacion");
    }
}
