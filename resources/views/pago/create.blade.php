@extends('home')
@section('title','- Facturas')
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
                            <input name="no_tramite" type="text" class="form-control" placeholder="Ingresa el N° de Tramite"
                                required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Area:</label>
                            <select class="form-control" name="area">
                                <option>Direccion General de Asuntos Internos</option>
                                <option>Direccion General de Transporte del Estado</option>
                                <option>Direccion General de Vinculacion Institucional</option>
                                <option>Direccion General del Centro de Planeacion y Estrategia</option>
                                <option>Secretaria Ejecutiva del Sistema y del Consejo Estatal de Seguridad Publica</option>
                                <option>Direccion General de la Fuerza Civil</option>
                                <option>Direccion General del Centro de Evaluacin y Control de Confianza</option>
                                <option>Unidad Administrativa</option>
                                <option>Ayudantia del C.Gobernador</option>
                                <option>Direccion General de Ejecucion de Medidas Sancionadoras</option>
                                <option>Direccion General de Prevencion y Reinsercion Social</option>
                                <option>Direccion General de Transito y Seguridad Vial</option>
                                <option>Direccion General del Centro Estatal de Control,Comando,Comunicaciones y
                                    Computo</option>
                                <option>Direccion General del Instituto de Formacion: Centro de Estudios e
                                    Investigacion en Seguridad</option>
                                <option>Direccion General Juridica</option>
                                <option>Subsecretaria de Logistica</option>
                                <option>Subsecretaria de Operaciones</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Placa o Serie:</label>
                            <input name="serie" type="text" class="form-control" placeholder="Ingresa la Placa o Serie"
                                required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Fecha:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="fecha_tramite" type="date" class="form-control pull-right">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="box-body">
                                    <label>Folio:</label>
                                    <input type="text" id="folio" name="folio" class="form-control"
                                        value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box-body">
                                    <label>Importe:</label>
                                    <input type="number" min="0" id="importe" name="importe" class="form-control"
                                        value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box-body">
                                    <label>Fecha:</label>
                                    <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="fecha_pago" id="fecha_pago" type="date" class="form-control pull-right">
                                </div><!-- /.input group -->
                                </div>
                            </div>
                            <input type="number" hidden name="total_tramite" id="total_tramite" >
                            <div class="col-md-3">
                                <div class="box-body">
                                <label>Agregar:</label><br>
                                    <button type="button" id="bt_add" class="btn btn-primary">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="estado" value="Activa" hidden>
                        <br>
                        <table class="table table-bordered table-striped" id="detalle" name="detalle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha</th>
                                    <th>Importe</th>
                                    <th style="text-align:center">X</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <th>Total</th>
                                <th></th>
                                <th>
                                    <h4 id="total_tabla">S/ 0.00</h4>
                                </th>
                                <th></th>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="box-footer">
                <button type="submit" id="guardar" name="guardar" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Tabla de Servicios -->
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
        folio = $("#folio").val();
        importe = $("#importe").val();
        fecha = $("#fecha_pago").val();
        //Validar los campos
        if (folio != "" && importe != "" && fecha != "") {
            //subtotal array inicie en el indice cero
            valor = parseFloat(importe);
            //console.log(valor);
            precio[cont] = valor;
            total = total + precio[cont];
            var fila = '<tr class="selected" id="fila' + cont +
                '"><td><input type="text" readonly="readonly" name="folio[]" value="' + folio +
                '"></td><td><input type="date" readonly name="fecha[]" value="' + fecha + '">' + 
                '</td><td><input type="number" readonly="readonly" name="total[]" value="' + valor + '"></td><td>' +
                '</td><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont +
                ')">X</button></td></tr>';
            cont++;
            $("#total_tabla").html("$" + total.toLocaleString());
            document.getElementById("total_tramite").value = total;
            evaluar();
            $("#detalle").append(fila);
            //console.log(total);
            limpiar();
        } else {
            alert("Error al ingresar el servicio, revise los datos");
        }
    }

    function limpiar(){
        document.getElementById("folio").value = "";
        document.getElementById("fecha_pago").value = "";
        document.getElementById("importe").value = "";
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }
    function eliminar(index) {
        total = total - precio[index];
        $("#total_tabla").html("$" + total.toLocaleString());
        $("#fila" + index).remove();
        document.getElementById("total_tramite").value = total;
        evaluar();
    }
</script>
@endsection