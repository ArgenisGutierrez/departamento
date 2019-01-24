@extends('home')
@section('title','- Ordenes')
@section('content')
<?php
use Carbon\Carbon;
$ordenes=departamento\orden::all();
$años[]=[];
$i=0;?>
@foreach($ordenes as $orden)
<?php
$año=explode("-",$orden->fecha);
$años[$i]=$año[0];
$i++;
?>
@endforeach
<?php
$años=array_unique($años);
 ?>
<section class="content-header">
    <h1>
      Reportes
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Reportes</a></li>
    </ol>
  </section>
  <section class="content">
<div class="box box-solid box-primary">
<div class="box-header with-border">
<h3 class="box-title">Reporte de Total de Ordenes</h3>
<div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-default">
        <form action="{{route('servicios.anual')}}" method="GET">
          @csrf
          <label>Año:</label>
          <select class="form-control" name="fecha" required>
            @foreach($años as $año_valido)
            <option>{{$año_valido}}</option>
            @endforeach
          </select>
          <div class="box-footer">
            @can('servicios.anual')
            <input type="submit" class="btn btn-danger" value="Imprimir">
            @endcan
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box box-default">
        <form action="{{route('servicios.mensual')}}" method="GET">
          <div class="form-group">
            <label>Rango Especifico:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" autocomplete="off" class="form-control pull-right" name="fecha" id="reservation" required>
            </div><!-- /.input group -->
          </div>
          <div class="box-footer">
            @can('servicios.mensual')
            <input type="submit" value="Imprimir" class="btn btn-danger">
            @endcan
          </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- /.box-body -->
</div>


<div class="box box-solid box-info">
<div class="box-header with-border">
<h3 class="box-title">Reporte de Mantenimiento - Oficina de Maquinaria</h3>
<div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-default">
        <form action="{{route('mantenimiento.anual')}}" method="GET">
          @csrf
          <label>Año:</label>
          <select class="form-control" name="fecha" required>
            @foreach($años as $año_valido)
            <option>{{$año_valido}}</option>
            @endforeach
          </select>
          <div class="box-footer">
            @can('servicios.anual')
            <input type="submit" class="btn btn-primary" value="Imprimir">
            @endcan
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box box-default">
        <form action="{{route('mantenimiento.mensual')}}" method="GET">
          <div class="form-group">
            <label>Rango Especifico:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" autocomplete="off" class="form-control pull-right" name="fecha" id="reservation2" required>
            </div><!-- /.input group -->
          </div>
          <div class="box-footer">
            @can('servicios.mensual')
            <input type="submit" value="Imprimir" class="btn btn-primary">
            @endcan
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<div class="row">
  <div class="col-md-6">
    <div class="box box-solid box-success">
    <div class="box-header with-border">
    <h3 class="box-title">Reporte de vehiculos en taller y siniestrados</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
      <form action="{{route('reporte.vehiculos')}}" method="GET">
        <div class="form-group">
          <label>Generar reporte de vehiculos inactivos:</label>
        </div>
        <div class="box-footer">
          @can('reporte.inactivos')
          <input type="submit" value="Imprimir" class="btn btn-primary">
          @endcan
        </div>
      </form>
    </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-solid box-warning">
    <div class="box-header with-border">
    <h3 class="box-title">Reporte de total de gastos</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
      <form action="{{route('reporte.gastos')}}" method="GET">
        @csrf
        <label>Año:</label>
        <select class="form-control" name="fecha" required>
          @foreach($años as $año_valido)
          <option>{{$año_valido}}</option>
          @endforeach
        </select>
        <div class="box-footer">
          @can('reporte.importes')
          <input type="submit" class="btn btn-danger" value="Imprimir">
          @endcan
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
  </section>
@endsection
