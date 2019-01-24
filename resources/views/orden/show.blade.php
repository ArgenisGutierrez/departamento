@extends('home')
@section('title','- Orden')
@section('content')
  <section class="content-header">
      <h1>
        Detalle de la Orden: {{$orden->folio_dpa}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Orden</a></li>
        <li class="active">{{$orden->folio_dpa}}</li>
      </ol>
    </section>
  <!-- Main content -->
  <section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
        <div class="box box-solid box-primary collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Datos del Area que Envia</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <!-- form start -->
      <div class="box-body">
        <div class="form-group">
          <label >Area:</label>
          <input type="text" name="" value="{{$orden->area->where('id_area',$orden->id_area)->value('nombre')}}" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label>Nombre del Encargado:</label>
          <input type="text" name="" value="{{$orden->area->where('id_area',$orden->id_area)->value('encargado')}}" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label>Cargo que Ejerce:</label>
          <input type="text" name="" value="{{$orden->area->where('id_area',$orden->id_area)->value('cargo')}}" class="form-control" disabled>
        </div>
          </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="box box-solid box-info collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Datos del Taller</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
      <div class="box-body">
          <div class="box-body">
            <div class="form-group">
              <label>Nombre:</label>
              <input type="text" name="" value="{{$orden->taller->where('id_taller',$orden->id_taller)->value('nombre')}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Sucursal:</label>
              <input type="text" name="" value="{{$orden->taller->where('id_taller',$orden->id_taller)->value('sucursal')}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Telefono:</label>
              <input type="text" name="" value="{{$orden->taller->where('id_taller',$orden->id_taller)->value('telefono')}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="text" name="" value="{{$orden->taller->where('id_taller',$orden->id_taller)->value('correo')}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Logo:</label>
              <img src="/imagenes/{{$orden->taller->where('id_taller',$orden->id_taller)->value('logo')}}" class="img-circle" height="100px" width="100px">
            </div>
          </div>
                  </div><!-- /.box-body -->
  </div><!-- /.box-body -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                          <div class="box box-solid box-success collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Datos del Area que Autoriza</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
        <div class="box-body">
                <label>Nombre:</label>
                <input type="text" name="" value="{{$orden->areados->where('id_area_dos',$orden->id_area_dos)->value('encargado')}}" class="form-control" disabled>
                <label>Cargo:</label>
              <input type="text" name="" value="{{$orden->areados->where('id_area_dos',$orden->id_area_dos)->value('cargo')}}" class="form-control" disabled>
            </div>
  </div><!-- /.box-body -->
</div><!-- /.box -->


  </div><!-- /.box-body -->
  <div class="col-md-6">
  <!-- Horizontal Form -->
    <div class="box box-solid box-warning collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Datos de la Unidad</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
      <div class="box-body">
              <label>Marca:</label>
            <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('marca')}}" class="form-control" disabled>
              <label>Tipo:</label>
            <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('tipo')}}" class="form-control" disabled>
              <label>Placa:</label>
              <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('placa')}}" class="form-control" disabled>
              <label>Modelo:</label>
              <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('modelo')}}" class="form-control" disabled>
              <label>Serie:</label>
              <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('serie')}}" class="form-control" disabled>
              <label>No. Economico:</label>
          <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('no_economico')}}" class="form-control" disabled>
              <label>cil:</label>
              <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('cil')}}" class="form-control" disabled>
              <label>Uso:</label>
              <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('uso')}}" class="form-control" disabled>
              <label>Familia:</label>
              <input type="text" name="" value="{{$orden->unidad->where('id_unidad',$orden->id_unidad)->value('familia')}}" class="form-control" disabled>
          </div>
  </div><!-- /.box-body -->
</div><!-- /.box -->
          </div>
    </div><!-- /.box -->
    <div class="box box-solid  box-danger collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Datos de la Orden</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">
          <div class="box-body">
            <div class="form-group">
              <label>Folio DPA</label>
              <input type="text" name="" value="{{$orden->folio_dpa}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>No. Oficio</label>
              <input type="text" name="" value="{{$orden->no_oficio}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Fecha:</label>
              <input type="text" name="" value="{{$orden->fecha}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Servicio:</label>
              <textarea disabled class="form-control" rows="5" cols="80">{{$orden->servicio}}</textarea>
            </div>
            <div class="form-group">
            <label>Tipo de Servicio:</label><br>
            <label>Correctivo</label>
            <input type="text" name="" value="{{$orden->correctivo}}" class="form-control" disabled>
            <label>Preventivo</label>
            <input type="text" name="" value="{{$orden->preventivo}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Otros Servicio:</label><br>
              <label>Enllantamiento</label>
              <input type="text" name="" value="{{$orden->enllantamiento}}" class="form-control" disabled>
              <label>Mano de Obra</label>
              <input type="text" name="" value="{{$orden->mano_obra}}" class="form-control" disabled>
              <label>Refacciones</label>
              <input type="text" name="" value="{{$orden->refacciones}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>KM:</label>
              <input type="text" name="" value="{{$orden->km}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Cotrizacion:</label>
              <input type="text" name="" value="{{$orden->importe_cotizacion}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Fecha de Ingreso al Taller:</label>
            <input type="text" name="" value="{{$orden->fecha_ingreso}}" class="form-control" disabled>
            </div>
            <div class="form-group">
              <label>Fecha de Salidad del Taller:</label>
              <input type="text" name="" value="{{$orden->fecha_salida}}" class="form-control" disabled>
            </div>
          </div>
          </div>
          </div>
          <div class="box box-solid box-default collapsed-box">
<div class="box-header with-border">
<h3 class="box-title">Datos de Usuario</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
<label>Nombre:</label>
<input type="text" name="" value="{{$orden->user->where('id',$orden->id)->value('name')}}" class="form-control" disabled>
<label>Correo</label>
<input type="text" name="" value="{{$orden->user->where('id',$orden->id)->value('email')}}" class="form-control" disabled>
</div><!-- /.box-body -->
</div>
@can('orden.pdf')
{!!Form::open(['route'=>['orden.pdf',$orden->id_orden], 'method'=>'GET'])!!}
  {!! Form::submit('Imprimir',['class'=>'btn btn-primary'])!!}
  {!!Form::close()!!}
  @endcan
  </div><!-- /.box-body -->
  </div>
  </section><!-- /.content -->
@endsection
