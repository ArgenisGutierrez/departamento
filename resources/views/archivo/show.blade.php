@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Descargar Archivos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Archivos</a></li>
      <li class="active">Descargar</li>
    </ol>
  </section>
<section class="content">
  <div class="box-body">
    <div class="box box-solid box-info">
<div class="box-header with-border">
<h3 class="box-title">Decargar Archivos</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
  <h4>Archivos de la orden: {{$archivo->orden->folio_dpa}}</h4>
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
          {!!Form::open(['route'=>['archivo1.pdf',$archivo->id_archivo], 'method'=>'GET'])!!}
            {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
        </div>
        <div class="form-group">
          <label>Cotizacion:</label>
          {!!Form::open(['route'=>['archivo2.pdf',$archivo->id_archivo], 'method'=>'GET'])!!}
            {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
        </div>
        <div class="form-group">
          <label>Dictamen Tecnico:</label>
          {!!Form::open(['route'=>['archivo3.pdf',$archivo->id_archivo], 'method'=>'GET'])!!}
            {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
        </div>
        <div class="form-group">
          <label>Factura:</label>
          {!!Form::open(['route'=>['archivo4.pdf',$archivo->id_archivo], 'method'=>'GET'])!!}
            {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
        </div>
        <div class="form-group">
          <label>Acuse de Recibido del Area:</label>
          {!!Form::open(['route'=>['archivo5.pdf',$archivo->id_archivo], 'method'=>'GET'])!!}
            {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
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
      {!!Form::open(['route'=>['archivo1.xml',$archivo->id_archivo], 'method'=>'GET'])!!}
        {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
    <div class="form-group">
      <label>Cotizacion:</label>
      {!!Form::open(['route'=>['archivo2.xml',$archivo->id_archivo], 'method'=>'GET'])!!}
        {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
    <div class="form-group">
      <label>Dictamen Tecnico:</label>
      {!!Form::open(['route'=>['archivo3.xml',$archivo->id_archivo], 'method'=>'GET'])!!}
        {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
    <div class="form-group">
      <label>Factura:</label>
      {!!Form::open(['route'=>['archivo4.xml',$archivo->id_archivo], 'method'=>'GET'])!!}
        {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
    <div class="form-group">
      <label>Acuse de Recibido del Area:</label>
      {!!Form::open(['route'=>['archivo5.xml',$archivo->id_archivo], 'method'=>'GET'])!!}
        {!! Form::submit('Descargar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
    </div><!-- /.box-body -->
    </div>
    </div>
  </div>
</div><!-- /.box-body -->
</div>
  </div>
</section>


@endsection
