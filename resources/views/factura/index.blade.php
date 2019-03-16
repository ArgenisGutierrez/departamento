@extends('home')
@section('title','- Facturas')
@section('content')
<!--dataTables-->
<section class="content-header">
    <h1>
      Lista de Facturas
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Mostrar</a></li>
      <li class="active">Facturas</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Facturas</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @include('common.status')
      <table class="table table-bordered table-striped" id="myTable"style="width:100%">
        <thead>
            <tr>
                <th>Folio DPA</th>
                <th>N° de Tramite</th>
                <th>Importe</th>
                <th>Fecha</th>
                @can('factura.edit')
                <th>Actualizar</th>
                @endcan
                @can('factura.destroy')
                <th>Eliminar</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($facturas as $factura)
      <?php $orden=departamento\orden::where('id_orden',$factura->id_orden)->value('folio_dpa');?>
      <tr role="row" class="odd">
        <th>{{$orden}}</th>
        <th>{{$factura->no_tramite}}</th>
        <th>${{$factura->importe}}</th>
        <th>{{$factura->fecha}}</th>
        @can('factura.edit')
      <td>
        {!!Form::open(['route'=>['factura.edit',$factura->id_factura], 'method'=>'GET'])!!}
          {!!Form::submit('Editar',['class'=>'btn btn-block btn-warning btn-xs'])!!}
          {!!Form::close()!!}
      </td>
      @endcan
      @can('factura.destroy')
      <td>
        {!!Form::open(['route'=>['factura.destroy',$factura->id_factura], 'method'=>'DELETE'])!!}
        {!!Form::submit('Eliminar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      </tr>
      @endforeach
      <tfoot>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          @can('factura.edit')
          <td></td>
          @endcan
          @can('factura.destroy')
          <td></td>
          @endcan
        </tr>
      </tfoot>
      </table>
    </div><!-- /.box-body -->
    @can('factura.xlsx')
    {!!Form::open(['route'=>['factura.xlsx'], 'method'=>'GET'])!!}
      {!! Form::submit('Exportar Datos',['class'=>'btn btn-info'])!!}
      {!!Form::close()!!}
      @endcan
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>
@endsection
