<?php

namespace departamento\Http\Controllers;

use departamento\archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos=archivo::all();
        return view('archivo.index',compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registros.archivo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $archivo= new archivo();
      $archivo->id_orden=$request->input('id_orden');

        $file=$request->file('oficio_solicitud_pdf');
        $nombre=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre);
      $archivo->oficio_solicitud_pdf= $nombre;

        $file=$request->file('cotizacion_pdf');
        $nombre1=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre1);

      $archivo->cotizacion_pdf= $nombre1;

        $file=$request->file('dictamen_tecnico_pdf');
        $nombre3=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre3);

      $archivo->dictamen_tecnico_pdf= $nombre3;

        $file=$request->file('factura_pdf');
        $nombre4=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre4);

      $archivo->factura_pdf= $nombre4;

        $file=$request->file('acuse_recibo_area_pdf');
        $nombre5=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre5);

      $archivo->acuse_recibo_area_pdf= $nombre5;
      $archivo->id_orden=$request->input('id_orden');

        $file=$request->file('oficio_solicitud_xml');
        $nombre6=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre6);
      $archivo->oficio_solicitud_xml= $nombre6;

        $file=$request->file('cotizacion_xml');
        $nombre7=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre7);

      $archivo->cotizacion_xml= $nombre7;

        $file=$request->file('dictamen_tecnico_xml');
        $nombre8=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre8);

      $archivo->dictamen_tecnico_xml= $nombre8;

        $file=$request->file('factura_xml');
        $nombre9=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre9);

      $archivo->factura_xml= $nombre9;

        $file=$request->file('acuse_recibo_area_xml');
        $nombre10=time().$file->getClientOriginalName();
        $file->move(public_path().'/archivos/',$nombre10);

      $archivo->acuse_recibo_area_xml= $nombre10;
      $archivo->save();
      return view('registros.archivo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \departamento\archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(archivo $archivo)
    {
        return view('archivo.show',compact('archivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \departamento\archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(archivo $archivo)
    {
        return view('archivo.edit',compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \departamento\archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, archivo $archivo)
    {

      $archivos=archivo::all();
      return view('archivo.index',compact('archivos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \departamento\archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(archivo $archivo)
    {
        $archivo->delete();
        $archivos=archivo::all();
        return view('archivo.index',compact('archivos'));
    }
    public function acuse_recibo_area_pdf(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->acuse_recibo_area_pdf;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
    public function oficio_solicitud_pdf(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->oficio_solicitud_pdf;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
    public function cotizacion_pdf(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->cotizacion_pdf;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
    public function dictamen_tecnico_pdf(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->dictamen_tecnico_pdf;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
    public function factura_pdf(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->factura_pdf;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }

    public function acuse_recibo_area_xml(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->acuse_recibo_area_xml;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
    public function oficio_solicitud_xml(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->oficio_solicitud_xml;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
    public function cotizacion_xml(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->cotizacion_xml;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
    public function dictamen_tecnico_xml(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->dictamen_tecnico_xml;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
    public function factura_xml(archivo $archivo)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        $nombre=$archivo->factura_xml;
        $ruta='../public/archivos/'.$nombre;
        return Response()->download($ruta);
    }
}
