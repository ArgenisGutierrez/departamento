<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
  protected $table='detalle';
  protected $primaryKey='id_detalle';
  public $timestamp=false;
  protected $fillable=[
    'id_orden',
    'id_servicio',
    'cantidad',
    'subtotal',
];

  public function orden()
  {
    return $this->belongsTo('departamento\orden','id_orden');
  }
  public function servicio()
  {
    return $this->belongsTo('departamento\servicio','id_servicio');
  }
}
