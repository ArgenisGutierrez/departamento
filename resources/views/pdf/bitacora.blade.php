<?php
  use Carbon\Carbon;
  $ordenes=departamento\orden::all();
  $facturas=departamento\factura::all();
  $contador=1;
  $total=0;
 ?>
<img src="imagenes/logo1.jpg" alt="" style="width: 730px; height: 65px;">
<table WIDTH="730px" STYLE="table-layout:fixed">
  <tr>
    <td colspan="10" style="width:730px;" id="resaltar">BITÁCORA DE MANTENIMIENTO VEHICULAR</td>
  </tr>
  <tr>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
  </tr>
  <tr>
    <td style="">Placas</td>
    <td colspan="2" id="linea">{{$unidad->placa}}</td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
  </tr>
  <tr>
    <td style="">Modelo</td>
    <td colspan="2" id="linea">{{$unidad->modelo}}</td>
    <td style=""></td>
    <td colspan="2">Dependencia</td>
    <td colspan="4" id="linea" style="font-size:10;">SECRETARÍA DE SEGURIDAD PÚBLICA</td>
  </tr>
  <tr>
    <td style="">Marca</td>
    <td colspan="2" id="linea">{{$unidad->marca}}</td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
  </tr>
  <tr>
    <td style="">Tipo</td>
    <td colspan="2" id="linea">{{$unidad->tipo}}</td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
  </tr>
  <tr>
    <td style="">CIL</td>
    <td colspan="2" id="linea">{{$unidad->cil}}</td>
    <td style=""></td>
    <td colspan="2">Área de Asignacion</td>
    @if($unidad->uso=="Operativo")
    <td colspan="4" id="linea">Unidad Operativa</td>
    @else
    <td colspan="4" id="linea">Unidad Administrativa</td>
    @endif
  </tr>
  <tr>
    <td style="font-size:10;">No. Económico</td>
    <td colspan="2" id="linea">{{$unidad->no_economico}}</td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
    <td style=""></td>
  </tr>
  <tr>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
    <td style="height: 18px; "></td>
  </tr>
</table>

<table WIDTH="730px" STYLE="table-layout:fixed">
  <tr>
    <td rowspan="2" id="resaltar" style="width: 40px; border: 1px solid rgb(0, 0, 0); font-size:10;">No.</td>
    <td colspan="2" id="resaltar" style="width: 120px; border: 1px solid rgb(0, 0, 0); font-size:10;">Fecha</td>
    <td rowspan="2" id="resaltar" style="width: 73px; border: 1px solid rgb(0, 0, 0); font-size:10;">No. Autrizacion de Reparacion</td>
    <td rowspan="2" id="resaltar" style="width: 60px; border: 1px solid rgb(0, 0, 0); font-size:10;">Kilometraje</td>
    <td rowspan="2" id="resaltar" style="width: 73px; border: 1px solid rgb(0, 0, 0); font-size:10;">Responsable del Vehiculo</td>
    <td rowspan="2" id="resaltar" style="width: 106px; border: 1px solid rgb(0, 0, 0); font-size:10;">Detalle de Mantenimiento y/o Reparacion</td>
    <td rowspan="2" id="resaltar" style="width: 73px; border: 1px solid rgb(0, 0, 0); font-size:10;">Taller</td>
    <td rowspan="2" id="resaltar" style="width: 40px; border: 1px solid rgb(0, 0, 0); font-size:10;">No. Factura</td>
    <td rowspan="2" id="resaltar" style="width: 50px; border: 1px solid rgb(0, 0, 0); font-size:10;">Importe</td>
  </tr>
  <tr>
    <td id="resaltar" style="border: 1px solid rgb(0, 0, 0);">Entrada</td>
    <td id="resaltar" style="border: 1px solid rgb(0, 0, 0);">Salida</td>
  </tr>
  @foreach($ordenes as $orden)
  <?php
  $fecha=explode("-",$orden->fecha);
   ?>
  @if($orden->estado=="Activa")
  @if($fecha[0]==Carbon::now()->year)
  @if($unidad->serie===$orden->unidad->serie)
  <tr>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">{{$contador++}}</td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">{{$orden->fecha_ingreso}}</td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">{{$orden->fecha_salida}}</td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">{{$orden->no_oficio}}</td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">{{$orden->km}}</td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">{{$orden->area->encargado}}</td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">
      <?php
      $servicios=explode(".",$orden->servicio);
      foreach ($servicios as $valor) {
        echo "$valor<br>";
      }
      ?>
    </td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">{{$orden->taller->nombre}}</td>
    @if($orden->factura==null)
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;"></td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;"></td>
    @else
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">{{$orden->factura->folio}}</td>
    <td style="border: 1px solid rgb(0, 0, 0); font-size:10;">${{$orden->factura->importe}}</td>
    <?php $total=$total+$orden->factura->importe ?>
    @endif
  </tr>
  @endif
  @endif
  @endif
  @endforeach

  <tr>
    <td colspan="8"></td>
    <td id="resaltar" style="border: 1px solid rgb(0, 0, 0);">Total</td>
    <td id="resaltar" style="border: 1px solid rgb(0, 0, 0);">$ {{$total}}</td>
  </tr>
</table>

<style>
  table{
    border-collapse: collapse;
    word-wrap: break-word;
  }
  td{
    text-align: center;
    word-wrap: break-word;
  }
  #resaltar{
    background: rgb(193, 193, 193);
  }
  #linea{
    border-bottom: 2px solid rgb(0, 0, 0);
  }
</style>
