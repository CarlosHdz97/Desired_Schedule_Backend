<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Preferencia extends Pivot{
    protected $fillable = [
        'usuario_id', 'materia_id', 'prioridad', 'experiencia'
    ];
}
