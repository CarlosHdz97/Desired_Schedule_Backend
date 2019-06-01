<?php

namespace App\Http\Controllers;

use App\UsuarioVsAcademia;
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
    public function addAcademia(Request $request){
        $validateData = $this->validate($request,[
            'usuario_id' => 'required|exists:users',
            'academia_id' => 'required|exists:academias',
            'prioridad' => 'required|integer'
        ]);
        $usuario = Usuario::find($request->id);
        return response()->json($usuario->academias()->attach($request->academia_id,['prioridad', $request->prioridad]));
    }
    public function removeAcademia(Request $request){
        $validateData = $this->validate($request,[
            'usuario_id' => 'required|exists:users',
            'academia_id' => 'required|exists:academias'
        ]);
        $usuario = Usuario::find($request->id);
        return response()->json($usuario->academias()->detach($request->academia_id));
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