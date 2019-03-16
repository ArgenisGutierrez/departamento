@extends('home')
@section('title','- Anexo')
@section('content')
<div class="content">
  <div class="box box-solid box-primary">
<div class="box-header with-border">
<h3 class="box-title">Modelo del Anexo</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
<form class="form-group" method="post" action="{{route('anexo.store')}}">
@csrf
  <div class="box-body">
    <div class="form-group">
      <label>Marca:</label>
      <input name="marca" type="text" class="form-control" placeholder="Ingresa la Marca" required autocomplete="off">
    </div>
    <div class="form-group">
      <label>Tipo:</label>
      <input name="tipo" type="text" class="form-control" placeholder="Ingresa el Tipo" required autocomplete="off">
    </div>
    <div class="form-group">
      <label>Modelo:</label>
      <input name="modelo" type="text" class="form-control" placeholder="Ingresa el Modelo" required autocomplete="off">
    </div>
    <div class="form-group">
      <label>Cil:</label>
      <select name="cil" class="form-control" required >
      <option> 1 </option>
      <option> 2 </option>
      <option> 3 </option>
      <option> 4 </option>
      <option> 5 </option>
      <option> 6 </option>
      <option> 7 </option>
      <option> 8 </option>
      <option> 9 </option>
      <option> 10 </option>
    </select>
    </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
</form>
</div>
</div>
</div>
@endsection
