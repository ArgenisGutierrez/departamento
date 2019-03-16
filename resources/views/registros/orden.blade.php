@extends('home')
@section('title','- Ordenes')
@section('content')

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
                                    <option value="">Seleccionar Mes</option>
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
                                <select class="js-example-basic-single form-control" required autocomplete="off" id="id_area"
                                    name="id_area">
                                    <?php $area=departamento\Area::all() ?>
                                    <option value="">Seleccione Area</option>
                                    @foreach($area as $areas)
                                    <option value="{{$areas->id_area}}">{{$areas->encargado}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <label>Area que Envia:</label>
                                <textarea class="form-control" id="nombre_area" name="nombre_area" cols="30" rows="2"
                                    style="resize:none;" disabled></textarea>
                                <label>Cargo</label>
                                <div class="form-control" id="cargo_area" name="cargo_area" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <label>Recibio</label>
                                <select id="id_area_dos" class="js-example-basic-single form-control" required
                                    autocomplete="off" name="id_area_dos">
                                    <?php $areados=departamento\AreaDos::all() ?>
                                    <option value="">Seleccione Area 2</option>
                                    @foreach($areados as $areasdos)
                                    <option value="{{$areasdos->id_area_dos}}">{{$areasdos->encargado}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <label>Cargo</label>
                                <div class="form-control" id="cargo_area2" name="cargo_area2" disabled></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Registro de servicios</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-body">
                                <label>Marca:</label>
                                <select name="marca" id="marca" class="js-example-basic-single form-control dynamic"
                                    data-dependent="tipo">
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
                                <select name="tipo" id="tipo" class="js-example-basic-single form-control dynamic"
                                    data-dependent="modelo">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <label>Servicio:</label>
                                <select class="js-example-basic-single form-control" id="servicios" name="servicios">
                                    <option>Selecciona Servicio</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-body">
                                <label>Mano de Obra:</label>

                                <input type="text" disabled id="mano_obra" name="mano_obra" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-body">
                                <label>Refaccion:</label>

                                <input type="text" disabled id="refaccion" name="refaccion" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-body">
                                <label>Cantidad:</label>
                                <input class="form-control" type="number" name="cantidad" id="cantidad" min="0" value="1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="box-body">
                                <button type="button" id="bt_add" class="btn btn-primary">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped" id="detalle" name="detalle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Descripcion</th>
                                <th>Costo Unitario</th>
                                <th>Importe Total</th>
                                <th style="text-align:center">X</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th>
                                <h4 id="total">S/ 0.00</h4>
                            </th>
                            <input type="numbre" hidden name="importe_cotizacion" id="importe_cotizacion" value="">
                            <th></th>
                        </tfoot>
                    </table>
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
                        <select class="js-example-basic-single form-control" required autocomplete="off" name="id_unidad"
                            id="id_unidad">
                            <?php $unidad=departamento\unidad::all() ?>
                            <option value="">Seleccione Unidad</option>
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
                                    <div class="form-control" name="unidad_marca" id="unidad_marca" disabled>

                                    </div>
                                    <label>Tipo:</label>
                                    <div class="form-control" name="unidad_tipo" id="unidad_tipo" disabled>

                                    </div>
                                    <label>Placa:</label>
                                    <div class="form-control" name="unidad_placa" id="unidad_placa" disabled>

                                    </div>
                                    <label>Modelo:</label>
                                    <div class="form-control" name="unidad_modelo" id="unidad_modelo" disabled>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>No. Economico:</label>
                                    <div class="form-control" name="unidad_no_economico" id="unidad_no_economico"
                                        disabled>

                                    </div>
                                    <label>cil:</label>
                                    <div class="form-control" name="unidad_cil" id="unidad_cil" disabled>

                                    </div>
                                    <label>Uso:</label>
                                    <div class="form-control" name="unidad_uso" id="unidad_uso" disabled>

                                    </div>
                                    <label>Familia:</label>
                                    <div class="form-control" name="unidad_familia" id="unidad_familia" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <label>Combustible:</label>
                                <select name="combustible" id="combustible" class="js-example-basic-single form-control" required>
                                    <option value="">Seleccione la Zona</option>
                                    <option value="Gasolina">Gasolina</option>
                                    <option value="Disel">Disel</option>
                                </select>
                            </div>
                            <div class="box-body">
                                <label>KM:</label>
                                <input name="km" type="number" min="0" class="form-control" placeholder="Ingresa los KM"
                                    required autocomplete="off">
                            </div>
                            <div class="box-body">
                                <label>Taller:</label>
                                <select class="js-example-basic-single form-control" required autocomplete="off" name="id_taller">
                                    <?php $taller=departamento\taller::all() ?>
                                    <option value="">Selecciones Taller</option>
                                    @foreach($taller as $talleres)
                                    <option value="{{$talleres->id_taller}}">{{$talleres->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <label>Zona:</label>
                                <select name="region" id="region" class="js-example-basic-single form-control" required>
                                    <option value="">Seleccione la Zona</option>
                                    <option value="Norte">Norte</option>
                                    <option value="Centro">Centro</option>
                                    <option value="Sur">Sur</option>
                                </select>
                            </div>
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
                    <button type="submit" id="guardar" name="guardar" class="btn btn-success">Guardar</button>
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
    $(document).ready(function () {

        $('.dynamic').change(function () {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('selectdinamico.fetch') }}",
                    method: "POST",
                    data: {
                        select: select,
                        value: value,
                        _token: _token,
                        dependent: dependent
                    },
                    success: function (result) {
                        $('#' + dependent).html(result);
                    }
                })
            }
        });
        $('#marca').change(function () {
            $('#tipo').val('');
            $('#modelo').val('');
        });

        $('#tipo').change(function () {
            $('#modelo').val('');
        });
    });

