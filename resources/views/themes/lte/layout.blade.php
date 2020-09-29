<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - Gestión Administrativa y Presupuestos</title>
        <link rel="icon" type="image/ico" href="{{asset('images/logo.ico')}}">
        <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/dist/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/fontello/fontello.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/lte/bower_components/lobibox/dist/css/lobibox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/basic.css') }}">
        @yield("links")
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Layout / Header -->
            @include("themes/lte/header")
            <!-- Layout / Aside -->
            @include("themes/lte/aside")
            <!-- Content Page -->
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>@yield('title')</h1>
                    @yield("breadcrumb")
                </section>
                <section class="content">
                    @yield("content")
                </section>
            </div>
        </div>
        <script src="{{ asset('assets/lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('assets/lte/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('assets/lte/bower_components/lobibox/dist/js/lobibox.min.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        @yield("scripts")
        <script>
            var csrf_token = '{{ csrf_token() }}';
            var idioma = {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate":
                {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria":
                {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            };

            function seleccionarMenu(url)
            {
                $('ul.sidebar-menu a').filter(function () {
                    return this.href == url;
                    
                }).parent().addClass('active');

                $('ul.treeview-menu a').filter(function () {
                    return this.href == url;
                }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
            }   
        </script>
    </body>
</html>