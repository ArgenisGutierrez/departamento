<?php

namespace departamento\Exports;

use departamento\Area;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AreaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Area::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nombre del Area',
            'Encargado',
            'Cargo',
            'Fecha de Actualizacion',
            'Fecha de Creacion'
        ];
    }
}
