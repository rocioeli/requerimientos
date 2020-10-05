@extends('themes/lte/layout')

@section('links')
<link href="/assets/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('title') Presupuesto @endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><i class="fa fa-usd"></i> Finanzas </li>
        <li class="active"> @yield('title')</li>
    </ol>
@endsection

@section('content')
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Datos Generales</h3>
        <div class="box-tools pull-right">
            <div class="btn-group" role="group">
                <button data-toggle="modal" title="Nuevo Presupuesto" 
                    class="btn btn-box-tool btn-sm btn-success nuevo-presupuesto">
                    <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                </button>
                <button data-toggle="modal" title="Editar Datos Generales" 
                    class="btn btn-box-tool btn-sm btn-warning editar-presupuesto">
                    <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                </button>
                <button type="button" data-toggle="modal" data-target="#presupuestosModal" 
                    title="Buscar Presupuesto" class="btn btn-box-tool btn-sm btn-info">
                    <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                </button>
                <!-- <a target="_blank" href="#" title="Imprimir" class="btn btn-box-tool">
                    <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                </a> -->
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <input style="display: none" name="id_presup"/> 
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Código:</label>
                            <div class="col-md-2">
                                <div class="form-control-static" name="codigo"></div>
                            </div>
                        <label class="col-md-1 control-label">Grupo:</label>
                            <div class="col-md-1">
                                <div class="form-control-static" name="name_grupo"></div>
                            </div>
                        <label class="col-md-2 control-label">Fecha Emisión:</label>
                            <div class="col-md-2">
                                <div class="form-control-static" name="fecha_emision"></div>
                            </div>
                        <label class="col-md-1 control-label">Moneda:</label>
                            <div class="col-md-1">
                                <div class="form-control-static" name="name_moneda"></div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Descripción:</label>
                            <div class="col-md-10">
                                <div class="form-control-static" name="descripcion"></div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Partidas</h3>
        <div class="box-tools pull-right">
            <div class="btn-group" role="group">
                <button data-toggle="tooltip" data-placement="bottom" title="Nuevo Título" 
                    class="btn btn-box-tool btn-success btn-sm nuevo-titulo">
                    <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-hover table-bordered dt-responsive nowrap" id="listaPartidas">
                    <thead style="background: gainsboro;">
                        <tr>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('presupuestos.presupuestoCreate')
@include('presupuestos.presupuestosModal')
@include('presupuestos.partidaCreate')
@include('presupuestos.tituloCreate')

@endsection

@section('scripts')
    <script src="{{ asset('assets/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/DataTables-1.10.21/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-1.6.3/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-1.6.3/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-1.6.3/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/Buttons-1.6.3/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/datatables/JSZip-2.5.0/jszip.min.js') }}"></script>

    <script src="{{('/js/presupuestos/presupuesto.js')}}"></script>
    <script src="{{('/js/presupuestos/titulo.js')}}"></script>
    <script src="{{('/js/presupuestos/partida.js')}}"></script>
    <script>
        $(document).ready(function () {
            seleccionarMenu(window.location);
        });
    </script>
@endsection