<?php

namespace departamento\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    function area_nombre(Request $request){
        $id = $request->get('id');
        $data = DB::table('area')
        ->find($id)
       ->val('nombre')
       ->get();
       echo $data;
    }
}
