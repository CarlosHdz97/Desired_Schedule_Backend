<?php

namespace App\Http\Controllers;

use App\Academia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademiaController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function showAll(){
        return response()->json(Academia::all());
    }
    public function find($id){
        return response()->json(Academia::find($id));
    }
    public function store(Request $request){
        $validateData = $this->validate($request,[
            'nombre' => 'required|unique:academias|max:60',
        ]);
        $academia = new Academia;
        $academia->nombre = $request->nombre;
        return response()->json($academia->save());
    }
    public function edit(Request $request, $id){
        $academia = Academia::find($id);
        if(!$academia){
            return response("No se encontro la academia", 404);
        }
        if(strtoupper($academia->nombre)!=strtoupper($request->nombre)){
            $validateData = $this->validate($request,[
                'nombre' => 'required|unique:academias|max:60',
            ]);
        }
        $academia->nombre = $request->nombre;
        return response()->json($academia->save());
    }
    public function destroy($id){
        $academia = Academia::find($id);
        if(!$academia){
            return response("No se encontro la academia", 404);
        }
        return response()->json($academia->delete());
    }
}