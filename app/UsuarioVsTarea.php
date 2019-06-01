<?php
namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;
    
class Disponibilidad extends Pivot{
    protected $fillable = [
        'id', 'usuario_id', 'tarea_id', 'done'
    ];
}