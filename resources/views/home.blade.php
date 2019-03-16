<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SSP | Maquinaria @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('../../bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('../../dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('../../dist/css/skins/_all-skins.min.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('../../plugins/iCheck/all.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('../../plugins/datatables/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('../../plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{asset('../../plugins/timepicker/bootstrap-timepicker.min.css')}}">
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="../../" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>M</b>SSP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Maquinaria</b>SSP</span>
        </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Perfil -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--<img src="/imagenes/{{ Auth::user()->avatar }}" class="user-image" alt="User Image">-->
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <!--<img src="/imagenes/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">-->
                  <p>
                    {{ Auth::user()->name }}
                    <small>{{ Auth::user()->created_at }}</small>
                  </p>
                </li>

                <!-- pie del menu de Usuario-->
                <li class="user-footer">

                  <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        {{ __('Cerrar') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!--Contenido del modulo-->
        @yield('content')
    </div>
    </div> <!-- /.row -->


    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.3.0
      </div>
      <strong>Copyright &copy; 2018 <a href="#">Argenis Gutierrez</a>.</strong> All rights reserved.
    </footer>

    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">Menu Principal</li>
          <li class="treeview">
            <a href="#">
                <i class="fa fa-fe fa-file-o"></i> <span>Registros</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="/area/create"><i class="glyphicon glyphicon-pencil"></i> Registrar </a></li>
              @can('area.index')
              <li><a href="/area"><i class="glyphicon glyphicon-user"></i> Area Que Envia </a></li>
              @endcan
              @can('area2.index')
              <li><a href="/area2"><i class="glyphicon glyphicon-user"></i> Area Que Autoriza</a></li>
              @endcan
              @can('taller.index')
              <li><a href="/taller"><i class="glyphicon glyphicon-wrench"></i> Talleres </a></li>
              @endcan
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-cab"></i>
                <span>Plantilla</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              @can('unidad.create')
              <li><a href="/unidad/create"><i class="glyphicon glyphicon-pencil"></i> Registrar</a></li>
              @endcan
              @can('unidad.index')
              <li><a href="/unidad"><i class="fa fa-fw fa-list-ul"></i> Plantilla</a></li>
              @endcan
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Ordenes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              @can('orden.create')
              <li><a href="/orden/create"><i class="glyphicon glyphicon-pencil"></i> Registrar</a></li>
              @endcan
              @can('orden.index')
              <li><a href="/orden"><i class="fa fa-fw fa-list-ul"></i> Catalogo</a></li>
              @endcan
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-dollar"></i>
                <span>Pago de Ordenes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              @can('factura.create')
              <li><a href="/factura/create"><i class="glyphicon glyphicon-pencil"></i> Registrar</a></li>
              @endcan
              @can('factura.index')
              <li><a href="/factura"><i class="fa fa-fw fa-list-ul"></i> Listado</a></li>
              @endcan
            </ul>
          </li>
          <!-- <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-picture-o"></i>
                <span>Archivos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              @can('archivo.create')
              <li><a href="{{ route('archivo.create')}}"><i class="glyphicon glyphicon-open"></i> Cargar</a></li>
              @endcan
              @can('archivo.index')
              <li><a href="/archivo"><i class="glyphicon glyphicon-save"></i> Consultar</a></li>
              @endcan
            </ul>
          </li> -->
          <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-pie-chart"></i>
                <span>Graficas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="/grafica/importes"><i class="fa fa-fw fa-pie-chart"></i> Importes </a></li>
              <li><a href="/grafica/servicios"><i class="fa fa-fw fa-area-chart"></i> Servicios </a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-folder-open-o"></i> <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              @can('reporte.index')
              <li><a href="/reporte"><i class="fa fa-fw fa-file-text"></i> Reportes</a></li>
              @endcan()
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
                <i class="fa fa-user-plus"></i>
                <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              @can('ususario.index')
              <li><a href="{{ route('usuario.index')}}"><i class="fa fa-users"></i> Usuarios </a></li>
              @endcan
              @can('roles.index')
              <li><a href="{{ route('roles.index')}}"><i class="fa fa-expeditedssl"></i> Roles </a></li>
              @endcan
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
                <i class="fa fa-file-text"></i>
                <span>Ordenes de Pago</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              @can('ordenpago.create')
              <li><a href="{{ route('ordenpago.create')}}"><i class="glyphicon glyphicon-pencil"></i> Registrar Orden </a></li>
              @endcan
              @can('ordenpago.index')
              <li><a href="{{ route('ordenpago.index')}}"><i class="fa fa-fw fa-list-ul"></i> Listado de Ordenes </a></li>
              @endcan
            </ul>
          </li>
          @can('anexo.index')
          <li class="treeview">
            <a href="{{route('anexo.index')}}">
                <i class="fa fa-wrench"></i>
                <span>Anexos</span>
              </a>
          </li>
          @endcan
          @can('importar.index')
          <li><a href="/importar"><i class="fa fa-arrow-up"></i> <span>Importar Datos</span></a></li>
          @endcan
          @can('dictamen.index')
          <li class="treeview">
            <a href="#">
                <i class="fa fa-cog"></i>
                <span>Configurar Datos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            <ul class="treeview-menu">
              <li><a href="{{route('dictamen.index')}}"><i class="fa fa-book"></i> <span>Datos de Dictamen</span></a></li>
            </ul>
          </li>
          @endcan
          <li class="header">Manuales</li>
          <li><a href="#"><i class="fa fa-book"></i> <span>Manual de Uso</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- jQuery 2.1.4 -->
  <script src="{{asset('../../plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('../../bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('../../dist/js/app.min.js')}}"></script>
  <!--daterangepicker-->
  <script src="{{asset('../../plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('../../plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('../../plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('../../plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
  <!--DateRanger Pricker-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="{{asset('../../plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- bootstrap time picker -->
  <script src="{{asset('../../plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
  <!-- Select2 -->
  <script src="{{asset('../../plugins/select2/select2.full.min.js')}}"></script>
  <!-- InputMask -->
  <script src="{{asset('../../plugins/input-mask/jquery.inputmask.js')}}"></script>
  <script src="{{asset('../../plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
  <script src="{{asset('../../plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script src="{{asset('../../plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- bootstrap color picker -->
  <script src="{{asset('../../plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
  <!-- bootstrap time picker -->
  <script src="{{asset('../../plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="{{asset('../../plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- iCheck 1.0.1 -->
  <script src="{{asset('../../plugins/iCheck/icheck.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('../../plugins/fastclick/fastclick.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('../../dist/js/demo.js')}}"></script>
  <script>
    $(function () {
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      });
    });
  </script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>
    <script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#myTable tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#myTable').DataTable();
    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
    </script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });

      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation2').daterangepicker();
        //Date range picker with time picker
        $('#reservation2time').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
</body>
</html>
