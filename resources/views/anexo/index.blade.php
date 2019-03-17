@extends('home')
@section('title','- Anexo')
@section('content')
<section class="content-header">
    <h1>
      Lista del modelos del Anexo
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
    <h3 class="box-title">Lista del Modelos</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @include('common.status')
      <table class="table table-bordered table-striped" id="myTable" style="width:100%">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Cil</th>
                <th>Servicios</th>
                @can('anexo.edit')
                <th>Actualizar</th>
                @endcan
                @can('anexo.destroy')
                <th>Eliminar</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($anexos as $anexo)
      <tr role="row" class="odd">
      <td>{{$anexo->marca}}</td>
      <td>{{$anexo->tipo}}</td>
      <td>{{$anexo->modelo}}</td>
      <td>{{$anexo->cil}}</td>
      @can('anexo.show')
      <td>
        {!!Form::open(['route'=>['anexo.show',$anexo->id_anexo], 'method'=>'GET'])!!}
        {!!Form::submit('Mostrar',['class'=>'btn  btn-block btn-primary btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('anexo.edit')
      <td>
        {!!Form::open(['route'=>['anexo.edit',$anexo->id_anexo], 'method'=>'GET'])!!}
        {!!Form::submit('Editar',['class'=>'btn  btn-block btn-warning btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('anexo.destroy')
      <td>
        {!!Form::open(['route'=>['anexo.destroy',$anexo->id_anexo], 'method'=>'DELETE'])!!}
        {!!Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th>Marca</th>
          <th>Tipo</th>
          <th>Modelo</th>
          <th>Cil</th>
          <td></td>
          @can('anexo.edit')
          <td></td>
          @endcan
          @can('anexo.destroy')
          <td></td>
          @endcan
        </tr>
      </tfoot>
      </table>
      <!--<a href="{{route('anexo.create')}}" class="btn btn-sm btn-primary">
        Registrar nuevo modelo
      </a>-->
    </div>
  </div>
</div>
  </section>
@endsection
