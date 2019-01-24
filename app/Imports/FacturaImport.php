<?php

namespace departamento\Imports;

use departamento\factura;
use Maatwebsite\Excel\Concerns\ToModel;

class FacturaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new factura([
            $factura->folio=$row->folio,
            $factura->importe=$row->importe,
            $factura->fecha=$row->fecha,
            $factura->fecha_envio_area=$row->fecha_envio_area,
            $factura->fecha_recibo_area=$row->fecha_recibo_area
        ]);
    }
}
