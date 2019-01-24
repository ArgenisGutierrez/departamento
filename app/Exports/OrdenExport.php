<?php

namespace departamento\Exports;

use departamento\orden;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdenExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exportordenes', [
            'ordenes' => orden::all()
        ]);
    }
}
