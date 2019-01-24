@extends('home')
@section('title','- Factura')
@section('content')
<section class="content-header">
    <h1>
      Lista de Roles
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Configuracion</a></li>
      <li class="active">Dictamen</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Datos del Dictamen</h3>
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
                <th>Jefe de Oficina de Maquinaria</th>
                <th>Jefe del Departamento de Recursos Materiales y Servicios Generales</th>
                <th>Jefe de Unidad Administrativa</th>
                <th>Actualizar</th>
            </tr>
        </thead>
      <tbody>
      <tr role="row" class="odd">
      @if($dictamen==null)
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      @else
      <td>{{$dictamen->jefe_oficina}}</td>
      <td>{{$dictamen->jefe_departamento}}</td>
      <td>{{$dictamen->jefe_unidad}}</td>
      <td>{!!Form::open(['route'=>['dictamen.edit',$dictamen->id], 'method'=>'GET'])!!}
        {!!Form::submit('Editar',['class'=>'btn  btn-block btn-warning btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endif
      </tr>
      <tfoot>
        <tr>
          <th>Jefe de Oficina de Maquinaria</th>
          <th>Jefe del Departamento de Recursos Materiales y Servicios Generales</th>
          <th>Jefe de Unidad Administrativa</th>
          <th>Actualizar</th>
        </tr>
      </tfoot>
      </table>
      @if($dictamen==null)
      <a href="{{route('dictamen.create')}}" class="btn btn-sm btn-primary">
        Registrar primera Informacion
      </a>
      @else
      @endif
    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>
@endsection
