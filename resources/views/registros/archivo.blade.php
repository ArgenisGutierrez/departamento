@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Subida de Archivos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Archivos</a></li>
      <li class="active">Subir</li>
    </ol>
  </section>
<section class="content">
  <div class="box-body">
  <div class="box box-solid box-info">
<div class="box-header with-border">
<h3 class="box-title">Subir Archivos</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
  @if(session('status'))
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
    <h4><i class="icon fa fa-check"></i>{{session('status')}}</h4>
  </div>
  @endif
  <form class="formarchivo" method="post" action="{{route('archivo.store')}}" enctype="multipart/form-data">
    @csrf
<div class="box-header">
  <?php $archivos=departamento\archivo::all();
  $orden=departamento\orden::all() ?>
  <select class="form-control" name="id_orden">
    @foreach($orden as $ordenes)
    @if($ordenes->estado=="Activa")
    @if($ordenes->archivos==null)
    <option value="{{$ordenes->id_orden}}">{{$ordenes->folio_dpa}}</option>
    @endif
    @endif
    @endforeach
  </select>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="box box-solid box-danger">
    <div class="box-header with-border">
    <h3 class="box-title">Archivos PDF</h3>
    <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="form-group">
        <label>Oficio de Solicitud:</label>
        <input type="file" name="oficio_solicitud_pdf"  required >
      </div>
      <div class="form-group">
        <label>Cotizacion:</label>
        <input type="file" name="cotizacion_pdf" required >
      </div>
      <div class="form-group">
        <label>Dictamen Tecnico:</label>
        <input type="file" name="dictamen_tecnico_pdf" required >
      </div>
      <div class="form-group">
        <label>Factura:</label>
        <input type="file" name="factura_pdf" required >
      </div>
      <div class="form-group">
        <label>Acuse de Recibido del Area:</label>
        <input type="file" name="acuse_recibo_area_pdf" required >
      </div>
    </div><!-- /.box-body -->
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-solid box-warning">
  <div class="box-header with-border">
  <h3 class="box-title">Archivos XML</h3>
  <div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="form-group">
      <label>Oficio de Solicitud:</label>
      <input type="file" name="oficio_solicitud_xml"  required >
    </div>
    <div class="form-group">
      <label>Cotizacion:</label>
      <input type="file" name="cotizacion_xml" required >
    </div>
    <div class="form-group">
      <label>Dictamen Tecnico:</label>
      <input type="file" name="dictamen_tecnico_xml" required >
    </div>
    <div class="form-group">
      <label>Factura:</label>
      <input type="file" name="factura_xml" required >
    </div>
    <div class="form-group">
      <label>Acuse de Recibido del Area:</label>
      <input type="file" name="acuse_recibo_area_xml" required >
    </div>
  </div><!-- /.box-body -->
  </div>
  </div>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-info">Guardar</button>
</div>
</form>
</div><!-- /.box-body -->
</div>

  </div>
</section>

@endsection
