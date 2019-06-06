<?php
namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;
    
class UsuarioVsTarea extends Pivot{
    protected $fillable = [
        'id', 'usuario_id', 'tarea_id', 'done'
    ];
}