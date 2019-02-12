@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Lista de Archivos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Listado</a></li>
      <li class="active">Archivos</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Archivos</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      <table class="table table-bordered table-striped" id="myTable" style="width:100%">
        <thead>
            <tr>
                <th>Folio DPA</th>
                <th>Placa</th>
                <th>Serie</th>
                <th>No. Economico</th>
                @can('archivo.show')
                <th>Consultar</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($archivos as $archivo)
      <tr role="row" class="odd">
        <td>{{$archivo->orden->folio_dpa}}</td>
        <td>{{$archivo->orden->unidad->placa}}</td>
        <td>{{$archivo->orden->unidad->serie}}</td>
        <td>{{$archivo->orden->unidad->no_economico}}</td>
        @can('archivo.show')
        <td><a href="/archivo/{{$archivo->id_archivo}}"><button class="btn  btn-block btn-info btn-xs">Consultar</button></a></td>
        @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th>Folio DPA</th>
          <th>Placa</th>
          <th>Serie</th>
          <th>No. Economico</th>
          @can('archivo.show')
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
