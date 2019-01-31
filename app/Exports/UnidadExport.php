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
            'marca',
            'tipo',
            'modelo',
            'serie',
            'no_economico',
            'cil',
            'uso',
            'familia',
            'area',
            'placa_anterior',
            'placa_actual',
            'color',
            'propiedad',
            'patrulla_civil',
            'estatus',
            'motivo_inactividad',
            'ubicacion',
            'localidad',
            'adscripcion',
            'nombre_adscripcion',
            'propietario',
            'Fecha de Actualizacion',
            'Fecha de Creacion'
        ];
    }
}
