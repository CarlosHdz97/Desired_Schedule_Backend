<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model{
    protected $fillable = [
        'numero_periodo', 'inicio', 'fin'
    ];
}
