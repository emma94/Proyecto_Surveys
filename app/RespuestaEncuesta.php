<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaEncuesta extends Model
{
    //
    public function resultado() {
        return $this->belongsTo(Resultado::class, 'idRespuesta');
    }

    public function pregunta() {
        return $this->belongsTo(Pregunta::class, 'idPregunta');
    }
}
