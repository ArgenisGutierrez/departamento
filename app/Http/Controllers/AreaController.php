<?php

namespace departamento\Http\Controllers;

use departamento\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $areas=Area::all();
      return view('area.index',compact('areas'));
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
      $area= new Area();
      $area->nombre= $request->input('nombre');
      $area->encargado= $request->input('encargado');
      $area->cargo= $request->input('cargo');
      $area->save();
      return redirect()->route('area.create',[$area])->with('status','Area Guardada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
      return view('area.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
      $area->fill($request->all());
      $area->save();
      $areas=Area::all();
      return redirect()->route('area.index',[$area])->with('status','Informacion Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        $areas=Area::all();
        return redirect()->route('area.index',[$area])->with('status','Area Eliminada');
    }




}
