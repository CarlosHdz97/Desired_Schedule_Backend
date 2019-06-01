<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{
    protected $table = 'users';
    protected $fillable = [
        'curp', 'apellido_paterno', 'apellido_materno', 'nombres', 'celular', 'email', 'nivel_academico', 'formacion_academica', 'horas_nombramiento', 'dictamen_categoria_docente', 'rol_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function rol(){
        return $this->belogsTo('App\Rol', 'rol_id', 'id');
    }
    public function permisos(){
        return $this->belongsToMany('App\Permiso', 'usuarios_vs_permisos', 'usuario_id', 'permiso_id');
    }
    public function academias(){
        return $this->belongsToMany('App\Academia')->using('App\UsuarioVsAcademia');
    }
    public function tareas(){
        return $this->belongsToMany('App\Tarea')->using('App\UsuarioVsTarea');
    }
}