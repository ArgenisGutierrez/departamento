<?php

namespace departamento\Http\Controllers;

use departamento\dictamen;
use Illuminate\Http\Request;
use DB;
class DictamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dictamen=dictamen::first();
        return view('configuracion.index',compact('dictamen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $dictamen= new dictamen();
      $dictamen->jefe_oficina= $request->input('jefe_oficina');
      $dictamen->jefe_departamento= $request->input('jefe_departamento');
      $dictamen->jefe_unidad= $request->input('jefe_unidad');
      $dictamen->save();
      return redirect()->route('dictamen.index',[$dictamen])->with('status','Informacion Guardada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\dictamen  $dictamen
     * @return \Illuminate\Http\Response
     */
    public function show(dictamen $dictamen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\dictamen  $dictamen
     * @return \Illuminate\Http\Response
     */
    public function edit(dictamen $dictamen)
    {
        return view('configuracion.edit',compact('dictamen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\dictamen  $dictamen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dictamen $dictamen)
    {
      $dictamen->fill($request->all());
      $dictamen->save();
      $dictamen=dictamen::first();
      return redirect()->route('dictamen.index',[$dictamen])->with('status','Informacion Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\dictamen  $dictamen
     * @return \Illuminate\Http\Response
     */
    public function destroy(dictamen $dictamen)
    {
        //
    }
}
