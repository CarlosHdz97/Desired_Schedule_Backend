<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model{
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'horas_semanales', 'academia_id'
    ];
    public function academia(){
        return $this->belongsTo('App\Academia','academia_id', 'id');
    }
}
