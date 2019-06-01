<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academia extends Model{
    protected $fillable = [
        'nombre'
    ];
    public $timestamps = false;
    public function usuarios(){
        return $this->belongsToMany('App\Usuario')->using('App\UsuarioVsAcademia');
    }
}