@extends('home')
@section('title','- Factura')
@section('content')
  <div class="content">
    <div class="box box-solid box-primary">
<div class="box-header with-border">
<h3 class="box-title">Factura</h3>
<div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
<!-- form start -->
{!! Form::model($factura,['route'=>['factura.update',$factura],'method' => 'PUT','files'=>true])!!}
<div class="box-body">
  <div class="form-group">
    <label>Folio DPA:</label>
    <select class="form-control">
      <?php $orden=departamento\orden::all() ?>
      {{$factura->orden}}
      @foreach($orden as $ordenes)
      <option hidden>{{$factura->orden->where('id_orden',$factura->id_orden)->value('folio_dpa')}}</option>
      <option>{{$ordenes->folio_dpa}}</option>
      @endforeach
    </select>
  </div>
  <input type="text" name="id_orden" value="{{$ordenes->id_orden}}" hidden>
  <div class="form-group">
    <label>Folio:</label>
    <input name="folio" type="text" class="form-control" placeholder="Ingresa el Folio" required autocomplete="off" value="{{$factura->folio}}">
  </div>
  <div class="form-group">
    <label>Importe:</label>
    <input name="importe" type="text" class="form-control" placeholder="Ingresa el Importe" required autocomplete="off" value="{{$factura->importe}}">
  </div>
  <div class="form-group">
    <label>Fecha:</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input name="fecha" type="date" class="form-control pull-right" value="{{$factura->fecha}}">
    </div>
  </div>
  <div class="form-group">
    <label>Fecha de Envio al Area:</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input name="fecha_envio_area" type="date" class="form-control pull-right" value="{{$factura->fecha_envio_area}}">
    </div>
  </div>
  <div class="form-group">
    <label>Fecha de Recibido al Area:</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      <input name="fecha_recibo_area" type="date" class="form-control pull-right" value="{{$factura->fecha_recibo_area}}">
    </div>
  </div>
</div>
      <div class="box-footer">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
      </div>
{!! Form::close()!!}
</div><!-- /.box-body -->
</div>
  </div>

@endsection
