<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
  protected $table='factura';
  protected $primaryKey='id_factura';
  public $timestamp=false;
  protected $fillable=[
    'id_orden',
    'folio',
    'importe',
    'fecha',
    'fecha_envio_area',
    'fecha_recibo_area'
  ];
  public function orden()
  {
      return $this->belongsTo('departamento\orden','id_orden');
  }
}
