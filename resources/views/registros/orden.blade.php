@extends('home')
@section('title','- Ordenes')
@section('content')
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>
  <section class="content-header">
      <h1>
        Registro de Datos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Ordenes</a></li>
        <li class="active">Registrar</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-solid box-success">
<div class="box-header with-border">
  <h3 class="box-title">Orden</h3>
  <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  </div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
  @include('common.status')
  <form class="form-horizontal" method="post" action="/orden">
    @csrf
  <div class="box-body">
  <div class="box-body">
    <div class="form-group">
      <label>Folio DPA</label>
      <select class="js-example-basic-single form-control" name="folio_dpa">
        <option value="Ene">Ene</option>
        <option value="Feb">Feb</option>
        <option value="Mar">Mar</option>
        <option value="Abr">Abr</option>
        <option value="May">May</option>
        <option value="Jun">Jun</option>
        <option value="Jul">Jul</option>
        <option value="Ago">Ago</option>
        <option value="Oct">Oct</option>
        <option value="Nov">Nov</option>
        <option value="Dic">Dic</option>
      </select>
    </div>
    <input type="text" hidden name="nombre" value="{{ Auth::user()->name }}">
    <div class="form-group">
      <label>No. Oficio</label>
      <input name="no_oficio" type="text" class="form-control" placeholder="Ingresa el No. Oficio" required autocomplete="off">
    </div>
    <div class="form-group">
      <label>Fecha:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input name="fecha" type="date" class="form-control pull-right">
      </div><!-- /.input group -->
    </div>
    <div class="form-group">
      <label>Encargado:</label>
      <select class="js-example-basic-single form-control" required autocomplete="off" name="id_area">
      <?php $area=departamento\Area::all() ?>
      @foreach($area as $areas)
      <option value="{{$areas->id_area}}">{{$areas->encargado}}</option>
      @endforeach
      </select>
    </div>
      <div class="form-group">
        <div class="box-body">
          <label>Area que Envia:</label>
          <div class="form-control">

          </div>
          <label>Cargo</label>
          <div class="form-control">

          </div>
        </div>
      </div>
    <div class="form-group">
      <label>Recibio</label>
      <select id="area_dos" class="js-example-basic-single form-control" required autocomplete="off" name="id_area_dos">
        <?php $areados=departamento\AreaDos::all() ?>
        @foreach($areados as $areasdos)
        <option value="{{$areasdos->id_area_dos}}">{{$areasdos->encargado}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <div class="box-body">
          <label>Cargo</label>
          <label class="form-control" id="area2_cargo"></label>
      </div>
    </div>
    <div class="form-group">
      <label>Servicio:</label>
      <textarea name="servicio" class="form-control" rows="3" placeholder="Separa los Servicios con un punto" maxlength="1000" required autocomplete="off"></textarea>
    </div>
    <div class="form-group">
    <label>Tipo de Servicio:</label>
    <div class="radio">
    <label>
    <input type="radio" class="flat-red" name="tipo" id="optionsRadios1" value="correctivo" required >
    Correctivo
    </label>
    </div>
    <div class="radio">
    <label>
    <input type="radio" class="flat-red" name="tipo" id="optionsRadios2" value="preventivo" required >
    Preventivo
    </label>
    </div>
    </div>
    <div class="form-group">
      <label>Otros Servicio:</label>
      <div class="checkbox">
                <label>
                  <input  name="enllantamiento" type="checkbox" class="flat-red" value="si">
                  Enllantamiento
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input  name="mano_obra" type="checkbox" class="flat-red" value="si">
                  Mano de Obra
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input  name="refacciones" type="checkbox" class="flat-red" value="si">
                  Refacciones
                </label>
              </div>
    </div>
    <div class="form-group">
      <label>No. Economico de la Unidad:</label>
      <select class="js-example-basic-single form-control" required autocomplete="off" name="id_unidad">
        <?php $unidad=departamento\unidad::all() ?>
        @foreach($unidad as $unidades)
        <option value="{{$unidades->id_unidad}}">{{$unidades->no_economico}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <div class="box-body">
              <label>Marca:</label>
              <div class="form-control">

              </div>
              <label>Tipo:</label>
              <div class="form-control">

              </div>
              <label>Placa:</label>
              <div class="form-control">

              </div>
              <label>Modelo:</label>
              <div class="form-control">

              </div>
              <label>Serie:</label>
              <div class="form-control">

              </div>
              <label>cil:</label>
              <div class="form-control">

              </div>
              <label>Uso:</label>
              <div class="form-control">

              </div>
              <label>Familia:</label>
              <div class="form-control">

              </div>
          </div>
    </div>
    <div class="form-group">
      <label>KM:</label>
      <input name="km" type="number" class="form-control" placeholder="Ingresa los KM" required autocomplete="off">
    </div>
    <div class="form-group">
      <label>Taller:</label>
      <select class="js-example-basic-single form-control" required autocomplete="off" name="id_taller">
        <?php $taller=departamento\taller::all() ?>
        @foreach($taller as $talleres)
        <option value="{{$talleres->id_taller}}">{{$talleres->nombre}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Cotrizacion:</label>
      <input name="importe_cotizacion" type="text" class="form-control" placeholder="Ingresa el Importe" required autocomplete="off">
    </div>
    <div class="form-group">
      <label>Fecha de Ingreso al Taller:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input name="fecha_ingreso" type="date" class="form-control pull-right">
      </div><!-- /.input group -->
    </div>
    <div class="form-group">
      <label>Fecha de Salidad del Taller:</label>
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        <input name="fecha_salida" type="date" class="form-control pull-right">
      </div><!-- /.input group -->
    </div>
    <input type="text" name="estado" value="Activa" hidden>
    <input type="text" name="id" value="{{ Auth::user()->id }}" hidden>
  </div>
  </div>
  <div class="box-footer">
  <button type="submit" class="btn btn-success">Guardar</button>
  </div>
  </form>
</div><!-- /.box-body -->
</div><!-- /.box -->
</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.js-example-basic-single').select2();
});
</script>
@endsection
