<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    protected $table = 'facultades';

    protected $fillable = [
        'id',
        'name',
        'status',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'facultad_id');
    }
}
