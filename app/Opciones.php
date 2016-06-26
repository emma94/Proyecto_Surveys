<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opciones extends Model
{
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class, 'idPregunta');
    }
}
