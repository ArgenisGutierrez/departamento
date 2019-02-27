<?php

namespace departamento\Http\Controllers;

use departamento\AreaDos;
use Illuminate\Http\Request;

class AreaDosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $areas2=AreaDos::all();
      return view('areaDos.index',compact('areas2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registros.registros');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        DB::beginTransaction();
        $area2= new AreaDos();
        $area2->encargado= $request->input('encargado');
        $area2->cargo= $request->input('cargo');
        $area2->save();

         DB::commit();
      } 
      catch (Exception $e) 
      {
    		//Si existe algún error en la Transacción
    		DB::rollback(); //Anular los cambios en la DB
    	}
      return redirect()->route('area2.create',[$area2])->with('status2','Informacion Guardada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\AreaDos  $areaDos
     * @return \Illuminate\Http\Response
     */
    public function show(AreaDos $area2)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\AreaDos  $areaDos
     * @return \Illuminate\Http\Response
     */
    public function edit(AreaDos $area2)
    {
      return view('areaDos.edit',compact('area2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\AreaDos  $areaDos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AreaDos $area2)
    {
      $area2->fill($request->all());
      $area2->save();
      $areas2=AreaDos::all();
      return redirect()->route('area2.index',[$area2])->with('status2','Informacion Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\AreaDos  $areaDos
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaDos $area2)
    {
        $area2->delete();
        $areas2=AreaDos::all();
        return redirect()->route('area2.index',[$area2])->with('status2','Informacion Eliminada Correctamente');
    }





}
