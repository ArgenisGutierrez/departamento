@extends('home')
@section('title','- Regristros')
@section('content')
  <section class="content-header">
      <h1>
        Registro de Datos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">Importar</a></li>
        <li class="active">Datos</li>
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
    <form class="form-group" method="post" action="{{route('importar.area')}}" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        <div>
          <strong>Instrucciones:</strong>
          <p>Para Subir los datos desde una hoja de excel la hoja debe ser de acuerdo a las siguientes caracteristicas
          :</p>
          <ul>
            <li>No debe contener encabezados.</li>
            <li>Solo debe tener la informacion en una sola hoja.</li>
            <li>Los datos deben estar registrados en 3 columnas con la siguiente informacion y mismo orden:</li>
            <ol type="A">
              <li>Nombre del Area.</li>
              <li>Nombre de la Persona a Cargo.</li>
              <li>Puesto.</li>
            </ol>
          </ul>
          <input type="file" name="Area" required>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      @can('importar.area')
      <button type="submit" class="btn btn-primary">Cargar</button>
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
    <form class="form-horizontal" method="post" action="{{route('importar.taller')}}" enctype="multipart/form-data" >
      @csrf
      <div class="box-body">
        <div>
          <strong>Instrucciones:</strong>
          <p>Para Subir los datos desde una hoja de excel la hoja debe ser de acuerdo a las siguientes caracteristicas
          :</p>
          <ul>
            <li>No debe contener encabezados.</li>
            <li>Solo debe tener la informacion en una sola hoja.</li>
            <li>Los datos deben estar registrados en 2 columnas con la siguiente informacion y mismo orden:</li>
            <ol type="A">
              <li>Nombre del Taller.</li>
              <li>Sucursal.</li>
              <li>Telefono.</li>
              <li>Correo.</li>
            </ol>
          </ul>
          <input type="file" name="Taller" required>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      @can('importar.taller')
      <button type="submit" class="btn btn-primary">Cargar</button>
      @endcan
    </div>
    </form>
  </div><!-- /.box-body -->

    <div class="box box-solid box-primary">
    <div class="box-header with-border">
    <h3 class="box-title">Modelos</h3>
    <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
    <form class="form-group" method="post" action="{{route('importar.anexo')}}" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
      <div>
        <strong>Instrucciones:</strong>
        <p>Para Subir los datos desde una hoja de excel la hoja debe ser de acuerdo a las siguientes caracteristicas
        :</p>
        <ul>
          <li>No debe contener encabezados.</li>
          <li>Solo debe tener la informacion en una sola hoja.</li>
          <li>Los datos deben estar registrados en 3 columnas con la siguiente informacion y mismo orden:</li>
          <ol type="A">
            <li>Marca.</li>
            <li>Tipo.</li>
            <li>Modelo.</li>
            <li>Cil.</li>
          </ol>
        </ul>
        <input type="file" name="Anexo" required>
      </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
    @can('importar.area')
    <button type="submit" class="btn btn-primary">Cargar</button>
    @endcan
    </div>
    </form>
    </div><!-- /.box-body -->
    </div><!-- /.box -->

</div>
<div class="col-md-6">
  <div class="box box-solid box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Area que Autoriza</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
      <form class="form-horizontal" action="{{route('importar.areados')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div>
            <strong>Instrucciones:</strong>
            <p>Para Subir los datos desde una hoja de excel la hoja debe ser de acuerdo a las siguientes caracteristicas
            :</p>
            <ul>
              <li>No debe contener encabezados.</li>
              <li>Solo debe tener la informacion en una sola hoja.</li>
              <li>Los datos deben estar registrados en 2 columnas con la siguiente informacion y mismo orden:</li>
              <ol type="A">
                <li>Nombre.</li>
                <li>Puesto.</li>
              </ol>
            </ul>
            <input type="file" name="AreaDos" required>
          </div>
            </div>
            <div class="box-footer">
              @can('importar.areados')
              <button type="submit" class="btn btn-primary">Cargar</button>
              @endcan
            </div>
      </form>
  </div><!-- /.box-body -->
</div><!-- /.box -->

  </div><!-- /.box-body -->
  <div class="col-md-6">
  <!-- Horizontal Form -->
    <div class="box box-solid box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Unidad</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <form action="{{route('importar.unidad')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        <div>
          <strong>Instrucciones:</strong>
          <p>Para Subir los datos desde una hoja de excel la hoja debe ser de acuerdo a las siguientes caracteristicas
          :</p>
          <ul>
            <li>No debe contener encabezados.</li>
            <li>Solo debe tener la informacion en una sola hoja.</li>
            <li>Los datos deben estar registrados en 9 columnas con la siguiente informacion y mismo orden:</li>
            <ol type="A">
              <li>Marca.</li>
              <li>Tipo.</li>
              <li>Placa.</li>
              <li>Modelo.</li>
              <li>Serie.</li>
              <li>No. economico</li>
              <li>CIL.</li>
              <li>Uso: "Administrativo" u "Operativo"</li>
              <li>Familia.</li>
            </ol>
          </ul>
          <input type="file" name="Unidad" required>
        </div>
          </div>
          <div class="box-footer">
            @can('importar.unidad')
            <button type="submit" class="btn btn-primary">Cargar</button>
            @endcan
          </div>
    </form>
  </div><!-- /.box-body -->
</div><!-- /.box -->
</div>


<div class="col-md-6">
  <div class="box box-solid box-success">
<div class="box-header with-border">
<h3 class="box-title">Servicios</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
<form class="form-group" method="post" action="{{route('importar.servicio')}}" enctype="multipart/form-data">
@csrf
<div class="box-body">
  <div>
    <strong>Instrucciones:</strong>
    <p>Para Subir los datos desde una hoja de excel la hoja debe ser de acuerdo a las siguientes caracteristicas
    :</p>
    <ul>
      <li>No debe contener encabezados.</li>
      <li>Solo debe tener la informacion en una sola hoja.</li>
      <li>No debe contener campos vacios</li>
      <li>Los datos deben estar registrados en 3 columnas con la siguiente informacion y mismo orden:</li>
      <ol type="A">
        <li>No.</li>
        <li>Nombre del Servicio.</li>
        <li>Valor de Mano de Obra en formato general no de contabilidad.</li>
        <li>Valor de Refaccion en formato general no de contabilidad</li>
      </ol>
    </ul>
    <input type="file" name="Servicio" required>
  </div>
</div><!-- /.box-body -->
<div class="box-footer">
@can('importar.area')
<button type="submit" class="btn btn-primary">Cargar</button>
@endcan
</div>
</form>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
  </section><!-- /.content -->
@endsection
