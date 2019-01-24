@extends('home')
@section('title','- Taller')
@section('content')
  <div class="content">
    <div class="box box-solid box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Taller</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
          {!! Form::model($taller,['route'=>['taller.update',$taller],'method' => 'PUT','files'=>true])!!}
          <div class="box-body">
              <label>Nombre:</label>
              <input name="nombre" type="text" class="form-control" placeholder="Nombre del Taller" required autocomplete="off" value="{{$taller->nombre}}">
              <label>Sucursal:</label>
              <input name="sucursal" type="text" class="form-control" placeholder="Lugar de la Sucursal" required autocomplete="off" value="{{$taller->sucursal}}">
              <label>Telefono:</label>
              <input name="telefono" type="tel" class="form-control" placeholder="Telefono de la Sucursal" maxlength="12" required autocomplete="off" value="{{$taller->telefono}}">
              <label>Correo</label>
              <input name="correo" type="email" class="form-control" placeholder="Correo de la Sucursal" required autocomplete="off" value="{{$taller->correo}}">
              <label>Logo:</label>
              <div>
                <img src="/imagenes/{{$taller->logo}}" class="img-circle" height="100px" width="100px">
              </div><br>
              <input name="logo" type="file" >
              </div><!-- /.box-body -->
              <div class="box-footer">
                {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
              </div>
          {!!Form::close()!!}
      </div><!-- /.box-body -->
  </div>

@endsection
