<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    //
    public function respuestas()
    {
        return $this->hasMany(RespuestaEncuesta::class, 'idResultado');
    }

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class, 'idEncuesta');
    }
}
