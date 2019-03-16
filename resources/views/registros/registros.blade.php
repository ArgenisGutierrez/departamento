@extends('home')
@section('title','- Regristros')
@section('content')
<section class="content-header">
    <h1>
        Registro de Datos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Registros</a></li>
        <li class="active">Registrar</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Area que Envia</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    @include('common.status')
                    <!-- form start -->
                    <form class="form-group" method="post" action="{{route('area.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Area:</label>
                                <select class="form-control" name="nombre">
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
                                <label>Nombre del Encargado:</label>
                                <input name="encargado" type="text" class="form-control" placeholder="Ingresa el Nombre"
                                    required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Cargo que Ejerce:</label>
                                <input name="cargo" type="text" class="form-control" placeholder="Ingresa el Cargo"
                                    required autocomplete="off">
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            @can('area.create')
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            @endcan
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Taller</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                @if(session('status3'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{session('status3')}}</h4>
                </div>
                @endif
                <form class="form-horizontal" method="post" action="{{route('taller.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <label>Nombre:</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre del Taller" required
                            autocomplete="off">
                        <label>Sucursal:</label>
                        <input name="sucursal" type="text" class="form-control" placeholder="Lugar de la Sucursal"
                            required autocomplete="off">
                        <label>Telefono:</label>
                        <input name="telefono" type="tel" class="form-control" placeholder="Telefono de la Sucursal"
                            maxlength="12" required autocomplete="off">
                        <label>Correo</label>
                        <input name="correo" type="email" class="form-control" placeholder="Correo de la Sucursal"
                            required autocomplete="off">
                        <label>Logo:</label>
                        <input name="logo" type="file">
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        @can('taller.create')
                        <button type="submit" class="btn btn-info">Guardar</button>
                        @endcan
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <div class="box box-solid box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Area que Autoriza</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if(session('status2'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        <h4><i class="icon fa fa-check"></i>{{session('status2')}}</h4>
                    </div>
                    @endif
                    <form class="form-horizontal" action="{{route('area2.store')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <label>Nombre:</label>
                            <input name="encargado" type="text" class="form-control" placeholder="Nombre" required
                                autocomplete="off">
                            <label>Cargo:</label>
                            <input name="cargo" type="text" class="form-control" placeholder="Cargo" required
                                autocomplete="off">
                        </div>
                        <div class="box-footer">
                            @can('area2.create')
                            <button type="submit" class="btn btn-success">Guardar</button>
                            @endcan
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection
