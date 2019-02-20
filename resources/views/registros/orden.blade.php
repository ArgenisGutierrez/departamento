@extends('home')
@section('title','- Ordenes')
@section('content')

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<section class="content-header">
    <h1>
        Registro de Datos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Ordenes</a></li>
        <li class="active">Registrar</li>
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
            @include('common.status')
            <form class="form-horizontal" method="post" action="/orden">
                @csrf
                <div class="box-body">
                    <input type="text" hidden name="nombre" value="{{ Auth::user()->name }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-body">
                                <label>Folio DPA</label>
                                <select class="js-example-basic-single form-control" name="folio_dpa">
                                    <option value="Ene">Ene</option>
                                    <option value="Feb">Feb</option>
                                    <option value="Mar">Mar</option>
                                    <option value="Abr">Abr</option>
                                    <option value="May">May</option>
                                    <option value="Jun">Jun</option>
                                    <option value="Jul">Jul</option>
                                    <option value="Ago">Ago</option>
                                    <option value="Oct">Oct</option>
                                    <option value="Nov">Nov</option>
                                    <option value="Dic">Dic</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-body">
                                <label>No. Oficio</label>
                                <input name="no_oficio" type="text" class="form-control" placeholder="Ingresa el No. Oficio"
                                    required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-body">
                                <label>Fecha:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="fecha" type="date" class="form-control pull-right">
                                </div><!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <label>Encargado:</label>
                                <select class="js-example-basic-single form-control" required autocomplete="off" id="id_area" name="id_area">
                                    <?php $area=departamento\Area::all() ?>
                                    @foreach($area as $areas)
                                    <option value="{{$areas->id_area}}">{{$areas->encargado}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <label>Area que Envia:</label>
                                <div class="form-control" id="nombre_area" name="nombre_area">
                                </div>
                                <label>Cargo</label>
                                <div class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <label>Recibio</label>
                                <select id="area_dos" class="js-example-basic-single form-control" required
                                    autocomplete="off" name="id_area_dos">
                                    <?php $areados=departamento\AreaDos::all() ?>
                                    @foreach($areados as $areasdos)
                                    <option value="{{$areasdos->id_area_dos}}">{{$areasdos->encargado}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <label>Cargo</label>
                                <label class="form-control" id="area2_cargo"></label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Registro de servicios</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-body">
                                <label>Marca:</label>
                                <select name="marca" id="marca" class="js-example-basic-single form-control dynamic" data-dependent="tipo">
                                    <option value="">Selecciona Marca</option>
                                    @foreach($marca_list as $marca)
                                    <option value="{{ $marca->marca}}">{{ $marca->marca }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-body">
                                <label>Tipo:</label>
                                <select name="tipo" id="tipo" class="js-example-basic-single form-control dynamic" data-dependent="modelo">
                                    <option value="">Selecciona Tipo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-body">
                                <label>Modelo:</label>
                                <select name="modelo" id="modelo" class="js-example-basic-single form-control input-lg">
                                    <option value="">Selecciona Modelo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>Servicio</label>
                    <select class="js-example-basic-single form-control" name="servicio">

                    </select>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de Servicio:</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="flat-red" name="tipo" id="optionsRadios1" value="correctivo"
                                            required>
                                        Correctivo
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="flat-red" name="tipo" id="optionsRadios2" value="preventivo"
                                            required>
                                        Preventivo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Otros Servicio:</label>
                                <div class="checkbox">
                                    <label>
                                        <input name="enllantamiento" type="checkbox" class="flat-red" value="si">
                                        Enllantamiento
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="mano_obra" type="checkbox" class="flat-red" value="si">
                                        Mano de Obra
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="refacciones" type="checkbox" class="flat-red" value="si">
                                        Refacciones
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Serie:</label>
                        <select class="js-example-basic-single form-control" required autocomplete="off" name="id_unidad">
                            <?php $unidad=departamento\unidad::all() ?>
                            @foreach($unidad as $unidades)
                            <option value="{{$unidades->id_unidad}}">{{$unidades->serie}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="box-body">
                            <div class="rows">
                                <div class="col-md-6">
                                    <label>Marca:</label>
                                    <div class="form-control">

                                    </div>
                                    <label>Tipo:</label>
                                    <div class="form-control">

                                    </div>
                                    <label>Placa:</label>
                                    <div class="form-control">

                                    </div>
                                    <label>Modelo:</label>
                                    <div class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>No. Economico:</label>
                                    <div class="form-control">

                                    </div>
                                    <label>cil:</label>
                                    <div class="form-control">

                                    </div>
                                    <label>Uso:</label>
                                    <div class="form-control">

                                    </div>
                                    <label>Familia:</label>
                                    <div class="form-control">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <label>KM:</label>
                                <input name="km" type="number" class="form-control" placeholder="Ingresa los KM"
                                    required autocomplete="off">
                            </div>
                            <div class="box-body">
                                <label>Taller:</label>
                                <select class="js-example-basic-single form-control" required autocomplete="off" name="id_taller">
                                    <?php $taller=departamento\taller::all() ?>
                                    @foreach($taller as $talleres)
                                    <option value="{{$talleres->id_taller}}">{{$talleres->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <label>Fecha de Ingreso al Taller:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="fecha_ingreso" type="date" class="form-control pull-right">
                                </div><!-- /.input group -->
                            </div>
                            <div class="box-body">
                                <label>Fecha de Salidad del Taller:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="fecha_salida" type="date" class="form-control pull-right">
                                </div><!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <input type="text" name="estado" value="Activa" hidden>
                    <input type="text" name="id" value="{{ Auth::user()->id }}" hidden>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!--buscador de los select-->
<script type="text/javascript">
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
</script>
<!--select dinamico para obtener el anexo-->
<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('selectdinamico.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }
   })
  }
 });
 $('#marca').change(function(){
  $('#tipo').val('');
  $('#modelo').val('');
 });

 $('#tipo').change(function(){
  $('#modelo').val('');
 });
});
</script>


@endsection