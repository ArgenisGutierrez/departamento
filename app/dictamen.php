<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class dictamen extends Model
{
  protected $table='dictamen';
  protected $primaryKey='id';
  public $timestamp=false;
  protected $fillable=[
    'jefe_oficina',
    'jefe_departamento',
    'jefe_unidad'
  ];
}
