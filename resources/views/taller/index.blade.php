@extends('home')
@section('title','- Talleres')
@section('content')
<section class="content-header">
    <h1>
      Lista de Talleres
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Mostrar</a></li>
      <li class="active">Talleres</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Talleres</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @if(session('status3'))
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <h4><i class="icon fa fa-check"></i>{{session('status3')}}</h4>
      </div>
      @endif
      <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Sucursal</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Logo</th>
                @can('taller.edit')
                <th>Actualizar</th>
                @endcan
                @can('taller.destroy')
                <th>Eliminar</th>
                @endcan
                @can('taller.test')
                <th>Test</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($talleres as $taller)
      <tr role="row" class="odd">
      <td>{{$taller->nombre}}</td>
      <td>{{$taller->sucursal}}</td>
      <td>{{$taller->telefono}}</td>
      <td>{{$taller->correo}}</td>
      <td><img src="/imagenes/{{$taller->logo}}" class="img-circle" height="40px" width="40px"></td>
      @can('taller.edit')
      <td>{!!Form::open(['route'=>['taller.edit',$taller->id_taller], 'method'=>'GET'])!!}
        {!! Form::submit('Editar',['class'=>'btn btn-block btn-warning btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('taller.destroy')
      <td>{!!Form::open(['route'=>['taller.destroy',$taller->id_taller], 'method'=>'DELETE'])!!}
        {!! Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('taller.test')
      <td>{!!Form::open(['route'=>['taller.test',$taller->id_taller], 'method'=>'GET'])!!}
        {!! Form::submit('Imprimir',['class'=>'btn btn-block btn-primary btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th>Nombre</th>
          <th>Sucursal</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Logo</th>
          @can('taller.edit')
          <th>Actualizar</th>
          @endcan
          @can('taller.destroy')
          <th>Eliminar</th>
          @endcan
          @can('taller.test')
          <th>test</th>
          @endcan
        </tr>
      </tfoot>
      </table>
      @can('taller.xlsx')
      {!!Form::open(['route'=>['taller.xlsx'], 'method'=>'GET'])!!}
        {!! Form::submit('Exportar Datos',['class'=>'btn btn-info'])!!}
        {!!Form::close()!!}
        @endcan
    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>

@endsection
