<?php

namespace departamento\Imports;

use departamento\servicio;
use Maatwebsite\Excel\Concerns\ToModel;

class ServicioImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new servicio([
          'id_anexo' => $row[0],
          'nombre'  => $row[1],
          'mano_obra' => $row[2],
          'refaccion'  => $row[3],
        ]);
    }
}
