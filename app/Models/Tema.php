<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = ['titulo'];

    public function items(): HasMany
    {
        return $this->hasMany(ItemsTemario::class, "id_tema", "id");
    }
    
}
