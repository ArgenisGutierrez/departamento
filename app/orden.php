<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
  protected $table='orden';
  protected $primaryKey='id_orden';
  public $timestamp=false;
  protected $fillable=[
    'folio_dpa',
    'no_oficio',
    'fecha',
    'id_area',
    'id_area_dos',
    'correctivo',
    'preventivo',
    'enllantamiento',
    'refacciones',
    'mano_obra',
    'id_unidad',
    'km',
    'id_taller',
    'importe_cotizacion',
    'fecha_ingreso',
    'fecha_salida',
    'estado',
    'id_usuario'
  ];
  public function area()
  {
    return $this->belongsTo('departamento\Area','id_area');
  }
  public function areados()
  {
    return $this->belongsTo('departamento\AreaDos','id_area_dos');
  }
  public function taller()
  {
    return $this->belongsTo('departamento\taller','id_taller');
  }
  public function unidad()
  {
    return $this->belongsTo('departamento\unidad','id_unidad');
  }
  public function user()
  {
    return $this->belongsTo('departamento\user','id');
  }
  public function factura()
  {
      return $this->hasOne('departamento\factura','id_factura');
  }
  public function archivos()
  {
      return $this->hasOne('departamento\archivo','id_archivo');
  }
  public function detalles()
  {
      return $this->hasMany('departamento\detalle','id_detalle');
  }
}
