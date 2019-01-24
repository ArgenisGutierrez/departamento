<?php

namespace departamento\Imports;

use departamento\taller;
use Maatwebsite\Excel\Concerns\ToModel;

class TallerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new taller([
          'nombre'   => $row[0],
          'sucursal'   => $row[1],
          'telefono'   => $row[2],
          'correo'   => $row[3],
        ]);
    }
}
