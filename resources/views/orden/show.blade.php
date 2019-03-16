@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
    <h1>
        Detalles de la orden
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Orden</a></li>
        <li class="active">Detalle</li>
    </ol>
</section>

<section class="content">
    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Orden</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="box-body">
                <input type="text" hidden name="nombre" value="{{ Auth::user()->name }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box-body">
                            <label>Folio DPA</label>
                            <label class="form-control">{{$orden->folio_dpa}}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-body">
                            <label>No. Oficio</label>
                            <label class="form-control">{{$orden->no_oficio}}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-body">
                            <label>Fecha:</label>
                            <label class="form-control">{{$orden->fecha}}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-body">
                            <label>Encargado:</label>
                            <label class="form-control">{{$orden->area->encargado}}</label>
                        </div>
                        <div class="box-body">
                            <label>Area que Envia:</label>
                            <textarea class="form-control" cols="30" rows="2" readonly style="resize:none;">{{$orden->area->nombre}}</textarea>
                            <label>Cargo</label>
                            <input type="text" class="form-control" value="{{$orden->area->cargo}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-body">
                            <label>Recibio</label>
                            <label class="form-control">{{$orden->areados->encargado}}</label>
                        </div>
                        <div class="box-body">
                            <label>Cargo</label>
                            <label class="form-control">{{$orden->areados->cargo}}</label>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="detalle" name="detalle" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Descripcion</th>
                            <th>Importe Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $servicios=departamento\detalle::all() ?>
                        @foreach($servicios as $servicio)
                        @if($servicio->id_orden==$orden->id_orden)
                        <tr>
                            <th>{{$servicio->cantidad}}</th>
                            <th>{{$servicio->servicio->nombre}}</th>
                            <th>${{number_format($servicio->subtotal, 2)}}</th>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th>Total con IVA</th>
                        <th></th>
                        <th>
                            <h4>${{number_format($orden->importe_cotizacion, 2)}}</h4>
                        </th>
                    </tfoot>
                </table>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipo de Servicio:</label>
                            <div class="radio">
                                <label>
                                    @if($orden->correctivo==="si")
                                    <input type="radio" checked class="flat-red" name="tipo" id="optionsRadios1" value="correctivo"
                                        required>
                                    Correctivo
                                    @else
                                    <input type="radio" class="flat-red" name="tipo" id="optionsRadios1" value="correctivo"
                                        required>
                                    Correctivo
                                    @endif
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    @if($orden->preventivo==="si")
                                    <input type="radio" checked class="flat-red" name="tipo" id="optionsRadios2" value="preventivo"
                                        required>
                                    Preventivo
                                    @else
                                    <input type="radio" class="flat-red" name="tipo" id="optionsRadios2" value="preventivo"
                                        required>
                                    Preventivo
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Otros Servicio:</label>
                            <div class="checkbox">
                                <label>
                                    @if($orden->enllantamiento=="si")
                                    <input name="enllantamiento" checked type="checkbox" class="flat-red" value="si">
                                    Enllantamiento
                                    @else
                                    <input name="enllantamiento" type="checkbox" class="flat-red" value="si">
                                    Enllantamiento
                                    @endif
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    @if($orden->mano_obra=="si")
                                    <input name="mano_obra" checked type="checkbox" class="flat-red" value="si">
                                    Mano de Obra
                                    @else
                                    <input name="mano_obra" type="checkbox" class="flat-red" value="si">
                                    Mano de Obra
                                    @endif
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    @if($orden->refacciones=="si")
                                    <input name="refacciones" checked type="checkbox" class="flat-red" value="si">
                                    Refacciones
                                    @else
                                    <input name="refacciones" type="checkbox" class="flat-red" value="si">
                                    Refacciones
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Serie:</label>
                    <label class="form-control">{{$orden->unidad->serie}}</label>
                </div>
                <div class="form-group">
                    <div class="box-body">
                        <div class="rows">
                            <div class="col-md-6">
                                <label>Marca:</label>
                                <label class="form-control">{{$orden->unidad->marca}}</label>
                                <label>Tipo:</label>
                                <label class="form-control">{{$orden->unidad->tipo}}</label>
                                <label>Placa:</label>
                                <label class="form-control">{{$orden->unidad->placa}}</label>
                                <label>Modelo:</label>
                                <label class="form-control">{{$orden->unidad->modelo}}</label>
                            </div>
                            <div class="col-md-6">
                                <label>No. Economico:</label>
                                <label class="form-control">{{$orden->unidad->no_economico}}</label>
                                <label>cil:</label>
                                <label class="form-control">{{$orden->unidad->cil}}</label>
                                <label>Uso:</label>
                                <label class="form-control">{{$orden->unidad->uso}}</label>
                                <label>Familia:</label>
                                <label class="form-control">{{$orden->unidad->familia}}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-body">
                            <label>Combustible:</label>
                            <label class="form-control">{{$orden->combustible}}</label>
                        </div>
                        <div class="box-body">
                            <label>KM:</label>
                            <label class="form-control">{{$orden->km}}</label>
                        </div>
                        <div class="box-body">
                            <label>Taller:</label>
                            <label class="form-control">{{$orden->taller->nombre}}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-body">
                            <label>Zona:</label>
                            <label class="form-control">{{$orden->region}}</label>
                        </div>
                        <div class="box-body">
                            <label>Fecha de Ingreso al Taller:</label>
                            <label class="form-control">{{$orden->fecha_ingreso}}</label>
                        </div>
                        <div class="box-body">
                            <label>Fecha de Salidad del Taller:</label>
                            <label class="form-control">{{$orden->fecha_salida}}</label>
                        </div>
                    </div>
                </div>
                <input type="text" name="estado" value="Activa" hidden>
                <input type="text" name="id" value="{{ Auth::user()->id }}" hidden>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section>
@endsection
