<?php

namespace departamento\Http\Controllers;

use departamento\orden;
use Illuminate\Http\Request;
use departamento\Detalle;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

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
      try {
        DB::beginTransaction();

        if ($request->input('tipo')==='correctivo') {
          $correctivo='si';
          $preventivo='no';
        }elseif ($request->input('tipo')==='preventivo') {
          $correctivo='no';
          $preventivo='si';
        }
        $id=orden::all()->last();
        if ($id==null) {
          $id=1;
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
        $orden->combustible = $request->input('combustible');
        $orden->region = $request->input('region');
        $orden->fecha_ingreso = $request->input('fecha_ingreso');
        $orden->fecha_salida = $request->input('fecha_salida');
        $orden->estado=$request->input('estado');
        $orden->id = $request->input('id');
        $orden->save();
  
          //Tabla detalle
        $id_servicio = $request->get('id_servicio'); 
        $cantidad = $request->get('cantidad');
        $subtotal = $request->get('subtotal');
        
        $cont=0;
        
        while($cont < count($id_servicio))
          {
            $detalle = new Detalle;
            $detalle->id_orden = $orden->id_orden;
            $detalle->id_servicio = $id_servicio[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->subtotal = $subtotal[$cont];
            $detalle->save();
            $cont = $cont + 1;
          }

        DB::commit();
    	} catch (Exception $e) {
    		//Si existe algún error en la Transacción
    		DB::rollback(); //Anular los cambios en la DB
    	}

      return redirect()->route('orden.index',[$orden])
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
      $orden = orden::findOrFail($orden->id_orden);
    	$orden->estado = 'Cancelada'; //Cancelado
    	$orden->update();
        return redirect()->route('orden.index',[$orden])
        ->with('status','Orden Cancelada');
    }

    public function activar(orden $orden)
    {
      $orden = orden::findOrFail($orden->id_orden);
    	$orden->estado = 'Activa'; //Activado
    	$orden->update();
        return redirect()->route('orden.index',[$orden])
        ->with('status','Orden Activada');
    }
}
