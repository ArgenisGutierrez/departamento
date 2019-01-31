<?php

namespace departamento\Http\Controllers;
use departamento\orden;
use departamento\taller;
use departamento\unidad;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class ReportesController extends Controller
{
  public function index()
  {
    return view('pdf.index');
  }

  public function test_servicio(taller $taller)
  {
      /**
       * toma en cuenta que para ver los mismos
       * datos debemos hacer la misma consulta
      **/
      $pdf = PDF::loadView('pdf.test_servicio', compact('taller'));
      return $pdf->download('Test_Servicio_'.$taller->nombre.'_'.'.pdf');
  }

  public function bitacora(unidad $unidad)
  {
      /**
       * toma en cuenta que para ver los mismos
       * datos debemos hacer la misma consulta
      **/
      $pdf = PDF::loadView('pdf.bitacora', compact('unidad'));
      return $pdf->download('bitacora_'.$unidad->placa.'.pdf');
  }

  public function pdf(orden $orden)
  {
      /**
       * toma en cuenta que para ver los mismos
       * datos debemos hacer la misma consulta
      **/

      $pdf = PDF::loadView('pdf.orden', compact('orden'));

      return $pdf->download('Dictamen_tecnico_'.$orden->folio_dpa.'_'.Carbon::now()->year.'.pdf');
  }

  public function total_servicios_mensual(Request $request){
    $fecha=$request->input('fecha');
    $pdf = PDF::loadView('pdf.total_servicios_mensual',compact('fecha'));
    return $pdf->download('Reporte_total_servicio-'.$fecha.'.pdf');
  }

  public function total_servicios_anual(Request $request){
    $fecha=$request->input('fecha');
    $pdf = PDF::loadView('pdf.total_servicios_anual',compact('fecha'));
    return $pdf->download('Reporte_total_servicio-'.$fecha.'.pdf');
  }

  public function mantenimiento_mensual(Request $request){
    $fecha=$request->input('fecha');
    $pdf = PDF::loadView('pdf.mantenimiento_mensual',compact('fecha'));
    return $pdf->download('Reporte_mantenimiento_mensual-'.$fecha.'.pdf');
  }

  public function mantenimiento_anual(Request $request){
    $fecha=$request->input('fecha');
    $pdf = PDF::loadView('pdf.mantenimiento_anual',compact('fecha'));
    return $pdf->download('Reporte_mantenimiento_anual-'.$fecha.'.pdf');
  }

  public function reporte_vehiculos_inactivos(){
    $pdf = PDF::loadView('pdf.reporte_vehiculos_taller_siniestrado')->setPaper('letter','landscape');
    return $pdf->download('Reporte de vehiculos en taller y siniestrados.pdf');
  }

  public function reporte_total_gastos(Request $request){
    $fecha=$request->input('fecha');
    $pdf = PDF::loadView('pdf.reporte_total_gastos',compact('fecha'));
    return $pdf->download('Reporte de gastos del año '.$fecha.'.pdf');
  }

}
