<?php

namespace departamento\Http\Controllers;

use departamento\OrdenPago;
use departamento\DetallePago;
use Illuminate\Http\Request;
use DB;
class OrdenPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenespago=OrdenPago::all();
      return view('pago.index',compact('ordenespago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pago.create');
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

            $ordenPago = new OrdenPago();
            $ordenPago->no_tramite=$request->input('no_tramite');
            $ordenPago->area=$request->input('area');
            $ordenPago->serie=$request->input('serie');
            $ordenPago->total=$request->input('total_tramite');
            $ordenPago->fecha=$request->input('fecha_tramite');
            $ordenPago->estado=$request->input('estado');
            $ordenPago->save();

            //Tabla detalle
        $folio = $request->get('folio'); 
        $total = $request->get('total');
        $fecha = $request->get('fecha');
        
        $cont=0;
        
        while($cont < count($folio))
          {
            $detalle = new DetallePago;
            $detalle->id_orden_pago = $ordenPago->id_orden_pago;
            $detalle->folio = $folio[$cont];
            $detalle->importe = $total[$cont];
            $detalle->fecha_pago = $fecha[$cont];
            $detalle->save();
            $cont = $cont + 1;
          }
          
            DB::commit();
          } 
          catch (Exception $e) 
          {
            //Si existe algún error en la Transacción
            DB::rollback(); //Anular los cambios en la DB
          }
        return redirect()->route('ordenpago.create',[$ordenPago])->with('status','Informacion Guardada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\OrdenPago  $ordenPago
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenPago $ordenPago)
    {
      return view('pago.show',compact('ordenPago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\OrdenPago  $ordenPago
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenPago $ordenPago)
    {
        return view('pago.edit',compact('ordenPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\OrdenPago  $ordenPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenPago $ordenPago)
    {
        $ordenPago->fill($request->all());
        $ordenPago->save();
        //$ordenPago=OrdenPago::all();
        return redirect()->route('ordenpago.index',[$ordenPago])->with('status','Informacion Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\OrdenPago  $ordenPago
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenPago $ordenPago)
    {
      $ordenPago = OrdenPago::findOrFail($ordenPago->id_orden_pago);
    	$ordenPago->estado = 'Cancelada'; //Cancelado
    	$ordenPago->update();
        return redirect()->route('ordenpago.index',[$ordenPago])
        ->with('status','Orden Cancelada');
    }

    public function activar(OrdenPago $ordenPago)
    {
      $ordenPago = OrdenPago::findOrFail($ordenPago->id_orden_pago);
    	$ordenPago->estado = 'Activa'; //Activado
    	$ordenPago->update();
        return redirect()->route('ordenpago.index',[$ordenPago])
        ->with('status','Orden Activada');
    }
}
