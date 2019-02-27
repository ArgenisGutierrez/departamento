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
          'placa'   => $row[9],
          'color'   => $row[10],
          'propiedad'   => $row[11],
          'patrulla_civil'   => $row[12],
          'ubicacion'   => $row[13],
          'localidad'   => $row[14],
          'adscripcion'   => $row[15],
        ]);
    }
}
