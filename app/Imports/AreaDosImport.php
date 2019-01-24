<?php

namespace departamento\Imports;

use departamento\AreaDos;
use Maatwebsite\Excel\Concerns\ToModel;

class AreaDosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AreaDos([
            'encargado'   => $row[0],
            'cargo'   => $row[1],
        ]);
    }
}
