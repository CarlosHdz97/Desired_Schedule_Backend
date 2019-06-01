<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermisoController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function showAll(){
        return response()->json(Permiso::all());
    }
    public function find($id){
        return response()->json(Permiso::find($id));
    }
    public function store(Request $request){
        $validateData = $this->validate($request,[
            'descripcion' => 'required|unique:permisos|max:60',
        ]);
        $permiso = new Permiso;
        $permiso->descripcion = $request->descripcion;
        return response()->json($permiso->save());
    }
    public function edit(Request $request, $id){
        $permiso = Permiso::find($id);
        if(!$permiso){
            return response("No se encontro el permiso", 404);
        }
        if(strtoupper($permiso->descripcion)!=strtoupper($request->descripcion)){
            $validateData = $this->validate($request,[
                'descripcion' => 'required|unique:permisos|max:60',
            ]);
        }
        $permiso->descripcion = $request->descripcion;
        return response()->json($permiso->save());
    }
    public function destroy($id){
        $permiso = Permiso::find($id);
        if(!$permiso){
            return response("No se encontro el permiso", 404);
        }
        return response()->json($permiso->delete());

    }
}