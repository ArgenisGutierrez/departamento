@extends('home')
@section('title','- Servicio')
@section('content')
<div class="content">
  <div class="box box-solid box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Servicio</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
        {!! Form::model($servicio,['route'=>['servicio.update',$servicio],'method' => 'PUT','files'=>true])!!}
        <div class="box-body">
            <input type="hidden" value="{{$anexo->id_anexo}}" name="id">
            <label>Nombre:</label>
            <input name="nombre" type="text" class="form-control" placeholder="Nombre del Servicio" required autocomplete="off" value="{{$servicio->nombre}}">
            <label>Mano de Obra:</label>
            <input name="mano_obra" type="text" class="form-control" placeholder="Valor de la Mano de Obra" required autocomplete="off" value="{{$servicio->mano_obra}}">
            <label>Refaccion:</label>
            <input name="refaccion" type="tel" class="form-control" placeholder="Valor de la Refaccion" maxlength="12" required autocomplete="off" value="{{$servicio->refaccion}}">
            </div><!-- /.box-body -->
            <div class="box-footer">
              {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
            </div>
        {!!Form::close()!!}
    </div><!-- /.box-body -->
</div>
@endsection
