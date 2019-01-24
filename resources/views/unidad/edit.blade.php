@extends('home')
@section('title','- Unidad')
@section('content')
<div class="content">
  <div class="box box-solid box-warning">
  <div class="box-header with-border">
  <h3 class="box-title">Unidad</h3>
  <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    {!! Form::model($unidad,['route'=>['unidad.update',$unidad],'method' => 'PUT','files'=>true])!!}
    <div class="box-body">
            <label>Marca:</label>
            <input value="{{$unidad->marca}}" name="marca" type="text" class="form-control" placeholder="Marca" required autocomplete="off">
            <label>Tipo:</label>
            <input value="{{$unidad->tipo}}" name="tipo" type="text" class="form-control" placeholder="Tipo" required autocomplete="off">
            <label>Placa:</label>
            <input value="{{$unidad->placa}}" name="placa" type="text" class="form-control" placeholder="Placa" required autocomplete="off">
            <label>Modelo:</label>
            <input value="{{$unidad->modelo}}" name="modelo" type="text" class="form-control" placeholder="Modelo" required autocomplete="off">
            <label>Serie:</label>
            <input value="{{$unidad->serie}}" name="serie" type="text" class="form-control" placeholder="Serie" required autocomplete="off">
            <label>No. Economico:</label>
            <input value="{{$unidad->no_economico}}" name="no_economico" type="text" class="form-control" placeholder="No. Economico" required autocomplete="off">
            <label>cil:</label>
            <select name="cil" class="form-control" required >
            <option selected hidden>{{$unidad->cil}}</option>
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
            <option hidden selected>{{$unidad->uso}}</option>
            <option>Administrativo</option>
            <option>Operativo</option>
          </select>
            <label>Familia:</label>
            <select name="familia" class="form-control" required>
              <option hidden selected>{{$unidad->familia}}</option>
              <option>Camion</option>
              <option>Motocicleta</option>
              <option>Sedan</option>
              <option>Pickup</option>
            </select>
        </div>
        <div class="box-footer">
          {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
  </div><!-- /.box-body -->
  </div><!-- /.box -->
</div>

@endsection
