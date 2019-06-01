<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioVsAcademiaController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function addTarea(Request $request){
        $validateData = $this->validate($request,[
            'usuario_id' => 'required|exists:users',
            'tarea_id' => 'required|exists:tareas',
            'done' => 'required'
        ]);
        $usuario = Usuario::find($request->id);
        return response()->json($usuario->tareas()->attach($request->tarea_id,['done', $request->done]));
    }
    public function userAccepted(Request $request){
        $validateData = $this->validate($request,[
            'usuario_id' => 'required|exists:users',
            'academia_id' => 'required|exists:academias'
        ]);
        $usuario = Usuario::find($request->id);
        return response()->json($usuario->academias()->updateExistingPivot($request->academia_id, ['accepted' => true]));
    }
}