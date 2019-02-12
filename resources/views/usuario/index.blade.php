@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Lista de Usuarios
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Mostrar</a></li>
      <li class="active">Usuarios</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Usuarios</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @include('common.status')
      <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th>Nombre</th>
                @can('usuario.show')
                <th >Correo</th>
                @endcan
                @can('usuario.edit')
                <th>Actualizar</th>
                @endcan
                @can('usuario.destroy')
                <th>Eliminar</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($users as $user)
      <tr role="row" class="odd">
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      @can('usuario.edit')
      <td>{!!Form::open(['route'=>['usuario.edit',$user->id], 'method'=>'GET'])!!}
        {!!Form::submit('Editar',['class'=>'btn  btn-block btn-warning btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('usuario.destroy')
      <td>{!!Form::open(['route'=>['usuario.destroy',$user->id], 'method'=>'DELETE'])!!}
        {!!Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th>Nombre</th>
          <th >Correo</th>
          @can('ususario.edit')
          <td></td>
          @endcan
          @can('ususario.destroy')
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
