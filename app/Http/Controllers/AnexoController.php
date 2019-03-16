<?php

namespace departamento\Http\Controllers;

use departamento\anexo;
use Illuminate\Http\Request;
use DB;
class AnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anexos=anexo::all();
        return view('anexo.index',compact('anexos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anexo.create');
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
        $anexo= new anexo();
        $anexo->marca= $request->input('marca');
        $anexo->tipo= $request->input('tipo');
        $anexo->modelo= $request->input('modelo');
        $anexo->cil= $request->input('cil');
        $anexo->save();

        DB::commit();
      } 
      catch (Exception $e) 
      {
    		//Si existe algún error en la Transacción
    		DB::rollback(); //Anular los cambios en la DB
    	}
      return redirect()->route('anexo.index',[$anexo])->with('status','Modelo Guardado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function show(anexo $anexo)
    {
        return view('anexo.show',compact('anexo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function edit(anexo $anexo)
    {
        return view('anexo.edit',compact('anexo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anexo $anexo)
    {
      $anexo->fill($request->all());
      $anexo->save();
      return redirect()->route('anexo.index',[$anexo])->with('status','Informacion Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(anexo $anexo)
    {
      $anexo->delete();
      $anexos=anexo::all();
      return redirect()->route('anexo.index',[$anexo])->with('status','Modelo Eliminado');
    }
}
