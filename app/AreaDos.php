<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class AreaDos extends Model
{
  protected $table='areados';
  protected $primaryKey='id_area_dos';
  public $timestamp=false;
  protected $fillable=[
    'encargado',
    'cargo'
  ];
  public function ordenes()
  {
      return $this->hasMany('departamento\orden','id_orden');
  }
}
