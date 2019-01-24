<?php
$facturas=departamento\factura::all();
$enero=0;
$febrero=0;
$marzo=0;
$abril=0;
$mayo=0;
$junio=0;
$julio=0;
$agosto=0;
$septiembre=0;
$octubre=0;
$noviembre=0;
$diciembre=0;
foreach ($facturas as $factura) {
  $mes=explode("-",$factura->fecha);
  if ($mes[0]==$fecha) {
    if ($mes[1]==1) {
      $enero=$enero+$factura->importe;
    }

    if ($mes[1]==2) {
      $febrero=$febrero+$factura->importe;
    }

    if ($mes[1]==3) {
      $marzo=$marzo+$factura->importe;
    }

    if ($mes[1]==4) {
      $abril=$abril+$factura->importe;
    }

    if ($mes[1]==5) {
      $mayo=$mayo+$factura->importe;
    }

    if ($mes[1]==6) {
      $junio=$junio+$factura->importe;
    }

    if ($mes[1]==7) {
      $julio=$julio+$factura->importe;
    }

    if ($mes[1]==8) {
      $agosto=$agosto+$factura->importe;
    }

    if ($mes[1]==9) {
      $septiembre=$septiembre+$factura->importe;
    }

    if ($mes[1]==10) {
      $octubre=$octubre+$factura->importe;
    }

    if ($mes[1]==11) {
      $noviembre=$noviembre+$factura->importe;
    }

    if ($mes[1]==12) {
      $diciembre=$diciembre+$factura->importe;
    }
  }
}
$total_meses=$enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre
+$octubre+$noviembre+$diciembre;

$ordenes=departamento\orden::all();
$areas=departamento\Area::all();
$total_area=0;
$totales_area[]=[];
$nombres_area[]=[];
$i=0;

foreach ($areas as $area) {
  foreach ($ordenes as $orden) {
    if ($orden->estado=="Activa") {
      $año=explode("-",$orden->fecha);
      if ($año[0]==$fecha) {
        if ($area->nombre===$orden->area->nombre) {
          if ($orden->factura==null) {
          }
          else {
            $total_area=$total_area+$orden->factura->importe;
          }
        }
      }
    }
  }
  $totales_area[$i]=$total_area;
  $nombres_area[$i]=$area->nombre;
  $i++;
  $total_area=0;


  $talleres=departamento\taller::all();
  $total_taller=0;
  $totales_taller[]=[];
  $nombres_taller[]=[];
  $x=0;

  foreach ($talleres as $taller) {
    foreach ($ordenes as $orden) {
      if ($orden->estado=="Activa") {
        $año=explode("-",$orden->fecha);
        if ($año[0]==$fecha) {
          if ($taller->nombre===$orden->taller->nombre) {
            if ($orden->factura==null) {
            }
            else {
              $total_taller=$total_taller+$orden->factura->importe;
            }
          }
        }
      }
    }
    $totales_taller[$x]=$total_taller;
    $nombres_taller[$x]=$taller->nombre;
    $x++;
    $total_taller=0;
  }
}
 ?>
<img src="imagenes/logo1.jpg" alt="" style="width: 730px; height: 65px;">
<h3>Gastos por mes en el año {{$fecha}}</h3>
<table width="100%">
  <tr id="resaltar">
    <td>Mes</td>
    <td>Total de Gasto</td>
  </tr>
  <tr>
    <td>Enero</td>
    <td>$ {{$enero}}</td>
  </tr>
  <tr>
    <td>Febrero</td>
    <td>$ {{$febrero}}</td>
  </tr>
  <tr>
    <td>Marzo</td>
    <td>$ {{$marzo}}</td>
  </tr>
  <tr>
    <td>Abril</td>
    <td>$ {{$abril}}</td>
  </tr>
  <tr>
    <td>Mayo</td>
    <td>$ {{$mayo}}</td>
  </tr>
  <tr>
    <td>Junio</td>
    <td>$ {{$junio}}</td>
  </tr>
  <tr>
    <td>Juilio</td>
    <td>$ {{$julio}}</td>
  </tr>
  <tr>
    <td>Agosto</td>
    <td>$ {{$agosto}}</td>
  </tr>
  <tr>
    <td>Septiembre</td>
    <td>$ {{$septiembre}}</td>
  </tr>
  <tr>
    <td>Octubre</td>
    <td>$ {{$octubre}}</td>
  </tr>
  <tr>
    <td>Noviembre</td>
    <td>$ {{$noviembre}}</td>
  </tr>
  <tr>
    <td>Diciembre</td>
    <td>$ {{$diciembre}}</td>
  </tr>
  <tr id="resaltar">
    <td>Total de Gastos</td>
    <td>$ {{$total_meses}}</td>
  </tr>
</table>


<br>
<h3>Total de Gastos por Area</h3>
<table width="100%">
  <tr id="resaltar">
    <td>Nombre del Area</td>
    <td>Total de Gasto</td>
  </tr>
  <?php
for ($j=0; $j <$i ; $j++) {
  $total_area=$total_area+$totales_area[$j];
  ?>
<tr>
  <td>{{$nombres_area[$j]}}</td>
  <td>$ {{$totales_area[$j]}}</td>
</tr>
  <?php
}
   ?>
<tr id="resaltar">
  <td>Total de Gastos</td>
  <td>$ {{$total_area}}</td>
</tr>
</table>


<br>
<h3>Total de Gastos por taller</h3>
<table width="100%">
  <tr id="resaltar">
    <td>Nombre del Taller</td>
    <td>Total de Gasto</td>
  </tr>
  <?php
for ($j=0; $j <$x ; $j++) {
  $total_taller=$total_taller+$totales_taller[$j];
  ?>
<tr>
  <td>{{$nombres_taller[$j]}}</td>
  <td>$ {{$totales_taller[$j]}}</td>
</tr>
  <?php
}
   ?>
<tr id="resaltar">
  <td>Total de Gastos</td>
  <td>$ {{$total_taller}}</td>
</tr>
</table>
<style media="screen">
h3{
  text-align: center;
  font-weight: bold;
}
table{
  border-collapse: collapse;
  border: 1px solid rgb(0, 0, 0);
}
td{
  text-align: center;
  border: 1px solid rgb(0, 0, 0);
  border-collapse: collapse;
}
#resaltar{
  background: rgb(164, 164, 164);
  font-weight: bold;
}
</style>
