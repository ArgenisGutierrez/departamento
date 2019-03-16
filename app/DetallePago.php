<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class DetallePago extends Model
{
  protected $table='detallepago';
  protected $primaryKey='id_detallepago';
  public $timestamp=false;
  protected $fillable=[
    'id_orden_pago',
    'folio',
    'importe',
    'fecha'
];
}
