<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UsuarioVsAcademia extends Pivot{
    public $incrementing = false;

    protected $fillable = [
        'usuario_id', 'academia_id', 'prioridad', 'accepted'
    ];
}