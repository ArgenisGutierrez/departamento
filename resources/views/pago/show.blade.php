@extends('home')
@section('title','- Facturas')
@section('content')
<?php $detalles=departamento\DetallePago::all(); ?>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<section class="content-header">
    <h1>
        Registro de Datos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Orden de Pago</a></li>
        <li class="active">Registrar</li>
    </ol>
</section>
<section class="content">
    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Orden de pago</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            @include('common.status')
            <form class="form-horizontal" method="post" action="/ordenpago">
                @csrf
                <div class="box-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>N° de Tramite:</label>
                            <label class="form-control">{{$ordenPago->no_tramite}}</label>
                        </div>
                        <div class="form-group">
                            <label>Area:</label>
                            <label class="form-control">{{$ordenPago->area}}</label>
                        </div>
                        <div class="form-group">
                            <label>Placa o Serie:</label>
                            <label class="form-control">{{$ordenPago->serie}}</label>
                        </div>
                        <div class="form-group">
                            <label>Fecha:</label>
                            <label class="form-control">{{$ordenPago->fecha}}</label>
                        </div>
                        <br>
                        <table class="table table-bordered table-striped" id="detalle" name="detalle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detalles as $detalle)
                                @if($ordenPago->id_orden_pago==$detalle->id_orden_pago)
                                <tr>
                                    <th>{{$detalle->folio}}</th>
                                    <th>{{$detalle->fecha_pago}}</th>
                                    <th>${{number_format($detalle->importe, 2)}}</th>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>Total</th>
                                <th></th>
                                <th>
                                    <h4>${{number_format($ordenPago->total, 2)}}</h4>
                                </th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
