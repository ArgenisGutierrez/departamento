<?php

namespace departamento\Exports;

use departamento\OrdenPago;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdenPagoExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exportpagos', [
            'ordenes' => OrdenPago::all()
        ]);
    }

}
