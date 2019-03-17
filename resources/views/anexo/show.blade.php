@extends('home')
@section('title','- Anexo')
@section('content')
<?php
  $anexo1=$anexo->servicios
 ?>
<!--dataTables-->
<section class="content-header">
    <h1>
      Lista de Servicios {{$anexo->id_anexo}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Anexos</a></li>
      <li class="active">Modelos</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Servicios</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">

      <table class="table table-bordered table-striped" id="myTable" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>M.O.</th>
                <th>Ref.</th>
                @can('servicio.edit')
                <th>Editar</th>
                @endcan
                @can('servicio.destroy')
                <th>Eliminar</th>
                @endcan
            </tr>

        </thead>
      <tbody>
        @foreach($anexo1 as $servicio)
      <tr role="row" class="odd">
        <th>{{$servicio->nombre}}</th>
        <th>${{$servicio->mano_obra}}</th>
        <th>${{$servicio->refaccion}}</th>
        @can('servicio.edit')
        <td>{!!Form::open(['route'=>['servicio.edit',$servicio->id_servicio,$anexo->id_anexo], 'method'=>'GET'])!!}
          {!!Form::submit('Editar',['class'=>'btn  btn-block btn-warning btn-xs'])!!}
          {!!Form::close()!!}
        </td>
        @endcan
        @can('servicio.destroy')
        <td>{!!Form::open(['route'=>['servicio.destroy',$servicio->id_servicio], 'method'=>'DELETE'])!!}
          {!!Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
          {!!Form::close()!!}
        </td>
        @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th>Nombre</th>
          <th>M.O.</th>
          <th>Ref.</th>
          @can('servicio.edit')
          <td></td>
          @endcan
          @can('servicio.destroy')
          <td></td>
          @endcan
        </tr>
      </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>
@endsection
