<?php

namespace departamento;

use Illuminate\Database\Eloquent\Model;

class archivo extends Model
{
  protected $table='archivos';
  protected $primaryKey='id_archivo';
  public $timestamp=false;
  protected $fillable=[
    'oficio_solicitud_pdf',
    'cotizacion_pdf',
    'dictamen_tecnico_pdf',
    'factura_pdf',
    'acuse_recibo_area_pdf',
    'oficio_solicitud_xml',
    'cotizacion_xml',
    'dictamen_tecnico_xml',
    'factura_xml',
    'acuse_recibo_area_xml'
  ];

  public function orden()
  {
      return $this->belongsTo('departamento\orden','id_orden');
  }
}
