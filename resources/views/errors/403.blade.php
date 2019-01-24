@extends('home')
@section('title','- Ordenes')
@section('content')
<section class="content-header">
  <h1>
   Accesos Prohibido.
  </h1>
</section>

<section class="content">
  <div class="error-page">
    <h2 class="headline text-red"><i class="fa fa-hand-stop-o"></i> </h2>
    <div class="error-content">
      <h1><i class="fa fa-warning text-red"></i> Oops! Usted No Puede Entrar.</h1>
      <p style="font-size:18px">
        Lo Sentimos usted no cuenta con los permisos necesarios para realizar su solicitud.
        Quisa deba regresar a la pagina de <a href="/">inicio</a>.
      </p>
    </div><!-- /.error-content -->
  </div><!-- /.error-page -->
</section>
@endsection
