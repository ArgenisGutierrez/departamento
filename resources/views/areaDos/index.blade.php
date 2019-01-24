@extends('home')
@section('title','- Areas')
@section('content')
<!--dataTables-->

<section class="content-header">
    <h1>
      Lista del Area que Recibe
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Mostrar</a></li>
      <li class="active">Area 2</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Lista del Area que Recibe</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @if(session('status2'))
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <h4><i class="icon fa fa-check"></i>{{session('status2')}}</h4>
      </div>
      @endif
      <table class="table table-bordered table-striped" id="myTable"  >
        <thead>
            <tr>
                <th>Encargado</th>
                <th>Puesto</th>
                @can('area2.edit')
                <th>Actualizar</th>
                @endcan
                @can('area2.destroy')
                <th>Eliminar</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($areas2 as $area2)
      <tr role="row" class="odd">
      <td>{{$area2->encargado}}</td>
      <td>{{$area2->cargo}}</td>
      @can('area2.edit')
      <td>{!!Form::open(['route'=>['area2.edit',$area2->id_area_dos], 'method'=>'GET'])!!}
        {!!Form::submit('Editar',['class'=>'btn  btn-block btn-warning btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('area2.destroy')
      <td>{!!Form::open(['route'=>['area2.destroy',$area2->id_area_dos], 'method'=>'DELETE'])!!}
        {!!Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th>Encargado</th>
          <th>Puesto</th>
          @can('area2.edit')
          <th>Actualizar</th>
          @endcan
          @can('area2.destroy')
          <th>Eliminar</th>
          @endcan
        </tr>
      </tfoot>
      </table>
      @can('areaDos.xlsx')
      {!!Form::open(['route'=>['areaDos.xlsx'], 'method'=>'GET'])!!}
        {!! Form::submit('Exportar Datos',['class'=>'btn btn-info'])!!}
        {!!Form::close()!!}
        @endcan
    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>
@endsection
