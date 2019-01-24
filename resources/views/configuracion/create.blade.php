@extends('home')
@section('title','- Dictamen')
@section('content')
<div class="content">
  <div class="box box-solid box-primary">
  <div class="box-header with-border">
  <h3 class="box-title">Datos de Dictamen</h3>
  <div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  @include('common.status')
  <!-- form start -->
  <form class="form-group" method="post" action="{{route('dictamen.store')}}">
  @csrf
  <div class="box-body">
  <div class="form-group">
    <label>Jefe de Oficina de Maquinaria:</label>
    <input name="jefe_oficina" type="text" class="form-control" placeholder="Jefe de Oficina de Maquinaria" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Jefe del Departamento de Recursos Materiales y Servicios Generales:</label>
    <input name="jefe_departamento" type="text" class="form-control" placeholder="Jefe del Departamento de Recursos Materiales y Servicios Generales" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Jefe de Unidad Administrativa:</label>
    <input name="jefe_unidad" type="text" class="form-control" placeholder="Jefe de Unidad Administrativa" required autocomplete="off">
  </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
  </div><!-- /.box-body -->
  </div>
</div>
@endsection
