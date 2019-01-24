<?php
$ordenes=departamento\orden::all();
$areas=departamento\Area::all();
$talleres=departamento\taller::all();
$tpm=0;
$tcm=0;
$tem=0;
$tpv=0;
$tcv=0;
$tev=0;
$contador1=1;
$contador2=1;
$subt1=0;
$subt2=0;
$subt3=0;
$subt4=0;
$subt5=0;
$subt6=0;
$fecha=explode(" ",$fecha);
$fecha_inicio=strtotime($fecha[0]);
$fecha_final=strtotime($fecha[2]);
?>


@foreach($ordenes as $orden)
<?php $fecha_elegida=strtotime($orden->fecha); ?>
@if($orden->estado=="Activa")
@if($fecha_elegida>=$fecha_inicio && $fecha_elegida<=$fecha_final)
@if($orden->correctivo==="si")
@if($orden->unidad->familia==="Motocicleta")
  <?php $tcm++ ?>
@else
  <?php $tcv++ ?>
@endif
@endif

@if($orden->preventivo==="si")
@if($orden->unidad->familia==="Motocicleta")
  <?php $tpm++ ?>
@else
  <?php $tpv++ ?>
@endif
@endif

@if($orden->enllantamiento==="si")
@if($orden->unidad->familia==="Motocicleta")
  <?php $tem++ ?>
@else
  <?php $tev++ ?>
@endif
@endif
@endif
@endif
@endforeach

<img src="imagenes/logo1.jpg" alt="" style="width: 730px; height: 65px;">
<h3>Programa Emergente para la Rehabilitación de Vehículos Operativos</h3>
<h3>{{$fecha[0]}} - {{$fecha[2]}}</h3>
<table width="100%">
  <tr>
    <th id="resaltar">Secretaria de Seguridad Publica</th>
    <th id="resaltar">Motos</th>
    <th id="resaltar">Vehiculos</th>
  </tr>
  <tr>
    <th>Servicios de Mantenimiento Preventivo</th>
    <th>{{$tpm}}</th>
    <th>{{$tpv}}</th>
  </tr>
  <tr>
    <th>Servicios Mecánicos Correctivos </th>
    <th>{{$tcm}}</th>
    <th>{{$tcv}}</th>
  </tr>
  <tr>
    <th>Servicios de Enllantado</th>
    <th>{{$tem}}</th>
    <th>{{$tev}}</th>
  </tr>
  <tr>
    <th id="resaltar">Subtotal</th>
    <?php $subt1=$tcm+$tpm+$tem;
    $subt2=$tcv+$tpv+$tev;?>
    <th id="resaltar">{{$subt1}}</th>
    <th id="resaltar">{{$subt2}}</th>
  </tr>
  <tr>
    <td id="resaltar">Total</td>
    <?php $total=$subt1+$subt2 ?>
    <td colspan="2" id="resaltar">{{$total}}</td>
  </tr>
</table>

<?php
$tpm=0;
$tcm=0;
$tem=0;
$tpv=0;
$tcv=0;
$tev=0;
$subt1=0;
$subt2=0;
$subt3=0;
$subt4=0;
$subt5=0;
$subt6=0;
?>
<h4>Desglose de Mantenimiento por Área: </h4>
<table width="100%">
  <tr>
    <td rowspan="2" id="resaltar">N°</td>
    <td rowspan="2" style="width:400px;" id="resaltar">Area</td>
    <td colspan="2" id="resaltar">Preventivo</td>
    <td colspan="2" id="resaltar">Correctivo</td>
    <td colspan="2" id="resaltar">Enllantado</td>
  </tr>
  <tr>
    <td id="resaltar">Motos</td>
    <td id="resaltar">Vehi</td>
    <td id="resaltar">Motos</td>
    <td id="resaltar">Vehi</td>
    <td id="resaltar">Motos</td>
    <td id="resaltar">Vehi</td>
  </tr>
  @foreach($areas as $area)
  @foreach($ordenes as $orden)
  <?php $fecha_elegida=strtotime($orden->fecha); ?>
  @if($fecha_elegida>=$fecha_inicio && $fecha_elegida<=$fecha_final)
  @if($area->nombre===$orden->area->nombre)
  @if($orden->correctivo==="si")
  @if($orden->unidad->familia==="Motocicleta")
    <?php $tcm++ ?>
  @else
    <?php $tcv++ ?>
  @endif
  @endif

  @if($orden->preventivo==="si")
  @if($orden->unidad->familia==="Motocicleta")
    <?php $tpm++ ?>
  @else
    <?php $tpv++ ?>
  @endif
  @endif

  @if($orden->enllantamiento==="si")
  @if($orden->unidad->familia==="Motocicleta")
    <?php $tem++ ?>
  @else
    <?php $tev++ ?>
  @endif
  @endif
  @endif
  @endif
  @endforeach
  <tr>
    <td>{{$contador1++}}</td>
    <td>{{$area->nombre}}</td>
    <td>{{$tpm}}</td>
    <td>{{$tpv}}</td>
    <td>{{$tcm}}</td>
    <td>{{$tcv}}</td>
    <td>{{$tem}}</td>
    <td>{{$tev}}</td>
  </tr>
  <?php
  $subt1=$subt1+$tpm;
  $subt2=$subt2+$tpv;
  $subt3=$subt3+$tcm;
  $subt4=$subt4+$tcv;
  $subt5=$subt5+$tem;
  $subt6=$subt6+$tev;
   ?>
   <?php
   $tpm=0;
   $tcm=0;
   $tem=0;
   $tpv=0;
   $tcv=0;
   $tev=0; ?>
  @endforeach
  <?php $total= $subt1+$subt2+$subt3+$subt4+$subt5+$subt6?>
  <tr>
    <td colspan="2" id="resaltar">Subtotal</td>
    <td id="resaltar">{{$subt1}}</td>
    <td id="resaltar">{{$subt2}}</td>
    <td id="resaltar">{{$subt3}}</td>
    <td id="resaltar">{{$subt4}}</td>
    <td id="resaltar">{{$subt5}}</td>
    <td id="resaltar">{{$subt6}}</td>
  </tr>
  <tr>
    <td colspan="2" id="resaltar">Total</td>
    <td colspan="6" id="resaltar">{{$total}}</td>
  </tr>
