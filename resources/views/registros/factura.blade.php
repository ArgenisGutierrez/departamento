@extends('home')
@section('title','- Facturas')
@section('content')
<section class="content-header">
    <h1>
        Registro de Datos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Facturas</a></li>
        <li class="active">Registrar</li>
    </ol>
</section>
<section class="content">
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Factura</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            @include('common.status')
            <form class="form-horizontal" method="post" action="/factura">
                @csrf
                <div class="box-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Folio DPA:</label>
                            <select class="form-control" name="id_orden">
                                <?php $orden=departamento\orden::all() ?>
                                @foreach($orden as $ordenes)
                                @if($ordenes->factura==null && $ordenes->estado=="Activa")
                                <option value="{{$ordenes->id_orden}}">{{$ordenes->folio_dpa}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>N° Tramite:</label>
                            <input name="no_tramite" type="text" class="form-control" placeholder="Ingresa el Folio"
                                required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Importe:</label>
                            <input name="importe" type="number" step="0.01" min="0" class="form-control" placeholder="Ingresa el Importe"
                                required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Fecha:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="fecha" type="date" class="form-control pull-right">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section>
@endsection
