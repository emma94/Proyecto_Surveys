<?php

namespace App;

use App;
use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'idEncuesta');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }

    public function resultados()
    {
        return $this->hasMany(Resultado::class, 'idEncuesta');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function buscarTags()
    {
        return $this->tags()->wherePivot('tag_id', true);
    }
}
