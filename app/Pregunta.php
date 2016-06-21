<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public function encuesta() {
        return $this->belongsTo(Encuesta::class, 'idEncuesta');
    }

    public function opciones() {
        return $this->hasMany(Opciones::class, 'idPregunta');
    }

    public function respuestas() {
        return $this->hasMany(RespuestaEncuesta::class, 'idPregunta');
    }
}
