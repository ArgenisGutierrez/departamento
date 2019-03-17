@extends('home')
@section('title','- Unidades')
@section('content')
<section class="content-header">
    <h1>
      Lista de Unidades
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Mostrar</a></li>
      <li class="active">Unidades</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Unidades</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @if(session('status4'))
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <h4><i class="icon fa fa-check"></i>{{session('status4')}}</h4>
      </div>
      @endif
      <table class="table table-bordered table-striped" id="myTable" style="width:100%">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>No. Economico</th>
                <th>Cil</th>
                <th>Uso</th>
                <th>Familia</th>
                <th>Area</th>
                <th>Placa Anterior</th>
                <th>Placa Actual</th>
                <th>Color</th>
                <th>Propiedad</th>
                <th>Patrulla/Civil</th>
                <th>Estatus</th>
                <th>Motivo de Inactividad</th>
                <th>Ubicacion</th>
                <th>Localidad</th>
                <th>Adscripcion</th>
                <th>Nombre de Adscripcion</th>
                <th>Propietario</th>
                @can('unidad.edit')
                <th>Actualizar</th>
                @endcan
                @can('unidad.destroy')
                <th>Eliminar</th>
                @endcan
                @can('unidad.bitacora')
                <th>Bitacora</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($unidades as $unidad)
      <tr role="row" class="odd">
      <td>{{$unidad->marca}}</td>
      <td>{{$unidad->tipo}}</td>
      <td>{{$unidad->modelo}}</td>
      <td>{{$unidad->serie}}</td>
      <td>{{$unidad->no_economico}}</td>
      <td>{{$unidad->cil}}</td>
      <td>{{$unidad->uso}}</td>
      <td>{{$unidad->familia}}</td>
      <th>{{$unidad->area}}</th>
      <th>{{$unidad->placa_anterior}}</th>
      <th>{{$unidad->placa_actual}}</th>
      <th>{{$unidad->color}}</th>
      <th>{{$unidad->propiedad}}</th>
      <th>{{$unidad->patrulla_civil}}</th>
      <th>{{$unidad->estatus}}</th>
      <th>{{$unidad->motivo_inactividad}}</th>
      <th>{{$unidad->ubicacion}}</th>
      <th>{{$unidad->localidad}}</th>
      <th>{{$unidad->adscripcion}}</th>
      <th>{{$unidad->nombre_adscripcion}}</th>
      <th>{{$unidad->propietario}}</th>
      @can('unidad.edit')
      <td>{!!Form::open(['route'=>['unidad.edit',$unidad->id_unidad], 'method'=>'GET'])!!}
        {!!Form::submit('Editar',['class'=>'btn btn-block btn-warning btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('unidad.destroy')
      <td>{!!Form::open(['route'=>['unidad.destroy',$unidad->id_unidad], 'method'=>'DELETE'])!!}
        {!!Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('unidad.bitacora')
      <td>{!!Form::open(['route'=>['unidad.bitacora',$unidad->id_unidad], 'method'=>'GET'])!!}
        {!! Form::submit('Imprimir',['class'=>'btn btn-block btn-primary btn-xs'])!!}
        {!!Form::close()!!}</td>
      </tr>
      @endcan
      @endforeach
      <tfoot>
        <tr>
          <th>Marca</th>
          <th>Tipo</th>
          <th>Modelo</th>
          <th>Serie</th>
          <th>No. Economico</th>
          <th>Cil</th>
          <th>Uso</th>
          <th>Familia</th>
          <th>Area</th>
          <th>Placa Anterior</th>
          <th>Placa Actual</th>
          <th>Color</th>
          <th>Propiedad</th>
          <th>Patrulla/Civil</th>
          <th>Estatus</th>
          <th>Motivo de Inactividad</th>
          <th>Ubicacion</th>
          <th>Localidad</th>
          <th>Adscripcion</th>
          <th>Nombre de Adscripcion</th>
          <th>Propietario</th>
          @can('unidad.edit')
          <td></td>
          @endcan
          @can('unidad.destroy')
          <td></td>
          @endcan
          @can('unidad.bitacora')
          <td></td>
          @endcan
        </tr>
      </tfoot>
      </table>
      @can('unidad.xlsx')
      {!!Form::open(['route'=>['unidad.xlsx'], 'method'=>'GET'])!!}
        {!! Form::submit('Exportar Datos',['class'=>'btn btn-info'])!!}
        {!!Form::close()!!}
        @endcan
    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>

@endsection
