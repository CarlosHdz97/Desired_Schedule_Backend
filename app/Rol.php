<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model{
    protected $table = 'roles';
    public $timestamps = false;

    protected $fillable = [
        'id','descripcion'
    ];
    public function usuarios(){
        return $this->hasMany('App\Usuario','usuario_id', 'id');
    }

    public function permisos(){
        return $this->belongsToMany('App\Permiso', 'roles_vs_permisos', 'rol_id', 'permiso_id');
    }
}