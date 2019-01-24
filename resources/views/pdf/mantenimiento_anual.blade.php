<?php
$ordenes=departamento\orden::all();
$tpm=0;
$tcm=0;
$tem=0;
$tpp=0;
$tcp=0;
$tep=0;
$tps=0;
$tcs=0;
$tes=0;
$tpc=0;
$tcc=0;
$tec=0;
 ?>
 @foreach($ordenes as $orden)
 <?php $año=explode("-",$orden->fecha)?>
 @if($orden->estado=="Activa")
 @if($año[0]==$fecha)
 @if($orden->correctivo==="si")
   @if($orden->unidad->familia==="Motocicleta")
   <?php $tcm++ ?>
   @endif

   @if($orden->unidad->familia==="Camion")
   <?php $tcc++ ?>
   @endif

   @if($orden->unidad->familia==="Sedan")
   <?php $tcs++ ?>
   @endif

   @if($orden->unidad->familia==="Pickup")
   <?php $tcp++ ?>
   @endif

 @endif

 @if($orden->preventivo==="si")
 @if($orden->unidad->familia==="Motocicleta")
 <?php $tpm++ ?>
 @endif

 @if($orden->unidad->familia==="Camion")
 <?php $tpc++ ?>
 @endif

 @if($orden->unidad->familia==="Sedan")
 <?php $tps++ ?>
 @endif

 @if($orden->unidad->familia==="Pickup")
 <?php $tpp++ ?>
 @endif
 @endif

 @if($orden->enllantamiento==="si")
 @if($orden->unidad->familia==="Motocicleta")
 <?php $tem++ ?>
 @endif

 @if($orden->unidad->familia==="Camion")
 <?php $tec++ ?>
 @endif

 @if($orden->unidad->familia==="Sedan")
 <?php $tes++ ?>
 @endif

 @if($orden->unidad->familia==="Pickup")
 <?php $tep++ ?>
 @endif
 @endif
 @endif
 @endif
 @endforeach
<?php
  $tm=$tem+$tpm+$tcm;
  $tc=$tec+$tpc+$tcc;
  $ts=$tes+$tps+$tcs;
  $tp=$tep+$tpp+$tcp;
  $total=$tm+$tc+$ts+$tp;
 ?>
<img src="imagenes/logo1.jpg" alt="" style="width: 730px; height: 65px;">
<h1>Reporte de Mantenimiento - Oficina de Maquinaria</h1>
<hr>
<h3 style="text-align:center">Servicios Efectuados para el Año {{$fecha}}</h3>
<table>
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Enllantado</th>
      <th>Preventivo</th>
      <th>Correctivo</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Motocicleta</td>
      <td>{{$tem}}</td>
      <td>{{$tpm}}</td>
      <td>{{$tcm}}</td>
      <td>{{$tm}}</td>
    </tr>
    <tr>
      <td>Camioneta</td>
      <td>{{$tep}}</td>
      <td>{{$tpp}}</td>
      <td>{{$tcp}}</td>
      <td>{{$tp}}</td>
    </tr>
    <tr>
      <td>Sedan</td>
      <td>{{$tes}}</td>
      <td>{{$tps}}</td>
      <td>{{$tcs}}</td>
      <td>{{$ts}}</td>
    </tr>
    <tr>
      <td>Camion</td>
      <td>{{$tec}}</td>
      <td>{{$tpc}}</td>
      <td>{{$tcc}}</td>
      <td>{{$tc}}</td>
    </tr>
    <tr>
      <td colspan="2" ></td>
      <td colspan="2">Total de Servicios</td>
      <td>{{$total}}</td>
    </tr>
  </tbody>
</table>

<style media="screen">
  td,th{
    border: 1px solid rgb(0, 0, 0);
    text-align: center;
    word-wrap: break-word;
  }
  table{
    border-collapse: collapse;
    border: 1px solid rgb(0, 0, 0);
    word-wrap: break-word;
  }
</style>
