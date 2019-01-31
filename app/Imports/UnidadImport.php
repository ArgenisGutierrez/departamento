<?php

namespace departamento\Imports;

use departamento\unidad;
use Maatwebsite\Excel\Concerns\ToModel;

class UnidadImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new unidad([
          'marca'   => $row[0],
          'tipo'   => $row[1],
          'modelo'   => $row[2],
          'serie'   => $row[3],
          'no_economico'   => $row[4],
          'cil'   => $row[5],
          'uso'   => $row[6],
          'familia'   => $row[7],
          'area'   => $row[8],
          'placa_anterior'   => $row[9],
          'placa_actual'   => $row[10],
          'color'   => $row[11],
          'propiedad'   => $row[12],
          'patrulla_civil'   => $row[13],
          'estatus'   => $row[14],
          'motivo_inactividad'   => $row[15],
          'ubicacion'   => $row[16],
          'localidad'   => $row[17],
          'adscripcion'   => $row[18],
          'nombre_adscripcion'   => $row[19],
          'propietario'   => $row[20],
        ]);
    }
}
