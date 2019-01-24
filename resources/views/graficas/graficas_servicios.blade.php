@extends('home')
@extends('graficas.pie_total_servicios')
@extends('graficas.st_familia')
@extends('graficas.st_areas')
@extends('graficas.st_talleres')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Graficas de Servicios
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Graficas</a></li>
      <li class="active">Servicios</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Graficas sobre Servicios</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @include('common.status')

          <!-- TOTAL DE SERVICIO -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Total de Servicios</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <canvas id="grafica_ts" style="height:250px"></canvas>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

          <!-- TOTAL DE SERVICIO por areas -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Total de Servicios por Areas</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <canvas id="grafica_ts_areas" style="height:250px"></canvas>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        <!-- TOTAL DE SERVICIO POR TALLER -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Total de Servicios por Taller</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
              <canvas id="grafica_ts_talleres" style="height:250px"></canvas>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->







<div class="box box-solid box-success">
<div class="box-header with-border">
<h3 class="box-title">Graficas sobre Servicios por Familia</h3>
<div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
<div class="box-body table-responsive no-padding">
  @include('common.status')

      <!-- TOTAL DE SERVICIO a MOTOCICLETAS -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Motocicleta</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="grafica_ts_motocicleta" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

      <!-- TOTAL DE SERVICIO A SEDAN -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Sedan</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="grafica_ts_sedan" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      <!-- TOTAL DE SERVICIO A PICKUP -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Pickup</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="grafica_ts_pickup" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

      <!-- TOTAL DE SERVICIO A CAMION -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Camion</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <canvas id="grafica_ts_camion" style="height:250px"></canvas>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
</div><!-- /.box-body -->
</div><!-- /.box-body -->
</div><!-- /.box -->
  </section>


@endsection
