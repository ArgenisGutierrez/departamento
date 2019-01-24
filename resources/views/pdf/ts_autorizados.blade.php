<?php $ordenes=departamento\orden::all();
$areas=departamento\Area::all();
$talleres=departamento\taller::all();
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
@if($orden->estado=="Activa")
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
@endforeach
