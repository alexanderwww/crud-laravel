<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\tareasDiarias;

class categoriasTareas extends Model
{
    use HasFactory;

    public function MostrarAllTareas(){
        return $this->hasMany(tareasDiarias::class);
    }
}
