<?php

namespace departamento\Http\Controllers;

use departamento\taller;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $talleres=taller::all();
      return view('taller.index',compact('talleres'));
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

        if ($request->hasFile('logo')) {
          $file=$request->file('logo');
          $nombre=time().$file->getClientOriginalName();
          $file->move(public_path().'/imagenes/',$nombre);
          $taller->logo= $nombre;
        }
        $taller= new taller();
        $taller->nombre= $request->input('nombre');
        $taller->sucursal= $request->input('sucursal');
        $taller->telefono= $request->input('telefono');
        $taller->correo= $request->input('correo');
        $taller->save();

        DB::commit();
      } 
      catch (Exception $e) 
      {
    		//Si existe algún error en la Transacción
    		DB::rollback(); //Anular los cambios en la DB
    	}
      return redirect()->route('taller.create',[$taller])->with('status3','Informacion Guardada Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function show(taller $taller)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function edit(taller $taller)
    {
        return view('taller.edit',compact('taller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, taller $taller)
    {
      if ($request->hasFile('logo')) {
        $file=$request->file('logo');
        $nombre=time().$file->getClientOriginalName();
        $file->move(public_path().'/imagenes/',$nombre);
      }
      $taller->nombre= $request->input('nombre');
      $taller->sucursal= $request->input('sucursal');
      $taller->telefono= $request->input('telefono');
      $taller->correo= $request->input('correo');
      $taller->logo= $nombre;
      $taller->save();
      return redirect()->route('taller.index',[$taller])->with('status3','Informacion Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\taller  $taller
     * @return \Illuminate\Http\Response
     */
    public function destroy(taller $taller)
    {
        $taller->delete();
        return redirect()->route('taller.index',[$taller])->with('status3','Informacion Eliminada  Correctamente');
    }


}
