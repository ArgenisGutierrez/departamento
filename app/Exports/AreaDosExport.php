<?php

namespace departamento\Exports;

use departamento\AreaDos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AreaDosExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AreaDos::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Cargo',
            'Fecha de Actualizacion',
            'Fecha de Creacion'
        ];
    }
}
