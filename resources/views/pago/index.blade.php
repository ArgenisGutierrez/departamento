@extends('home')
@section('title','- Ordenes de Pago')
@section('content')
<section class="content-header">
    <h1>
        Lista de Ordenes de Pago
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
            <h3 class="box-title">Lista de Ordenes de Pago</h3>
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
                            <th>N° Tramite</th>
                            <th>Area</th>
                            <th>Placa/Serie</th>
                            <th>Importe</th>
                            <th>Fecha</th>
                            @can('ordenpago.show')
                            <th>Detalles</th>
                            @endcan
                            @can('ordenpago.destroy')
                            <th>Estado</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ordenespago as $orden)
                        @if($orden->estado=="Activa")
                        <tr style="background:rgb(194, 235, 194)" role="row" class="odd">
                            <th>{{$orden->no_tramite}}</th>
                            <th>{{$orden->area}}</th>
                            <th>{{$orden->serie}}</th>
                            <th>${{number_format($orden->total, 2)}}</th>
                            <th>{{$orden->fecha}}</th>
                            @can('ordenpago.show')
                            <td>
                                {!!Form::open(['route'=>['ordenpago.show',$orden->id_orden_pago], 'method'=>'GET'])!!}
                                {!! Form::submit('Mostrar',['class'=>'btn btn-block btn-success btn-xs'])!!}
                                {!!Form::close()!!}
                            </td>
                            @endcan
                            @can('ordenpago.destroy')
                            <td>
                                {!!Form::open(['route'=>['ordenpago.destroy',$orden->id_orden_pago],
                                'method'=>'DELETE'])!!}
                                {!!Form::submit('Cancelar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
                                {!!Form::close()!!}
                            </td>
                            @endcan
                        </tr>
                        @else
                        <tr style="background:rgb(218, 169, 169)" role="row" class="odd">
                            <th>{{$orden->no_tramite}}</th>
                            <th>{{$orden->area}}</th>
                            <th>{{$orden->serie}}</th>
                            <th>${{number_format($orden->total, 2)}}</th>
                            <th>{{$orden->fecha}}</th>
                            @can('ordenpago.show')
                            <td>
                                {!!Form::open(['route'=>['ordenpago.show',$orden->id_orden_pago], 'method'=>'GET'])!!}
                                {!! Form::submit('Mostrar',['class'=>'btn btn-block btn-success btn-xs'])!!}
                                {!!Form::close()!!}
                            </td>
                            @endcan
                            @can('ordenpago.activar')
                            <td>
                                {!!Form::open(['route'=>['ordenpago.activar',$orden->id_orden_pago],
                                'method'=>'PUT'])!!}
                                {!!Form::submit('Activar',['class'=>'btn btn-block btn-danger btn-xs'])!!}
                                {!!Form::close()!!}
                            </td>
                            @endcan
                        </tr>
                        @endif
                        @endforeach
                    <tfoot>
                        <tr>
                            <th>N° Tramite</th>
                            <th>Area</th>
                            <th>Placa/Serie</th>
                            <th>Importe</th>
                            <th>Fecha</th>
                            @can('ordenpago.show')
                            <th>Detalles</th>
                            @endcan
                            @can('ordenpago.destroy')
                            <th>Eliminar</th>
                            @endcan
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
            @can('ordenpago.xlsx')
            {!!Form::open(['route'=>['ordenpago.xlsx'], 'method'=>'GET'])!!}
            {!! Form::submit('Exportar Datos',['class'=>'btn btn-info'])!!}
            {!!Form::close()!!}
            @endcan
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section>
@endsection
