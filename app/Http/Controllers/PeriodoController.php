<?php

namespace App\Http\Controllers;

use App\Periodo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeriodoController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }
    public function showAll(){
        return response()->json(Periodo::all());
    }
    public function find($id){
        return response()->json(Periodo::find($id));
    }
    public function store(Request $request){
        $validateData = $this->validate($request,[
            'numero_periodo' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
        ]);
        $periodo = new Periodo;
        $periodo->numero_periodo = $request->numero_periodo;
        $periodo->inicio = $request->inicio;
        $periodo->fin = $request->fin;
        return response()->json($periodo->save());
    }
    public function edit(Request $request, $id){
        $periodo = Periodo::find($id);
        if(!$periodo){
            return response("No se encontro el periodo", 404);
        }
        $validateData = $this->validate($request,[
            'numero_periodo' => 'required',
            'inicio' => 'required',
            'fin' => 'required',
        ]);
        $periodo->numero_periodo = $request->numero_periodo;
        $periodo->inicio = $request->inicio;
        $periodo->fin = $request->fin;
        return response()->json($periodo->save());
    }
    public function destroy($id){
        if(!$periodo){
            return response("No se encontro el periodo", 404);
        }
        $periodo = Periodo::find($id);
        return response()->json($periodo->delete());

    }
}