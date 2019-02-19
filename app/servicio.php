<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
  protected $table='servicio';
  protected $primaryKey='id_servicio';
  public $timestamp=false;
  protected $fillable=[
    'id_anexo',
    'nombre',
    'mano_obra',
    'refaccion'
  ];

  public function anexo()
  {
    return $this->belongsTo('departamento\anexo','id_anexo');
  }
}
