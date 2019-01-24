@extends('home')
@section('title','- Area')
@section('content')
  <div class="content">
    <div class="box box-solid box-primary">
<div class="box-header with-border">
<h3 class="box-title">Area que Envia</h3>
<div class="box-tools pull-right">
  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div><!-- /.box-tools -->
</div><!-- /.box-header -->
<div class="box-body">
<!-- form start -->
{!! Form::model($area,['route'=>['area.update',$area],'method' => 'PUT','files'=>true])!!}
  <div class="box-body">
    <div class="form-group">
      <label>Area:</label>
      <select class="form-control" name="nombre">
      <option selected hidden>{{$area->nombre}}</option>
      <option>Direccion General de Asuntos Internos</option>
      <option>Direccion General de Transporte del Estado</option>
      <option>Direccion General de Vinculacion Institucional</option>
      <option>Direccion General del Centro de Planeacion y Estrategia</option>
      <option>Neumaticos(Todas las Areas de la SSP)</option>
      <option>Secretaria Ejecutiva del Sistema y del Consejo Estatal de Seguridad Publica</option>
      <option>Ayudantia del C.Secretario</option>
      <option>Direccion General de la Fuerza Civil</option>
      <option>Direccion General del Centro de Evaluacin y Control de Confianza</option>
      <option>Secretaria de la Defensa Nacional(SEDENA)</option>
      <option>Secretaria Particular</option>
      <option>Unidad Administrativa</option>
      <option>Ayudantia del C.Gobernador</option>
      <option>Direccion General de Ejecucion de Medidas Sancionadoras</option>
      <option>Direccion General de Prevencion y Reinsercion Social</option>
      <option>Direccion General de Transito y Seguridad Vial</option>
      <option>Direccion General del Centro Estatal de Control,Comando,Comunicaciones y Computo</option>
      <option>Direccion General del Instituto de Formacion: Centro de Estudios e Investigacion en Seguridad</option>
      <option>Direccion General Juridica</option>
      <option>Motocicletas, Trimotos,Cuatrimotos(Todas las Areas de la SSP)</option>
      <option>Subsecretaria de Logistica</option>
</select>
    </div>
    <div class="form-group">
      <label>Nombre del Encargado:</label>
      <input name="encargado" type="text" class="form-control" placeholder="Ingresa el Nombre" required autocomplete="off" value="{{$area->encargado}}">
    </div>
    <div class="form-group">
      <label>Cargo que Ejerce:</label>
      <input name="cargo" type="text" class="form-control" placeholder="Ingresa el Cargo" required autocomplete="off" value="{{$area->cargo}}">
    </div>
      </div><!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
{!! Form::close()!!}
</div><!-- /.box-body -->
</div>
  </div>

@endsection
