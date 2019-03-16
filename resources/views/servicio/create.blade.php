@extends('home')
@section('title','- Servicio')
@section('content')
<section class="content-header">
    <h1>
      Registro de Datos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Anexo</a></li>
      <li><a href="#">Registrar</a></li>
      <li class="active">Servicio</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-primary">
<div class="box-header with-border">
<h3 class="box-title">Servicio</h3>
<div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
@include('common.status')
<form class="form-group" method="post" action="{{route('servicio.store')}}">
  @csrf
<div class="box-body">
  <input type="text" name="id_anexo" value="{{$anexo->id_anexo}}" hidden>
  <div class="form-group">
    <label>Nombre del servicio:</label>
    <input name="nombre" type="text" class="form-control" placeholder="Ingresa el Nombre" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Mano de Obra:</label>
    <input name="mano_obra" type="text" class="form-control" placeholder="Ingresa valor" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Refaccion:</label>
    <input name="refaccion" type="text" class="form-control" placeholder="Ingresa valor" required autocomplete="off">
  </div>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>
</div><!-- /.box-body -->
</div><!-- /.box -->
    </section>
@endsection
