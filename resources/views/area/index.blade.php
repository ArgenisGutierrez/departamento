@extends('home')
@section('title','- Areas')
@section('content')
<!--dataTables-->
<section class="content-header">
    <h1>
      Lista del Area
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Mostrar</a></li>
      <li class="active">Area 1</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Lista del Area</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @include('common.status')
      <table class="table table-bordered table-striped" id="myTable" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Encargado</th>
                <th>Puesto</th>
                @can('area.edit')
                <th>Actualizar</th>
                @endcan
                @can('area.destroy')
                <th>Eliminar</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($areas as $area)
      <tr role="row" class="odd">
      <td>{{$area->nombre}}</td>
      <td>{{$area->encargado}}</td>
      <td>{{$area->cargo}}</td>
      @can('area.edit')
      <td>{!!Form::open(['route'=>['area.edit',$area->id_area], 'method'=>'GET'])!!}
        {!!Form::submit('Editar',['class'=>'btn  btn-block btn-warning btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('area.destroy')
      <td>{!!Form::open(['route'=>['area.destroy',$area->id_area], 'method'=>'DELETE'])!!}
        {!!Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th>Nombre</th>
          <th>Encargado</th>
          <th>Puesto</th>
          @can('area.edit')
          <th>Actualizar</th>
          @endcan
          @can('area.destroy')
          <th>Eliminar</th>
          @endcan
        </tr>
      </tfoot>
      </table>
      @can('area.xlsx')
      {!!Form::open(['route'=>['area.xlsx'], 'method'=>'GET'])!!}
        {!! Form::submit('Exportar Datos',['class'=>'btn btn-info'])!!}
        {!!Form::close()!!}
        @endcan
    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>
@endsection
