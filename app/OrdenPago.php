<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class OrdenPago extends Model
{
    protected $table='ordenpago';
  protected $primaryKey='id_orden_pago';
  public $timestamp=false;
  protected $fillable=[
    'no_tramite',
    'area',
    'serie',
    'total',
    'fecha'
  ];
}
