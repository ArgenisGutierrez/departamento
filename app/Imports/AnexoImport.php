<?php

namespace departamento\Imports;

use departamento\anexo;
use Maatwebsite\Excel\Concerns\ToModel;

class AnexoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new anexo([
          'marca'   => $row[0],
          'tipo'   => $row[1],
          'modelo'   => $row[2],
          'cil'   => $row[3],
        ]);
    }
}
