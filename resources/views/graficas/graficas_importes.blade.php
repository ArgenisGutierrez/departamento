@extends('home')
@extends('graficas.grafica_importe_area')
@extends('graficas.grafica_importe_taller')
@extends('graficas.grafica_importe_mes')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Graficas de Servicios
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Graficas</a></li>
      <li class="active">Importes</li>
    </ol>
  </section>
  <section class="content">
<div class="box box-solid box-success">
<div class="box-header with-border">
<h3 class="box-title">Graficas sobre Importes</h3>
<div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
<div class="box-body table-responsive no-padding">

      <!-- TOTAL DE IMPORTES POR MES -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Importes por Mes</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="grafica_importe_mes" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

      <!-- TOTAL DE IMPORTES POR AREAS -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Importes por Area</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="grafica_importe_area" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

      <!-- TOTAL DE IMPORTES POR TALLER -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Importes por Taller</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="grafica_importe_taller" style="height:250px"></canvas>
        </div>
      </div>

</div>
</div>
</div>
  </section>


@endsection
