<?php

namespace departamento\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use departamento\Exports\AnexoExport;
use departamento\Imports\AnexoImport;

use departamento\Exports\OrdenPAgoExport;

use departamento\Exports\ServicioExport;
use departamento\Imports\ServicioImport;

use departamento\Exports\OrdenExport;
use departamento\Imports\OrdenImport;

use departamento\Exports\TallerExport;
use departamento\Imports\TallerImport;

use departamento\Exports\UnidadExport;
use departamento\Imports\UnidadImport;

use departamento\Exports\AreaExport;
use departamento\Imports\AreaImport;

use departamento\Exports\AreaDosExport;
use departamento\Imports\AreaDosImport;

use departamento\Exports\FacturaExport;
use departamento\Imports\FacturaImport;

class ExcelController extends Controller
{
  public function index()
  {
      return view('excel.importar');
  }

  public function exportar_ordenes()
    {
        return Excel::download(new OrdenExport, 'Ordenes.xlsx');
    }

public function exportar_unidades()
  {
      return Excel::download(new UnidadExport, 'Unidades.xlsx');
  }

  public function exportar_talleres()
    {
        return Excel::download(new TallerExport, 'Talleres.xlsx');
    }

    public function exportar_areas()
      {
          return Excel::download(new AreaExport, 'Areas.xlsx');
      }

      public function exportar_areas_dos()
        {
            return Excel::download(new AreaDosExport, 'Area_Dos.xlsx');
        }

        public function exportar_facturas()
          {
              return Excel::download(new FacturaExport, 'Factura.xlsx');
          }

          public function exportar_ordenpago()
          {
              return Excel::download(new OrdenPagoExport, 'OrdenesPago.xlsx');
          }



public function importar_unidades(Request $request)
    {
      Excel::import(new UnidadImport, request()->file('Unidad'));

     return redirect('/unidad');
    }

public function importar_areas(Request $request)
    {
      Excel::import(new AreaImport, request()->file('Area'));

     return redirect('/area');
    }

public function importar_areas_dos(Request $request)
    {
      Excel::import(new AreaDosImport, request()->file('AreaDos'));

     return redirect('/area2');
    }

public function importar_talleres(Request $request)
    {
      Excel::import(new TallerImport, request()->file('Taller'));

     return redirect('/taller');
    }

public function importar_anexo(Request $request)
    {
      Excel::import(new AnexoImport, request()->file('Anexo'));

     return redirect('/anexo');
    }

public function importar_servicio(Request $request)
    {
      Excel::import(new ServicioImport, request()->file('Servicio'));

     return redirect('/anexo');
    }
}
