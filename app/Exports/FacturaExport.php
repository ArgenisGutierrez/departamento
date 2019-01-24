<?php

namespace departamento\Exports;

use departamento\factura;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FacturaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exportfacturas', [
            'facturas' => factura::all()
        ]);
    }
}
