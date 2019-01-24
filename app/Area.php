<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $table='area';
  protected $primaryKey='id_area';
  public $timestamp=false;
  protected $fillable=[
    'nombre',
    'encargado',
    'cargo'
  ];
  public function ordenes()
  {
      return $this->hasMany('departamento\orden','id_orden');
  }
}
