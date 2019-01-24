@extends('home')
@section('title','- Roles')
@section('content')
<!--dataTables-->

<section class="content-header">
    <h1>
      Lista de Roles
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Usuarios</a></li>
      <li class="active">Roles</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Roles</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @if(session('status'))
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <h4><i class="icon fa fa-check"></i>{{session('status')}}</h4>
      </div>
      @endif
      <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th style="width:100px;">Rol</th>
                @can('roles.show')
                <th>Descripcion</th>
                @endcan
                @can('roles.edit')
                <th style="width:100px;">Actualizar</th>
                @endcan
                @can('roles.destroy')
                <th style="width:100px;">Eliminar</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($roles as $role)
      <tr role="row" class="odd">
      <td>{{$role->name}}</td>
      <td>{{$role->description}}</td>
      @can('roles.edit')
      <td>{!!Form::open(['route'=>['roles.edit',$role->id], 'method'=>'GET'])!!}
        {!!Form::submit('Editar',['class'=>'btn  btn-block btn-warning btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('roles.destroy')
      <td>{!!Form::open(['route'=>['roles.destroy',$role->id], 'method'=>'DELETE'])!!}
        {!!Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th>Rol</th>
          <th >Descripcion</th>
          @can('roles.edit')
          <th>Actualizar</th>
          @endcan
          @can('roles.destroy')
          <th>Eliminar</th>
          @endcan
        </tr>
      </tfoot>
      </table>
      @can('roles.create')
      <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary">
        Crear Nuevo Rol
      </a>
      @endcan
    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>
@endsection
