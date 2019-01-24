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
      'placa',
      'modelo',
      'serie',
      'no_economico',
      'cil',
      'uso',
      'familia'
    ];
    public function ordenes()
    {
        return $this->hasMany('departamento\orden','id_orden');
    }
}
