<?php

namespace departamento\Imports;

use departamento\Area;
use Maatwebsite\Excel\Concerns\ToModel;

class AreaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Area([
            'nombre'   => $row[0],
            'encargado'   => $row[1],
            'cargo'   => $row[2],
        ]);
    }
}
