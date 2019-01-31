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
      'placa_anterior',
      'placa_actual',
      'color',
      'propiedad',
      'patrulla_civil',
      'estatus',
      'motivo_inactividad',
      'ubicacion',
      'localidad',
      'adscripcion',
      'nombre_adscripcion',
      'propietario'
    ];
    public function ordenes()
    {
        return $this->hasMany('departamento\orden','id_orden');
    }
}
