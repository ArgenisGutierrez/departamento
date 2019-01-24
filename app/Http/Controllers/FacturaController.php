<?php

namespace departamento\Http\Controllers;

use departamento\factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $facturas=factura::all();
      return view('factura.index',compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registros.factura');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = new factura();
        $factura->id_orden=$request->input('id_orden');
        $factura->folio=$request->input('folio');
        $factura->importe=$request->input('importe');
        $factura->fecha=$request->input('fecha');
        $factura->fecha_envio_area=$request->input('fecha_envio_area');
        $factura->fecha_recibo_area=$request->input('fecha_recibo_area');
        $factura->save();
        return redirect()->route('factura.create',[$factura])->with('status','Informacion Guardada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(factura $factura)
    {
        return view('factura.edit',compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, factura $factura)
    {
        $factura->fill($request->all());
        $factura->save();
        $facturas=factura::all();
        return redirect()->route('factura.index',[$factura])->with('status','Informacion Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(factura $factura)
    {
        $factura->delete();
        $facturas=factura::all();
        return redirect()->route('factura.index',[$factura])->with('status','Informacion Eliminada Correctamente');
    }
}
