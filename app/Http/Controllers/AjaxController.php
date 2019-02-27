<?php

namespace departamento\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use departamento\anexo;
class AjaxController extends Controller
{
    function area1(Request $request){
        $id=$request->get('id');
        $data= DB::table('area')->where('id_area',$id)->get();
        return response()->json($data); 
    }

    function area2(Request $request){
        $id=$request->get('id');
        $data= DB::table('areados')->where('id_area_dos',$id)->get();
        return response()->json($data); 
    }

    function unidad(Request $request){
        $id=$request->get('id');
        $data= DB::table('unidad')->where('id_unidad',$id)->get();
        return response()->json($data); 
    }

    function servicios(Request $request){
        $marca=$request->get('marca');
        $tipo=$request->get('tipo');
        $modelo=$request->get('modelo');
        $anexos=anexo::all();
        foreach ($anexos as $anexo) {
            if ($anexo->marca===$marca AND $anexo->tipo===$tipo AND $anexo->modelo===$modelo) {
                $id= $anexo->id_anexo;
            }
        }
        $data = DB::table('servicio')->where('id_anexo', $id)->get();
        //$data = DB::table('servicio')->where('id_anexo', $id)->get();
        // foreach ($data as $row) {
        //     $output = '<option value="'.$row->id_servicio.'">'.$row->nombre.'</option>';
        // }
        // echo $output;
        return response()->json($data); 
    }

    function servicio(Request $request){
        $id=$request->get('id');
        $data= DB::table('servicio')->where('id_servicio',$id)->get();
        return response()->json($data); 
    }
}
