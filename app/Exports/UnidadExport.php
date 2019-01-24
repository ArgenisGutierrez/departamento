<?php

namespace departamento\Exports;

use departamento\unidad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UnidadExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return unidad::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Marca',
            'Tipo',
            'Placa',
            'Modelo',
            'Serie',
            'No Economico',
            'Cil',
            'Uso',
            'Familia',
            'Fecha de Actualizacion',
            'Fecha de Creacion'
        ];
    }
}
