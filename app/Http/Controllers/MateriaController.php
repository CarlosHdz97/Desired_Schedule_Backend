<?php

namespace App\Http\Controllers;

use App\Materia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriaController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function showAll(){
        return response()->json(Materia::all());
    }
    public function find($id){
        return response()->json(Materia::find($id));
    }
    public function store(Request $request){
        $validateData = $this->validate($request,[
            'nombre' => 'required|unique:materias|max:60',
            'horas_semanales' => 'required',
            'academia_id' => 'required|exists:academias,id',
        ]);
        $materia = new Materia;
        $materia->nombre = $request->nombre;
        $materia->horas_semanales = $request->horas_semanales;
        $materia->academia_id = $request->academia_id;
        return response()->json($materia->save());
    }
    public function edit(Request $request, $id){
        $materia = Materia::find($id);
        if(!$materia){
            return response("No se encontro la materia", 404);
        }
        if(strtoupper($materia->nombre)!=strtoupper($request->nombre)){
            $validateData = $this->validate($request,[
                'nombre' => 'required|unique:academias|max:60',
            ]);
        }
        $validateData = $this->validate($request,[
            'horas_semanales' => 'required',
            'academia_id' => 'required|exists:academias,id',
        ]);
        $materia->nombre = $request->nombre;
        $materia->horas_semanales = $request->horas_semanales;
        $materia->academia_id = $request->academia_id;
        return response()->json($materia->save());
    }
    public function destroy($id){
        $materia = Materia::find($id);
        if(!$materia){
            return response("No se encontro la materia", 404);
        }
        return response()->json($materia->delete());

    }
}