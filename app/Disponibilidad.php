<?php
namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;
    
class Disponibilidad extends Pivot{
    protected $fillable = [
        'usuario_id', 'periodo_id', 'dia', 'inicio', 'fin', 'turno', 'disponible'
    ];
}