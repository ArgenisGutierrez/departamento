<?php

namespace departamento\Http\Controllers;

use departamento\orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ordenes=orden::all();
      return view('orden.index',compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registros.orden');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      if ($request->input('tipo')==='correctivo') {
        $correctivo='si';
        $preventivo='no';
      }elseif ($request->input('tipo')==='preventivo') {
        $correctivo='no';
        $preventivo='si';
      }
      $id=orden::all()->last();
      if ($id==null) {
        $id=0;
      }
      else {
        $id=$id->id_orden;
        $id++;
      }
      $iniciales="";
      $nombre=explode(" ",$request->input('nombre'));
      foreach ($nombre as $letra) {
        $iniciales.=$letra[0];
      }
      $folio=$request->input('folio_dpa')."-".$iniciales."-".$id;

      $orden= new orden();
      $orden->folio_dpa= $folio;
      $orden->no_oficio= $request->input('no_oficio');
      $orden->fecha= $request->input('fecha');
      $orden->id_area = $request->input('id_area');
      $orden->id_area_dos = $request->input('id_area_dos');
      $orden->servicio = $request->input('servicio');
      $orden->correctivo = $correctivo;
      $orden->preventivo = $preventivo;
      if ($request->input('enllantamiento')=='') {
        $enllantamiento='no';
      }else {
        $enllantamiento='si';
      }
      $orden->enllantamiento =$enllantamiento;
      if ($request->input('refacciones')=='') {
        $refacciones='no';
      }else {
        $refacciones='si';
      }
      $orden->refacciones =$refacciones;
      if ($request->input('mano_obra')=='') {
        $mano_obra='no';
      }else {
        $mano_obra='si';
      }
      $orden->mano_obra = $mano_obra;
      $orden->id_unidad = $request->input('id_unidad');
      $orden->km = $request->input('km');
      $orden->id_taller = $request->input('id_taller');
      $orden->importe_cotizacion = $request->input('importe_cotizacion');
      $orden->fecha_ingreso = $request->input('fecha_ingreso');
      $orden->fecha_salida = $request->input('fecha_salida');
      $orden->estado=$request->input('estado');
      $orden->id = $request->input('id');
      $orden->save();
      return redirect()->route('orden.create',[$orden])
      ->with('status','Informacion Guardada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show(orden $orden)
    {
        return view('orden.show',compact('orden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(orden $orden)
    {
        return view('orden.edit',compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orden $orden)
    {
      $orden->update($request->all());
      $ordenes=orden::all();
      return redirect()->route('orden.index',[$orden])
      ->with('status','Informacion Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(orden $orden)
    {
        $orden->delete();
        $ordenes=orden::all();
        return redirect()->route('orden.index',[$orden])
        ->with('status','Informacion Eliminada Correctamente');
    }

}