</table>

<?php
$tpm=0;
$tcm=0;
$tem=0;
$tpv=0;
$tcv=0;
$tev=0;
$subt1=0;
$subt2=0;
$subt3=0;
$subt4=0;
$subt5=0;
$subt6=0;
?>
<h4>Desglose de Mantenimiento por Proveedor: </h4>
<table width="100%">
  <tr>
    <td rowspan="2" id="resaltar">N°</td>
    <td rowspan="2" style="width:400px;" id="resaltar">Proveedor Adjudicado</td>
    <td colspan="2" id="resaltar">Preventivo</td>
    <td colspan="2" id="resaltar">Correctivo</td>
    <td colspan="2" id="resaltar">Enllantado</td>
  </tr>
  <tr>
    <td id="resaltar">Motos</td>
    <td id="resaltar">Vehi</td>
    <td id="resaltar">Motos</td>
    <td id="resaltar">Vehi</td>
    <td id="resaltar">Motos</td>
    <td id="resaltar">Vehi</td>
  </tr>
  @foreach($talleres as $taller)

    @foreach($ordenes as $orden)
    <?php $fecha_elegida=strtotime($orden->fecha); ?>
      @if($fecha_elegida>=$fecha_inicio && $fecha_elegida<=$fecha_final)
        @if($taller->nombre==$orden->taller->nombre)

          @if($orden->correctivo==="si")
            @if($orden->unidad->familia==="Motocicleta")
              <?php $tcm++ ?>
            @else
              <?php $tcv++ ?>
            @endif
          @endif

          @if($orden->preventivo==="si")
            @if($orden->unidad->familia==="Motocicleta")
              <?php $tpm++ ?>
            @else
              <?php $tpv++ ?>
            @endif
          @endif

          @if($orden->enllantamiento==="si")
            @if($orden->unidad->familia==="Motocicleta")
              <?php $tem++ ?>
            @else
              <?php $tev++ ?>
            @endif
          @endif

        @endif
      @endif

    @endforeach
  <tr>
    <td>{{$contador2++}}</td>
    <td>{{$taller->nombre}}</td>
    <td>{{$tpm}}</td>
    <td>{{$tpv}}</td>
    <td>{{$tcm}}</td>
    <td>{{$tcv}}</td>
    <td>{{$tem}}</td>
    <td>{{$tev}}</td>
  </tr>
  <?php
  $subt1=$subt1+$tpm;
  $subt2=$subt2+$tpv;
  $subt3=$subt3+$tcm;
  $subt4=$subt4+$tcv;
  $subt5=$subt5+$tem;
  $subt6=$subt6+$tev;
  ?>
  <?php
  $tpm=0;
  $tcm=0;
  $tem=0;
  $tpv=0;
  $tcv=0;
  $tev=0; ?>
  @endforeach
  <?php $total= $subt1+$subt2+$subt3+$subt4+$subt5+$subt6?>
  <tr>
    <td colspan="2" id="resaltar">Subtotal</td>
    <td id="resaltar">{{$subt1}}</td>
    <td id="resaltar">{{$subt2}}</td>
    <td id="resaltar">{{$subt3}}</td>
    <td id="resaltar">{{$subt4}}</td>
    <td id="resaltar">{{$subt5}}</td>
    <td id="resaltar">{{$subt6}}</td>
  </tr>
  <tr>
    <td colspan="2" id="resaltar">Total</td>
    <td colspan="6" id="resaltar">{{$total}}</td>
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
  th{
    border-collapse: collapse;
    border: 1px solid rgb(0, 0, 0);
    text-align: center;
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
