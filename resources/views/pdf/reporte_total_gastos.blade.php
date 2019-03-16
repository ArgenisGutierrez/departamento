<?php
$facturas=departamento\factura::all();
$pagos=departamento\OrdenPago::all();
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
foreach ($pagos as $pago) {
  if ($pago->estado=="Activa") {
    $mes=explode("-",$pago->fecha);
  if ($mes[0]==$fecha) {
    if ($mes[1]==1) {
      $enero=$enero+$pago->total;
    }

    if ($mes[1]==2) {
      $febrero=$febrero+$pago->total;
    }

    if ($mes[1]==3) {
      $marzo=$marzo+$pago->total;
    }

    if ($mes[1]==4) {
      $abril=$abril+$pago->total;
    }

    if ($mes[1]==5) {
      $mayo=$mayo+$pago->total;
    }

    if ($mes[1]==6) {
      $junio=$junio+$pago->total;
    }

    if ($mes[1]==7) {
      $julio=$julio+$pago->total;
    }

    if ($mes[1]==8) {
      $agosto=$agosto+$pago->total;
    }

    if ($mes[1]==9) {
      $septiembre=$septiembre+$pago->total;
    }

    if ($mes[1]==10) {
      $octubre=$octubre+$pago->total;
    }

    if ($mes[1]==11) {
      $noviembre=$noviembre+$pago->total;
    }

    if ($mes[1]==12) {
      $diciembre=$diciembre+$pago->total;
    }
  }
  }
}
$total_meses=$enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre
+$octubre+$noviembre+$diciembre;


$ordenes=departamento\orden::all();

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


$pagos=departamento\OrdenPago::all();
  //obtengo areas
  $areas=[];
  $areas_total=[];
  $i=0;
  foreach ($pagos as $pago) {
    if ($pago->estado=="Activa") {
      $año=explode("-",$pago->fecha);
      if ($año[0]==$fecha) {
        $areas[$i]= $pago->area;
        $i++;
      }
    }
  }
  $areas=array_unique($areas);//elimino repetidas
  
  
  foreach ($areas as $area) {
    foreach ($pagos as $pago) {
      if ($pago->estado=="Activa") {
        $año=explode("-",$pago->fecha);
        if ($año[0]==$fecha) {
          if ($area==$pago->area) {
            $areas_total[]+=$pago->total;
          }
        }
      }
    }
  }
  $total_areas=0;
  foreach ($areas_total as $total) {
    $total_areas+=$total;
  }
  $numero=count($areas);
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
    <td>${{number_format($enero, 2)}}</td>
  </tr>
  <tr>
    <td>Febrero</td>
    <td>${{number_format($febrero, 2)}}</td>
  </tr>
  <tr>
    <td>Marzo</td>
    <td>${{number_format($marzo, 2)}}</td>
  </tr>
  <tr>
    <td>Abril</td>
    <td>${{number_format($abril, 2)}}</td>
  </tr>
  <tr>
    <td>Mayo</td>
    <td>${{number_format($mayo, 2)}}</td>
  </tr>
  <tr>
    <td>Junio</td>
    <td>${{number_format($junio, 2)}}</td>
  </tr>
  <tr>
    <td>Juilio</td>
    <td>${{number_format($julio, 2)}}</td>
  </tr>
  <tr>
    <td>Agosto</td>
    <td>${{number_format($agosto, 2)}}</td>
  </tr>
  <tr>
    <td>Septiembre</td>
    <td>${{number_format($septiembre, 2)}}</td>
  </tr>
  <tr>
    <td>Octubre</td>
    <td>${{number_format($octubre, 2)}}</td>
  </tr>
  <tr>
    <td>Noviembre</td>
    <td>${{number_format($noviembre, 2)}}</td>
  </tr>
  <tr>
    <td>Diciembre</td>
    <td>${{number_format($diciembre, 2)}}</td>
  </tr>
  <tr id="resaltar">
    <td>Total de Gastos</td>
    <td>${{number_format($total_meses, 2)}}</td>
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
  for ($i=0; $i < $numero; $i++) { 
    ?>
    <tr>
  <td>{{$areas[$i]}}</td>
  <td>${{number_format($areas_total[$i], 2)}}</td>
</tr>
<?php
  }
  ?>
<tr id="resaltar">
  <td>Total de Gastos</td>
  <td>${{number_format($total_areas, 2)}}</td>
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
