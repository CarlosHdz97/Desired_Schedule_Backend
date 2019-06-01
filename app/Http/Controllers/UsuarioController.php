<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function showAll(){
        return response()->json(Usuario::all());
    }
    public function find($id){
        return response()->json(Usuario::find($id));
    }
    public function store(Request $request){
        $validateData = $this->validate($request,[
            'curp' => 'required|unique:users|max:18',
            'apellido_paterno' => 'required|max:40',
            'apellido_materno' => 'required|max:40',
            'nombres' => 'required|max:40',
            'celular' => 'required',
            'email' => 'required|unique:users|max:100',
            'nivel_academico' => 'required|max:60',
            'formacion_academica' => 'required|max:60',
            'horas_nombramiento' => 'required|numeric',
            'dictamen_categoria_docente' => 'required|max:60',
            'password' => 'required',
            
        ]);
        //'rol_id' => 'required|exists:roles',
        $user = new Usuario;
        $user->curp = $request->curp;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->nombres = $request->nombres;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->nivel_academico = $request->nivel_academico;
        $user->formacion_academica = $request->formacion_academica;
        $user->horas_nombramiento = $request->horas_nombramiento;
        $user->dictamen_categoria_docente = $request->dictamen_categoria_docente;
        $user->rol = 1;
        $user->password = $request->password;
        return response()->json($user->save());
    }
    public function edit(Request $request, $id){
        $user = Usuario::find($id);
        if(!$user){
            return response('No se ha encontrado al usuario', 404);
        }
        if(strtoupper($user->curp)!=strtoupper($request->curp) || strtoupper($user->email)!=strtoupper($request->email)){
            $validateData = $this->validate($request,[
                'curp' => 'required|unique:users|max:18',
                'email' => 'required|unique:user|max:100'
            ]);
        }
        $validateData = $this->validate($request,[
            'apellido_paterno' => 'required|max:40',
            'apellido_materno' => 'required|max:40',
            'nombres' => 'required|max:40',
            'celular' => 'required',
            'nivel_academico' => 'required|max:60',
            'formacion_academica' => 'required|max:60',
            'horas_nombramiento' => 'required',
            'dictamen_categoria_docente' => 'required|max:60',
            'password' => 'required',
        ]);
        $user->curp = $request->curp;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->nombres = $request->nombres;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->nivel_academico = $request->nivel_academico;
        $user->formacion_academica = $request->formacion_academica;
        $user->horas_nombramiento = $request->horas_nombramiento;
        $user->dictamen_categoria_docente = $request->dictamen_categoria_docente;
        $user->password = $request->password;
        return response()->json($user->save());
    }
    public function destroy($id){
        $user = Usuario::find($id);
        if(!$user){
            return response('No se ha encontrado al usuario', 404);
        }
        return response()->json($user->delete());
    }

    public function permisos(Request $request){
        $user = User::find($request->id);
        if(!$user){
            return response('No se ha encontrado al usuario', 404);
        }
        $permisos = [];
        foreach($user->permisos as $permiso){
            $data = ["id"=>$permiso->id, "descripcion"=>$permiso->descripcion];
            array_push($permisos, $data);
        }
        return response()->json($permisos);
    }
    public function editPermisos(Request $request){
        $user = User::find($request->id);
        if(!$user){
            return response('No se ha encontrado al usuario', 404);
        }
        return response()->json($user->permisos()->sync($request->permisos));
    }
}