<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class anexo extends Model
{
  protected $table='anexo';
  protected $primaryKey='id_anexo';
  public $timestamp=false;
  protected $fillable=[
    'marca',
    'tipo',
    'modelo',
    'cil'
  ];

  public function servicios()
  {
      return $this->hasMany('departamento\servicio','id_anexo');
  }
}
