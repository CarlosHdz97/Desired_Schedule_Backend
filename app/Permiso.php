<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model{
    public $timestamps = false;
    protected $fillable = [
        'id','descripcion'
    ];
    public function roles(){
        return $this->belongsToMany('App\Rol', 'roles_vs_permisos', 'permiso_id', 'rol_id');
    }
    public function users(){
        return $this->belongsToMany('App\Usuario', 'usuarios_vs_permisos', 'permiso_id', 'usuario_id');
    }
}
