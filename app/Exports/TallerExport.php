<?php

namespace departamento\Exports;

use departamento\taller;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TallerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return taller::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Sucursal',
            'Telefono',
            'Correo',
            'Logo',
            'Fecha de Actualizacion',
            'Fecha de Creacion'
        ];
    }
}
