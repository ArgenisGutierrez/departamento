<?php

namespace departamento\Http\Controllers;

use departamento\servicio;
use departamento\anexo;
use Illuminate\Http\Request;
use DB;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(anexo $anexo)
    {
      return view('servicio.create',compact('anexo')); 
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
        $servicio= new servicio();
        $id= $request->input('id_anexo');
        $servicio->id_anexo=$id;
        $servicio->nombre= $request->input('nombre');
        $servicio->mano_obra= $request->input('mano_obra');
        $servicio->refaccion= $request->input('refaccion');
        $servicio->save();

        DB::commit();
      } 
      catch (Exception $e) 
      {
    		//Si existe algún error en la Transacción
    		DB::rollback(); //Anular los cambios en la DB
    	}
      return redirect()->route('anexo.show', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(servicio $servicio,anexo $anexo)
    {
      return view('servicio.edit',compact('servicio','anexo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servicio $servicio)
    {
      $id= $request->input('id');
      $servicio->fill($request->all());
      $servicio->save();
      return redirect()->route('anexo.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicio $servicio)
    {
      $servicio->delete();
      return redirect()->back();
    }
}
