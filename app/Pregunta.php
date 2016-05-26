<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public function encuesta() {
        return $this->belongsTo(Encuesta::class, 'idEncuesta');
    }
}
