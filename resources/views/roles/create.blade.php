@extends('home')
@section('title','- Crear Rol')
@section('content')

  <section class="content-header">
      <h1>
        Crear Rol
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Roles</a></li>
        <li class="active">Crear Rol</li>
      </ol>
    </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-solid box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Rol</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      @if(session('status'))
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        <h4><i class="icon fa fa-check"></i>{{session('status')}}</h4>
      </div>
      @endif
          <div class="box-body">
            {!! Form::open(['route'=>'roles.store'])!!}
            <div class="form-group">
              {{Form::label('name', 'Nombre') }}
              {{Form::text('name', null, ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
              {{Form::label('slug', 'URL Amigable') }}
              {{Form::text('slug', null, ['class'=>'form-control'])}}
            </div>
            <div class="form-group">
              {{Form::label('description', 'Descripcion') }}
              {{Form::textarea('description', null, ['class'=>'form-control'])}}
            </div>
            <hr>
            <h3>Permiso Especial</h3>
            <div class="form-group">
              <label>{{Form::radio('special', 'all-access') }} Acceso Total</label>
              <label>{{Form::radio('special', 'no-access') }} Ningun Acceso</label>
            </div>
            <hr>
            <h3>Lista de Permisos</h3>
            <div class="form-group">
              <ul class="list-unstyled">
                @foreach($permissions as $permission)
                <li>
                  <label>
                    {{Form::checkbox('permissions[]', $permission->id, null) }}
                    {{$permission->name}}
                    <em>{{$permission->description ?: 'Sin Descripcion'}}</em>
                  </label>
                </li>
                @endforeach
              </ul>
            </div>
        </div>
        <div class="box-footer">
          {{Form::submit('Guardar',['class'=>'btn btn-info'])}}
        </div>
        {!!Form::close()!!}
      </div>
  </section>
@endsection