</script>
<!-- Pedir Datos Area1 -->
<script>
    $(document).ready(function () {
        $('#id_area').change(function () {
            let id = $('#id_area').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('ajax.area')}}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    document.getElementById("nombre_area").innerHTML = data[0].nombre;
                    document.getElementById("cargo_area").innerHTML = data[0].cargo;
                }
            })
        })
    });

</script>
<!-- Pedir Datos Area2 -->
<script>
    $(document).ready(function () {
        $('#id_area_dos').change(function () {
            let id = $('#id_area_dos').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('ajax.area2')}}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    document.getElementById("cargo_area2").innerHTML = data[0].cargo;
                }
            })
        })
    });

</script>
<!-- Pedir Datos unidad -->
<script>
    $(document).ready(function () {
        $('#id_unidad').change(function () {
            let id = $('#id_unidad').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('ajax.unidad')}}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    //console.log(data);
                    document.getElementById("unidad_marca").innerHTML = data[0].marca;
                    document.getElementById("unidad_tipo").innerHTML = data[0].tipo;
                    document.getElementById("unidad_placa").innerHTML = data[0].placa;
                    document.getElementById("unidad_modelo").innerHTML = data[0].modelo;
                    document.getElementById("unidad_no_economico").innerHTML = data[0].no_economico;
                    document.getElementById("unidad_cil").innerHTML = data[0].cil;
                    document.getElementById("unidad_uso").innerHTML = data[0].uso;
                    document.getElementById("unidad_familia").innerHTML = data[0].familia;
                }
            })
        })
    });

</script>
<!-- Pedir servicios -->
<script>
    $(document).ready(function () {
        function ClearOptions() {
            document.getElementById('servicios').options.length = 0;
        }
        $('#modelo').change(function () {
            let marca = $('#marca').val();
            let tipo = $('#tipo').val();
            let modelo = $('#modelo').val();
            var miSelect = document.getElementById("servicios");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('ajax.servicios')}}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    marca: marca,
                    tipo: tipo,
                    modelo: modelo
                },
                dataType: 'JSON',
                success: function (data) {
                    //console.log(data);
                    ClearOptions();
                    data.forEach(function (element) {
                        //console.log(element.id_anexo);
                        var miOption = document.createElement("option");
                        miOption.value = element.id_servicio;
                        miOption.label = element.nombre;
                        miOption.innerHTML = element.nombre;
                        miSelect.appendChild(miOption);
                    });
                }
            })
        })
    });

</script>
<!-- Pedir  -->
<script>
    $(document).ready(function () {
        $('#servicios').change(function () {
            let id = $('#servicios').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('ajax.servicio')}}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    //console.log(data);
                    document.getElementById("mano_obra").value = data[0].mano_obra;
                    document.getElementById("refaccion").value = data[0].refaccion;
                }
            })
        })
    });

</script>
<!--  -->
<script>
    $(document).ready(function () {
        $("#bt_add").click(function () {
            agregar();
        });
    });
    var cont = 0;
    var total = 0;
    var precio = [];
    //Cuando cargue el documento
    //Ocultar el botón Guardar
    $("#guardar").hide();

    function agregar() {
        //Obtener los valores de los inputs
        id_servicio = $("#servicios").val();
        servicio = $("#servicios option:selected").text();
        cantidad = $("#cantidad").val();
        mano_obra = $("#mano_obra").val();
        refaccion = $("#refaccion").val();
        //Validar los campos
        if (id_servicio != "" && cantidad > 0 && mano_obra != "" && refaccion != "") {
            //subtotal array inicie en el indice cero
            valor = parseFloat(mano_obra) + parseFloat(refaccion);
            //console.log(valor);
            precio[cont] = (cantidad * valor);
            total = total + precio[cont];
            var fila = '<tr class="selected" id="fila' + cont +
                '"><td><input type="number" readonly="readonly" name="cantidad[]" value="' + cantidad +
                '"></td><td><input type="hidden" name="id_servicio[]" value="' + id_servicio + '">' + servicio +
                '</td><td><input type="number" readonly="readonly" name="subtotal[]" value="' + valor + '"></td><td>' +
                precio[cont].toLocaleString() +
                '</td><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont +
                ')">X</button></td></tr>';
            cont++;
            iva = total * 1.16;
            $("#total").html("$" + iva.toLocaleString());
            evaluar();
            $("#detalle").append(fila);
            document.getElementById("importe_cotizacion").value = iva;
        } else {
            alert("Error al ingresar el servicio, revise los datos");
        }
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        //total=total/1.16;
        total = total - precio[index];
        iva = total * 1.16;
        $("#total").html("$" + iva.toLocaleString());
        $("#fila" + index).remove();
        document.getElementById("importe_cotizacion").value = iva;
        evaluar();
    }

</script>
@endsection
