<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function showAll(){
        return response()->json(Rol::all());
    }
    public function find($id){
        return response()->json(Rol::find($id));
    }
    public function store(Request $request){
        $validateData = $this->validate($request,[
            'descripcion' => 'required|unique:roles|max:60',
        ]);
        $rol = new Rol;
        $rol->descripcion = $request->descripcion;
        return response()->json($rol->save());
    }
    public function edit(Request $request, $id){
        $rol = Rol::find($id);
        if(strtoupper($rol->descripcion)!=strtoupper($request->descripcion)){
            $validateData = $this->validate($request,[
                'descripcion' => 'required|unique:roles|max:60',
            ]);
        }
        $rol->descripcion = $request->descripcion;
        return response()->json($rol->save());
    }
    public function destroy($id){
        $rol = Rol::find($id);
        if(!$rol){
            return response('No se ha encontrado el rol indicado', 404);
        }
        return response()->json($rol->delete());
    }
    public function permisos($id){
        $rol = Rol::find($id);
        if(!$rol){
            return response("No se encontro el rol", 404);
        }
        $permisos = [];
        foreach($rol->permisos as $permiso){
            $data = ["id"=>$permiso->id, "descripcion"=>$permiso->descripcion];
            array_push($permisos, $data);
        }
        return response()->json($permisos);
    }
    public function editPermisos(Request $request, $id){
        $rol = Rol::find($id);
        if(!$rol){
            return response("No se encontro el rol", 404);
        }
        return response()->json($rol->permisos()->sync($request->permisos));
    }
}