@extends('home')
@section('title','- Factura')
@section('content')
<div class="content">
  <div class="box box-solid box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Taller</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
        {!! Form::model($dictamen,['route'=>['dictamen.update',$dictamen],'method' => 'PUT','files'=>true])!!}
        <div class="box-body">
            <label>Jefe de Oficina de Maquinaria:</label>
            <input name="jefe_oficina" type="text" class="form-control" placeholder="Jefe de Oficina de Maquinaria" required autocomplete="off" value="{{$dictamen->jefe_oficina}}">
            <label>Jefe del Departamento de Recursos Materiales y Servicios Generales:</label>
            <input name="jefe_departamento" type="text" class="form-control" placeholder="Lugar de la Sucursal" required autocomplete="off" value="{{$dictamen->jefe_departamento}}">
            <label>Jefe de Unidad Administrativa:</label>
            <input name="jefe_unidad" type="tel" class="form-control" placeholder="Telefono de la Sucursal" required autocomplete="off" value="{{$dictamen->jefe_unidad}}">
            </div>
            <div class="box-footer">
              {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
            </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
