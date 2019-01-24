@extends('home')
@section('title','- Editar Rol')
@section('content')
  <div class="content">
    <div class="box box-solid box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Rol</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
          <div class="box-body">
            {!! Form::model($role,['route'=>['roles.update',$role],'method' => 'PUT','files'=>true])!!}
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
      </div><!-- /.box-body -->
  </div>

@endsection
