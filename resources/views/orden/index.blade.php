@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
      Lista de Ordenes
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li><a href="#">Mostrar</a></li>
      <li class="active">Ordenes</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-solid box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Lista de Ordenes</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="box-body table-responsive no-padding">
      @include('common.status')
      <table class="table table-bordered " id="myTable">
        <thead>
            <tr>
              <th>Folio DPA</th>
              <th>No. de Oficio</th>
              <th>Fecha</th>
              <th>Area que Envia</th>
              <th>Marca</th>
              <th>Tipo</th>
              <th>Placa</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Taller</th>
              <th>Importe Cotizacion</th>
              <th>Fecha Ingreso</th>
              <th>Fecha Salida</th>
              <th>Elaboro</th>
                @can('orden.pdf')
                <th>Dictamen</th>
                @endcan
                @can('orden.show')
                <th>Detalle</th>
                @endcan
                @can('orden.destroy')
                <th>Eliminar</th>
                @endcan
            </tr>
        </thead>
      <tbody>
      @foreach($ordenes as $orden)
      @if($orden->estado=="Activa")
      <tr style="background:rgb(194, 235, 194)" role="row" class="odd">
        <td>{{$orden->folio_dpa}}</td>
        <td>{{$orden->no_oficio}}</td>
        <td>{{$orden->fecha}}</td>
        <td>{{$orden->area->nombre}}</td>
        <td>{{$orden->unidad->marca}}</td>
        <td>{{$orden->unidad->tipo}}</td>
        <td>{{$orden->unidad->placa}}</td>
        <td>{{$orden->unidad->modelo}}</td>
        <td>{{$orden->unidad->serie}}</td>
        <td>{{$orden->taller->nombre}}</td>
        <td>${{number_format($orden->importe_cotizacion, 2)}}</td>
        <td>{{$orden->fecha_ingreso}}</td>
        <td>{{$orden->fecha_salida}}</td>
        <td>{{$orden->user->name}}</td>
        @can('orden.pdf')
      <td>
        {!!Form::open(['route'=>['orden.pdf',$orden->id_orden], 'method'=>'GET'])!!}
        {!! Form::submit('Imprimir',['class'=>'btn btn-block btn-primary btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @can('orden.show')
      <td>
      {!!Form::open(['route'=>['orden.show',$orden->id_orden], 'method'=>'GET'])!!}
      {!! Form::submit('Mostrar',['class'=>'btn btn-block btn-success btn-xs'])!!}
      {!!Form::close()!!}
      </td>
      @endcan
      @if($orden->estado==="Activa")
      @can('orden.destroy')
      <td>{!!Form::open(['route'=>['orden.destroy',$orden->id_orden], 'method'=>'DELETE'])!!}
        {!! Form::submit('Cancelar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @endif
      </tr>
      @else
      <tr style="background:rgb(218, 169, 169)" role="row" class="odd">
      <td>{{$orden->folio_dpa}}</td>
        <td>{{$orden->no_oficio}}</td>
        <td>{{$orden->fecha}}</td>
        <td>{{$orden->area->nombre}}</td>
        <td>{{$orden->unidad->marca}}</td>
        <td>{{$orden->unidad->tipo}}</td>
        <td>{{$orden->unidad->placa}}</td>
        <td>{{$orden->unidad->modelo}}</td>
        <td>{{$orden->unidad->serie}}</td>
        <td>{{$orden->taller->nombre}}</td>
        <td>${{number_format($orden->importe_cotizacion, 2)}}</td>
        <td>{{$orden->fecha_ingreso}}</td>
        <td>{{$orden->fecha_salida}}</td>
        <td>{{$orden->user->name}}</td>
        @can('orden.pdf')
      <td>
        {!!Form::open(['route'=>['orden.pdf',$orden->id_orden], 'method'=>'GET'])!!}
          {!! Form::submit('Imprimir',['class'=>'btn btn-block btn-primary btn-xs'])!!}
          {!!Form::close()!!}
      </td>
      @endcan
      @can('orden.show')
      <td>
      {!!Form::open(['route'=>['orden.show',$orden->id_orden], 'method'=>'GET'])!!}
      {!! Form::submit('Mostrar',['class'=>'btn btn-block btn-success btn-xs'])!!}
      {!!Form::close()!!}
      </td>
      @endcan
      @if($orden->estado==="Activa")
      @else
      @can('orden.activar')
      <td>{!!Form::open(['route'=>['orden.destroy',$orden->id_orden], 'method'=>'PUT'])!!}
        {!! Form::submit('Activar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
        {!!Form::close()!!}
      </td>
      @endcan
      @endif
      </tr>
      @endif
      @endforeach
      <tfoot>
        <tr>
        <th>Folio DPA</th>
              <th>No. de Oficio</th>
              <th>Fecha</th>
              <th >Area que Envia</th>
              <th>Marca</th>
              <th>Tipo</th>
              <th>Placa</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Taller</th>
              <th>Importe Cotizacion</th>
              <th>Fecha Ingreso</th>
              <th>Fecha Salida</th>
              <th>Elaboro</th>
          @can('orden.pdf')
          <td></td>
          @endcan
          @can('orden.show')
          <td></td>
          @endcan
          @can('orden.destroy')
          <td></td>
          @endcan
        </tr>
      </tfoot>
      </table>
      @can('orden.xlsx')
      {!!Form::open(['route'=>['orden.xlsx'], 'method'=>'GET'])!!}
        {!! Form::submit('Exportar Ordenes',['class'=>'btn btn-info'])!!}
        {!!Form::close()!!}
        @endcan
    </div><!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box -->
  </section>
@endsection
