<?php

namespace App\Http\Controllers;

use App\Tarea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TareaController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function showAll(){
        return response()->json(Tarea::all());
    }
    public function find($id){
        return response()->json(Tarea::find($id));
    }
    public function store(Request $request){
        $validateData = $this->validate($request,[
            'nombre' => 'required|unique:tareas|max:60',
        ]);
        $tarea = new Tarea;
        $tarea->nombre = $request->nombre;
        return response()->json($tarea->save());
    }
    public function edit(Request $request, $id){
        $tarea = Tarea::find($id);
        if(strtoupper($tarea->nombre)!=strtoupper($request->nombre)){
            $validateData = $this->validate($request,[
                'nombre' => 'required|unique:tareas|max:60',
            ]);
        }
        $tarea->nombre = $request->nombre;
        return response()->json($tarea->save());
    }
    public function destroy($id){
        $tarea = Tarea::find($id);
        if(!$tarea){
            return response('No se ha encontrado la tarea indicada', 404);
        }
        return response()->json($tarea->delete());
    }
}