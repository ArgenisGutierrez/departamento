<?php

namespace departamento\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SelectDinamico extends Controller
{
  function index()
  {
   $marca_list = DB::table('anexo')
       ->groupBy('marca')
       ->get();
   return view('registros.orden')->with('marca_list', $marca_list);
  }

  function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('anexo')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }
}
