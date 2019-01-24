@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Editar Orden
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Orden</a></li>
      <li class="active">Editar</li>
    </ol>
  </section>
  <div class="box-body">
    <div class="box box-solid box-success">
    <div class="box-header with-border">
    <h3 class="box-title">Orden</h3>
    <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    {!! Form::model($orden,['route'=>['orden.update',$orden],'method' => 'PUT','files'=>true])!!}
    <div class="box-body">
    <div class="box-body">
    <div class="form-group">
    <label>Folio DPA</label>
    <input disabled value="{{$orden->folio_dpa}}" name="folio_dpa" type="text" class="form-control" placeholder="Ingresa el Folio" required autocomplete="off">
    </div>
    <div class="form-group">
    <label>No. Oficio</label>
    <input value="{{$orden->no_oficio}}" name="no_oficio" type="text" class="form-control" placeholder="Ingresa el No. Oficio" required autocomplete="off">
    </div>
    <div class="form-group">
    <label>Fecha:</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input value="{{$orden->fecha}}" name="fecha" type="date" class="form-control pull-right">
    </div><!-- /.input group -->
    </div>
    <div class="form-group">
    <label>Encargado:</label>
    <select class="form-control" required autocomplete="off" name="id_area">
    <?php $area=departamento\Area::all() ?>
    @foreach($area as $areas)
    <option hidden value="{{$orden->area->id_area}}">{{$orden->area->encargado}}</option>
    <option value="{{$areas->id_area}}">{{$areas->encargado}}</option>
    @endforeach
    </select>
    </div>
    <div class="form-group">
      <div class="box-body">
        <label>Area que Envia:</label>
        <label class="form-control" id=""></label>
        <label>Cargo</label>
        <label class="form-control" id=""></label>
      </div>
    </div>
    <div class="form-group">
    <label>Recibio</label>
    <select class="form-control" required autocomplete="off" name="id_area_dos">
      <?php $areados=departamento\AreaDos::all() ?>
      @foreach($areados as $areasdos)
      <option hidden value="{{$orden->areados->id_area_dos}}">{{$orden->areados->encargado}}</option>
      <option value="{{$areasdos->id_area_dos}}">{{$areasdos->encargado}}</option>
      @endforeach
    </select>
    </div>
    <div class="form-group">
    <div class="box-body">
        <label>Cargo</label>
        <label class="form-control" id=""></label>
    </div>
    </div>
    <div class="form-group">
    <label>Servicio:</label>
    <textarea name="servicio" class="form-control" rows="3" placeholder="Ingresa los Servicios" maxlength="1000" required autocomplete="off">{{$orden->servicio}}</textarea>
    </div>
    <div class="form-group">
    <label>Tipo de Servicio:</label>
    <div class="radio">
    <label>
    @if($orden->correctivo=='si')
    <input type="radio" class="flat-red" name="tipo" id="optionsRadios1" value="correctivo" required checked>
    @else
    <input type="radio" class="flat-red" name="tipo" id="optionsRadios1" value="correctivo" required >
    @endif
    Correctivo
    </label>
    </div>
    <div class="radio">
    <label>
    @if($orden->preventivo=='si')
    <input type="radio" class="flat-red" name="tipo" id="optionsRadios2" value="preventivo" required checked>
    @else
    <input type="radio" class="flat-red" name="tipo" id="optionsRadios2" value="preventivo" required>
    @endif
    Preventivo
    </label>
    </div>
    </div>
    <div class="form-group">
    <label>Otros Servicio:</label>
    <div class="checkbox">
              <label>
                @if($orden->enllantamiento=='si')
                <input  name="enllantamiento" type="checkbox" class="flat-red" value="si" checked>
            @else
            <input  name="enllantamiento" type="checkbox" class="flat-red" value="si">
            @endif
                Enllantamiento
              </label>
            </div>
            <div class="checkbox">
              <label>
                @if($orden->mano_obra=='si')
                <input  name="mano_obra" type="checkbox" class="flat-red" value="si" checked>
                @else
                <input  name="mano_obra" type="checkbox" class="flat-red" value="si">
                @endif
                Mano de Obra
              </label>
            </div>
            <div class="checkbox">
              <label>
                @if($orden->refacciones=='si')
                <input  name="refacciones" type="checkbox" class="flat-red" value="si" checked>
                @else
                <input  name="refacciones" type="checkbox" class="flat-red" value="si">
                @endif
                Refacciones
              </label>
            </div>
    </div>
    <div class="form-group">
    <label>No. Economico de la Unidad:</label>
    <select class="form-control" required autocomplete="off" name="id_unidad">
      <?php $unidad=departamento\unidad::all() ?>
      <option hidden selected value="{{$orden->unidad->id_unidad}}">{{$orden->unidad->no_economico}}</option>
      @foreach($unidad as $unidades)
      <option value="{{$unidades->id_unidad}}">{{$unidades->no_economico}}</option>
      @endforeach
    </select>
    </div>
    <div class="form-group">
    <div class="box-body">
            <label>Marca:</label>
            <label class="form-control" id=""></label>
            <label>Tipo:</label>
            <label class="form-control" id=""></label>
            <label>Placa:</label>
            <label class="form-control" id=""></label>
            <label>Modelo:</label>
            <label class="form-control" id=""></label>
            <label>Serie:</label>
            <label class="form-control" id=""></label>
            <label>cil:</label>
            <label class="form-control" id=""></label>
            <label>Uso:</label>
            <label class="form-control" id=""></label>
            <label>Familia:</label>
            <label class="form-control" id=""></label>
        </div>
    </div>
    <div class="form-group">
    <label>KM:</label>
    <input value="{{$orden->km}}" name="km" type="number" class="form-control" placeholder="Ingresa los KM" required autocomplete="off">
    </div>
    <div class="form-group">
    <label>Taller:</label>
    <select class="form-control" required autocomplete="off" name="id_taller">
      <?php $taller=departamento\taller::all() ?>
      <option hidden selected value="{{$orden->taller->id_taller}}">{{$orden->taller->nombre}}</option>
      @foreach($taller as $talleres)
      <option value="{{$talleres->id_taller}}">{{$talleres->nombre}}</option>
      @endforeach
    </select>
    </div>
    <div class="form-group">
    <label>Cotizacion:</label>
    <input value="{{$orden->importe_cotizacion}}" name="importe_cotizacion" type="text" class="form-control" placeholder="Ingresa el Importe" required autocomplete="off">
    </div>
    <div class="form-group">
    <label>Fecha de Ingreso al Taller:</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input value="{{$orden->fecha_ingreso}}" name="fecha_ingreso" type="date" class="form-control pull-right">
    </div><!-- /.input group -->
    </div>
    <div class="form-group">
    <label>Fecha de Salidad del Taller:</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input value="{{$orden->fecha_salida}}" name="fecha_salida" type="date" class="form-control pull-right">
    </div>
    </div>
    <div class="form-group">
      <label>Estado de la Orden:</label>
      <select name="estado" class="form-control" required>
        <option hidden selected>{{$orden->estado}}</option>
        <option>Activa</option>
        <option>Cancelada</option>
      </select>
    </div>
    </div>
    </div>
    <div class="box-footer">
    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
    </div><!-- /.box-body -->
    </div>
  </div>
@endsection
