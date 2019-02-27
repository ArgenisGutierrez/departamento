<?php

namespace departamento\Http\Controllers;

use departamento\unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $unidades=unidad::all();
      return view('unidad.index',compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registros.plantilla');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $unidad= new unidad();
      $unidad->marca= $request->input('marca');
      $unidad->tipo= $request->input('tipo');
      $unidad->modelo= $request->input('modelo');
      $unidad->serie= $request->input('serie');
      $unidad->no_economico= $request->input('no_economico');
      $unidad->cil= $request->input('cil');
      $unidad->uso= $request->input('uso');
      $unidad->familia= $request->input('familia');
      $unidad->area= $request->input('area');
      $unidad->placa_actual= $request->input('placa');
      $unidad->color= $request->input('color');
      $unidad->propiedad= $request->input('propiedad');
      $unidad->patrulla_civil= $request->input('patrulla_civil');
      $unidad->ubicacion= $request->input('ubicacion');
      $unidad->localidad= $request->input('localidad');
      $unidad->adscripcion= $request->input('adscripcion');
      $unidad->save();
      return redirect()->route('unidad.create',[$unidad])->with('status4','Informacion Guardada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function show(unidad $unidad)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(unidad $unidad)
    {
        return view('unidad.edit',compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unidad $unidad)
    {
      $unidad->fill($request->all());
      $unidad->save();
      $unidades=unidad::all();
      return redirect()->route('unidad.index',[$unidad])->with('status4','Informacion Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(unidad $unidad)
    {
        $unidad->delete();
        $unidades=unidad::all();
        return redirect()->route('unidad.index',[$unidad])->with('status4','Informacion Eliminada Correctamente');
    }



}
