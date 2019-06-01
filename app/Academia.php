<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academia extends Model{
    protected $fillable = [
        'nombre'
    ];
    public $timestamps = false;
    public function materias(){
        return $this->hasMany('App\Materia','academia_id', 'id');
    }
    public function usuarios(){
        return $this->belongsToMany('App\Usuario')->using('App\UsuarioVsAcademia');
    }
}
