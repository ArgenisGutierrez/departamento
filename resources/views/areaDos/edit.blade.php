@extends('home')
@section('title','- Area')
@section('content')
  <div class="content">
    <div class="box box-solid box-success">
<div class="box-header with-border">
<h3 class="box-title">Area que Recibe</h3>
<div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
<!-- form start -->
{!! Form::model($area2,['route'=>['area2.update',$area2],'method' => 'PUT','files'=>true])!!}
  <div class="box-body">
    <div class="form-group">
      <label>Nombre del Encargado:</label>
      <input name="encargado" type="text" class="form-control" placeholder="Ingresa el Nombre" required autocomplete="off" value="{{$area2->encargado}}">
    </div>
    <div class="form-group">
      <label>Cargo que Ejerce:</label>
      <input name="cargo" type="text" class="form-control" placeholder="Ingresa el Cargo" required autocomplete="off" value="{{$area2->cargo}}">
    </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
      </div>
{!! Form::close()!!}
</div><!-- /.box-body -->
</div>
  </div>

@endsection
