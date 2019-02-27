<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class unidad extends Model
{
  protected $table='unidad';
  protected $primaryKey='id_unidad';
  public $timestamp=false;
  protected $fillable=[
      'marca',
      'tipo',
      'modelo',
      'serie',
      'no_economico',
      'cil',
      'uso',
      'familia',
      'area',
      'placa',
      'color',
      'propiedad',
      'patrulla_civil',
      'ubicacion',
      'localidad',
      'adscripcion'
    ];
    public function ordenes()
    {
      return $this->hasMany('departamento\orden','id_orden');
    }
}
