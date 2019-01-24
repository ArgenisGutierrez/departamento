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
          'placa'   => $row[2],
          'modelo'   => $row[3],
          'serie'   => $row[4],
          'no_economico'   => $row[5],
          'cil'   => $row[6],
          'uso'   => $row[7],
          'familia'   => $row[8],
        ]);
    }
}
