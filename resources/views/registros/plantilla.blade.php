@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Registro de Unidades
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Plantilla</a></li>
      <li class="active">Registrar</li>
    </ol>
  </section>
<section class="content">
    <div class="box box-solid box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Unidad</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    @if(session('status4'))
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
      <h4><i class="icon fa fa-check"></i>{{session('status4')}}</h4>
    </div>
    @endif
    <form action="{{route('unidad.store')}}" method="post" class="form-horizontal">
      @csrf
      <div class="box-body">
              <label>Marca:</label>
              <input name="marca" type="text" class="form-control" placeholder="Marca" required autocomplete="off">
              <label>Tipo:</label>
              <input name="tipo" type="text" class="form-control" placeholder="Tipo" required autocomplete="off">
              <label>Placa:</label>
              <input name="placa" type="text" class="form-control" placeholder="Placa" required autocomplete="off">
              <label>Modelo:</label>
              <input name="modelo" type="text" class="form-control" placeholder="Modelo" required autocomplete="off">
              <label>Serie:</label>
              <input name="serie" type="text" class="form-control" placeholder="Serie" required autocomplete="off">
              <label>No. Economico:</label>
              <input name="no_economico" type="text" class="form-control" placeholder="No. Economico" required autocomplete="off">
              <label>cil:</label>
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
              <label>Uso:</label>
              <select name="uso" class="form-control" required>
              <option>Administrativo</option>
              <option>Operativo</option>
            </select>
              <label>Familia:</label>
              <select name="familia" class="form-control" required>
                <option>Camion</option>
                <option>Motocicleta</option>
                <option>Sedan</option>
                <option>Pickup</option>
              </select>
          </div>
          <div class="box-footer">
            @can('unidad.create')
            <button type="submit" class="btn btn-warning">Guardar</button>
            @endcan
          </div>
    </form>
  </div><!-- /.box-body -->
  </div><!-- /.box -->
</section>

@endsection
