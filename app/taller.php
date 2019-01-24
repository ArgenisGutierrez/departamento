<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class taller extends Model
{
  protected $table='taller';
  protected $primaryKey='id_taller';
  public $timestamp=false;
  protected $fillable=[
    'nombre',
    'sucursal',
    'telefono',
    'correo',
    'logo'
  ];
  public function ordenes()
  {
      return $this->hasMany('departamento\orden','id_orden');
  }
}
