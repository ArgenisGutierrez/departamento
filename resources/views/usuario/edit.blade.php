@extends('home')
@section('title','- Editar Usuario')
@section('content')
  <div class="content">
    <div class="box box-solid box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Usuario</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
          <div class="box-body">
            {!! Form::model($user,['route'=>['usuario.update',$user],'method' => 'PUT','files'=>true])!!}
            <div class="form-gorup">
              {{Form::label('name', 'Nombre') }}
              {{Form::text('name', null, ['class'=>'form-control'])}}
            </div>
            <div class="form-gorup">
              {{Form::label('email', 'Correo') }}
              {{Form::text('email', null, ['class'=>'form-control'])}}
            </div>
            <hr>
            <h3>Lista de Roles</h3>
            <div class="form-group">
              <ul class="list-unstyled">
                @foreach($roles as $role)
                <li>
                  <label>
                    {{Form::checkbox('roles[]', $role->id, null) }}
                    {{$role->name}}
                    <em>{{$role->description ?: 'Sin Descripcion'}}</em>
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
