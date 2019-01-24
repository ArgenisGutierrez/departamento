<?php

namespace departamento\Imports;

use departamento\orden;
use Maatwebsite\Excel\Concerns\ToModel;

class OrdenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new orden([
            $orden->folio_dpa=$row->folio_dpa,
            $orden->no_oficio=$row->no_oficio,
            $orden->fecha=$row->fecha,
            $orden->id_area->$row->id_area,
            $orden->id_area_dos=$row->id_area_dos,
            $orden->servicio=$row->servicio,
            $orden->correctivo=$row->correctivo,
            $orden->preventivo=$row->preventivo,
            $orden->enllantamiento=$row->enllantamiento,
            $orden->refacciones=$row->refacciones,
            $orden->mano_obra=$row->mano_obra,
            $orden->id_unidad=$row->id_unidad,
            $orden->km=$row->km,
            $orden->id_taller=$row->id_taller,
            $orden->importe_cotizacion=$row->importe_cotizacion,
            $orden->fecha_ingreso=$row->fecha_ingreso,
            $orden->fecha_salida=$row->fecha_salida,
            $orden->id_usuario=$row->id_usuario
        ]);
    }
}
