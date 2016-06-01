<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    public function preguntas() {
        return $this->hasMany(Pregunta::class, 'idEncuesta');
    }
}
