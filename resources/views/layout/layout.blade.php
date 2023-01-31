<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReFi - Nonmortgage</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon_reli.ico') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('Template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('Template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('Template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('Template/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('Template/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('Template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('Template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('Template/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('Template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center bg-white">
            <img class="animation__shake" src="{{ asset('img/reliance_loader.jpg') }}" alt="logoreliance"
                height="75" width="75">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex" role="button" data-toggle="dropdown" aria-expanded="false">
                        <p>Halo, &nbsp;{{ Auth::user()->name }}</p>
                        <i class="fas fa-user ml-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('dashboard') }}" class="brand-link">
                <i><img src="{{ asset('img/reliance_sidebar.png') }}" width="35" height="35"></i>
                <span class="brand-text font-weight-light text-center">&nbsp;&nbsp;&nbsp;Non Mortgage</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar px-1">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @if (auth()->user()->level == 'Admin')
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{ url('dashboard') }}"
                                    class="nav-link {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                                    &nbsp;<i class="fas fa-tachometer-alt"></i>
                                    <p>
                                        &nbsp;&nbsp;Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Master
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview ml-1">
                                    <li class="nav-item">
                                        <a href="{{ url('master_suku_bunga') }}"
                                            class="nav-link {{ 'master_suku_bunga' == request()->path() ? 'active' : '' }}">
                                            <p>Master Suku Bunga</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('master_pola_pembayaran') }}"
                                            class="nav-link {{ 'master_pola_pembayaran' == request()->path() ? 'active' : '' }}">
                                            <p>Master Pola Pembayaran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('master_product') }}"
                                            class="nav-link {{ 'master_product' == request()->path() ? 'active' : '' }}">
                                            <p>Master Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('master_sektor_ekonomi') }}"
                                            class="nav-link {{ 'master_sektor_ekonomi' == request()->path() ? 'active' : '' }}">
                                            <p>Master Sektor Ekonomi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('master_jenis_product') }}"
                                            class="nav-link {{ 'master_jenis_product' == request()->path() ? 'active' : '' }}">
                                            <p>Master Jenis Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('master_jenis_pembiayaan') }}"
                                            class="nav-link {{ 'master_jenis_pembiayaan' == request()->path() ? 'active' : '' }}">
                                            <p>Master Jenis Pembiayaan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('master_skema_pembiayaan') }}"
                                            class="nav-link {{ 'master_skema_pembiayaan' == request()->path() ? 'active' : '' }}">
                                            <p>Master Skema Pembiayaan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('master_asuransi') }}"
                                            class="nav-link {{ 'master_asuransi' == request()->path() ? 'active' : '' }}">
                                            <p>Master Asuransi</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('partner') }}"
                                    class="nav-link {{ 'partner' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-handshake"></i>
                                    <p>
                                        Partner
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        Debitur
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview ml-1">
                                    <li class="nav-item">
                                        <a href="{{ url('debitur') }}"
                                            class="nav-link {{ 'debitur' == request()->path() ? 'active' : '' }}">
                                            <p>Perorangan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('debitur_badan_usaha') }}"
                                            class="nav-link {{ 'debitur_badan_usaha' == request()->path() ? 'active' : '' }}">
                                            <p>Badan Usaha</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('product') }}"
                                    class="nav-link {{ 'product' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-box-open"></i>
                                    <p>
                                        Product
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ml-1">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-hand-holding"></i>
                                    <p>
                                        &nbsp;&nbsp;Collateral
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview ml-1">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <p>
                                                Collateral Utama
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview ml-1">
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_motor') }}" class="nav-link">Kendaraan
                                                    Motor</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_mobil') }}" class="nav-link">Kendaraan
                                                    Mobil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_rumah') }}"
                                                    class="nav-link">Rumah/Tanah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_inven') }}"
                                                    class="nav-link">Inventory</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_invoice') }}"
                                                    class="nav-link">Invoice</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_corporate') }}"
                                                    class="nav-link">Corporate Guarantee</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <p>
                                                Collateral Tambahan
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview ml-1">
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_motor_tambahan') }}"
                                                    class="nav-link">Kendaraan Motor</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_mobil_tambahan') }}"
                                                    class="nav-link">Kendaraan Mobil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_rumah_tambahan') }}"
                                                    class="nav-link">Rumah/Tanah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_inven_tambahan') }}"
                                                    class="nav-link">Inventory</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_invoice_tambahan') }}"
                                                    class="nav-link">Invoice</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('collateral_corporate_tambahan') }}"
                                                    class="nav-link">Corporate Guarantee</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('users') }}"
                                    class="nav-link {{ 'users' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        User Management
                                    </p>
                                </a>
                            </li>
                        </ul>
                    @elseif(auth()->user()->level == 'User')
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="/dashboard"
                                    class="nav-link {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                                    &nbsp;<i class="fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Master
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview ml-1">
                                    <li class="nav-item">
                                        <a href="{{ url('suku_bunga') }}"
                                            class="nav-link {{ 'suku_bunga' == request()->path() ? 'active' : '' }}">
                                            <p>Master Suku Bunga</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/pola_pembayaran') }}"
                                            class="nav-link {{ '/pola_pembayaran' == request()->path() ? 'active' : '' }}">
                                            <p>Master Pola Pembayaran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/masterProduct') }}"
                                            class="nav-link {{ '/masterProduct' == request()->path() ? 'active' : '' }}">
                                            <p>Master Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/sektor_ekonomi') }}"
                                            class="nav-link {{ '/sektor_ekonomi' == request()->path() ? 'active' : '' }}">
                                            <p>Master Sektor Ekonomi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/jenis_product') }}"
                                            class="nav-link {{ '/jenis_product' == request()->path() ? 'active' : '' }}">
                                            <p>Master Jenis Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/jenis_pembiayaan') }}"
                                            class="nav-link {{ '/jenis_pembiayaan' == request()->path() ? 'active' : '' }}">
                                            <p>Master Jenis Pembiayaan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/skema_pembiayaan') }}"
                                            class="nav-link {{ '/skema_pembiayaan' == request()->path() ? 'active' : '' }}">
                                            <p>Master Skema Pembiayaan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/asuransi') }}"
                                            class="nav-link {{ '/asuransi' == request()->path() ? 'active' : '' }}">
                                            <p>Master Asuransi</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/index_partner') }}"
                                    class="nav-link {{ '/index_partner' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-handshake"></i>
                                    <p>
                                        Partner
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        Debitur
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview ml-1">
                                    <li class="nav-item">
                                        <a href="{{ url('/index_debitur') }}"
                                            class="nav-link {{ '/index_debitur' == request()->path() ? 'active' : '' }}">
                                            <p>Perorangan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/index_debitur_badan_usaha') }}"
                                            class="nav-link {{ '/index_debitur_badan_usaha' == request()->path() ? 'active' : '' }}">
                                            <p>Badan Usaha</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/index_product') }}"
                                    class="nav-link {{ '/index_product' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-box-open"></i>
                                    <p>
                                        Product
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ml-1">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-hand-holding"></i>
                                    <p>
                                        &nbsp;&nbsp;Collateral
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview ml-1">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <p>
                                                Collateral Utama
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview ml-1">
                                            <li class="nav-item">
                                                <a href="{{ url('colls_motor_utama') }}" class="nav-link">Kendaraan
                                                    Motor</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_mobil_utama') }}" class="nav-link">Kendaraan
                                                    Mobil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_rumah_utama') }}"
                                                    class="nav-link">Rumah/Tanah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_inven_utama') }}"
                                                    class="nav-link">Inventory</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_invoice_utama') }}"
                                                    class="nav-link">Invoice</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_corporate_utama') }}"
                                                    class="nav-link">Corporate Guarantee</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <p>
                                                Collateral Tambahan
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview ml-1">
                                            <li class="nav-item">
                                                <a href="{{ url('colls_motor_tambahan') }}"
                                                    class="nav-link">Kendaraan Motor</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_mobil_tambahan') }}"
                                                    class="nav-link">Kendaraan Mobil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_rumah_tambahan') }}"
                                                    class="nav-link">Rumah/Tanah</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_inven_tambahan') }}"
                                                    class="nav-link">Inventory</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_invoice_tambahan') }}"
                                                    class="nav-link">Invoice</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('colls_corporate_tambahan') }}"
                                                    class="nav-link">Corporate Guarantee</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                    @endif
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header pb-0">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">@yield('page')</li>
                                <li class="breadcrumb-item active">@yield('subtitle')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            &copy; 2022 IT ReFI Technology Limited. All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('Template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('Template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('Template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('Template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('Template/plugins/separator-number/js/number-separator.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('Template/dist/js/adminlte.min.js') }}"></script>
    <!-- Page specific script -->
    @yield('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function() {
            $("#user").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": []
            }).buttons().container().appendTo('#user_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script type="text/javascript">
        $('.custom-file input').change(function(e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }
            $(this).next('.custom-file-label').html(files.join(', '));
        });
    </script>
</body>

</html>
