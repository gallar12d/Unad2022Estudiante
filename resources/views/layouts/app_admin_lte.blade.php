<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAGC | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />



  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>


    </nav>



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('/home')}}" class="brand-link">
        <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="Bamby Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SAGC</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">

            <img src="{{ (Auth::user()->imagen)? asset('imgAvatar/'.Auth::user()->imagen) :  asset('imgAvatar/user.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->primer_nombre}} {{Auth::user()->primer_apellido}}</a>

            <p>ID: {{Auth::user()->numero_identificacion}}</p>

          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="{{url('/home')}}" class="nav-link">
                <i class="fas  nav-icon fa-home"></i>
                <p>
                  Inicio
                </p>
              </a>

            </li>
            @can('modulo_administracion')
            <li class="nav-item ">

              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Administración
                </p>
                <i class="right fas fa-angle-left"></i>
              </a>

              <ul class="nav nav-treeview">

                <!-- <li class="nav-item">
                  <a href="{{route('permisos.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Permisos</p>
                  </a>
                </li> -->
                @can('menu_roles')
                <li class="nav-item">
                  <a href="{{route('roles.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
                @endcan
                @can('menu_usuarios')

                <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link">
                    <i class="fas nav-icon fa-users-cog"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
                @endcan
                @can('menu_perfiles')
                <li class="nav-item">
                  <a href="{{route('perfiles')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perfiles</p>
                  </a>
                </li>
                @endcan
                @can('menu_zonas')

                <li class="nav-item">
                  <a href="{{route('zonas.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Zonas</p>
                  </a>
                </li>
                @endcan
                @can('menu_cead')
                <li class="nav-item">
                  <a href="{{route('centros.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Centros</p>
                  </a>
                </li>
                @endcan

              </ul>

            </li>
            @endcan
            @can('modulo_datos_basicos')
            <li class="nav-item ">
              <a href="#" class="nav-link">
                <i class=" nav-icon  far fa-list-alt"></i>
                <p>
                  Datos básicos
                </p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                @can('menu_escuelas')
                <li class="nav-item">
                  <a href="{{route('escuelas.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Escuelas</p>
                  </a>
                </li>
                @endcan
                @can('menu_programas')
                <li class="nav-item">
                  <a href="{{route('programas.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Programas</p>
                  </a>
                </li>
                @endcan
                @can('menu_recursos')
                <li class="nav-item">
                  <a href="{{route('tipo_recursos.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tipo recursos</p>
                  </a>
                </li>
                @endcan
                @can('menu_plantillas')

                <li class="nav-item">
                  <a href="{{route('plantillas_procedimientos.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Plantillas procedimientos</p>
                  </a>
                </li>
                @endcan

              </ul>

            </li>
            @endcan
            @can('modulo_procedimientos')
            <li class="nav-item ">
              <a href="#" class="nav-link">
                <i class="  nav-icon  fas fa-tasks"></i>
                <p>
                  Procedimientos
                </p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                @can('menu_procedimientos')

                <li class="nav-item">
                  <a href="{{route('procedimientos.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mis procedimientos</p>
                  </a>
                </li>
                @endcan
                @can('menu_actividades')
                <li class="nav-item">
                  <a href="{{route('actividades.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mis actividades</p>
                  </a>
                </li>
                @endcan
              </ul>
            </li>
            @endcan
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Cerrar sesión
                </p>
              </a>
              <form autocomplete="off" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="http://adminlte.io">AdminLTE.io</a>. </strong>
      Todos los derechos reservados
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.4
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <!-- Bootstrap 4 -->
  <script src=" https://unpkg.com/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>

  <script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('adminLTE/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('adminLTE/plugins/sparklines/sparkline.js') }}"></script>

  <!-- JQVMap -->
  <script src="{{ asset('adminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('adminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('adminLTE/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('adminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminLTE/dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('adminLTE/dist/js/pages/dashboard.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('adminLTE/dist/js/demo.js') }}"></script>
  <script src="{{ asset('datatables/datatables.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.myDatatables').DataTable({
        "searching": true,
        "lengthChange": true,
        "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }
      });
      $(document).on("wheel", "input[type=number]", function(e) {
        $(this).blur();
      });

    })
  </script>

  
  @livewireScripts
  @stack('scripts')
</body>


</html>