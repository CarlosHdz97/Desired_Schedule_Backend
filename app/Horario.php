<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model{
    protected $fillable = [
        'usuario_id', 'periodo_id', 'materia_id', 'dia', 'inicio', 'fin'
    ];
}
