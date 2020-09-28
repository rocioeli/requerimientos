@extends('themes/lte/layout')

@section('links')
<link href="/assets/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('title') Presupuesto @endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="javascript: void();"><i class="fa fa-building"></i> Presupuestos</a></li>
        <li class="active"> @yield('title')</li>
    </ol>
@endsection

@section('content')
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Datos Generales</h3>
        <div class="box-tools pull-right">
            <div class="btn-group" role="group">
                <button data-toggle="modal" data-target="#presupuestoModal" data-id="1649" 
                    title="Nuevo Presupuesto" class="btn btn-box-tool">
                    <i class="glyphicon glyphicon-file" aria-hidden="true"></i>
                </button>
                <button type="button" data-id="1649" title="Editar Datos Generales" 
                    class="btn btn-box-tool editar-oportunidad" data-codigo="OKC2007042">
                    <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                </button>
                <a target="_blank" href="#" title="Imprimir" class="btn btn-box-tool">
                    <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                </a>
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
                                <div class="form-control-static" name="codigo">PPY-20-0015</div>
                            </div>
                        <label class="col-md-1 control-label">Grupo:</label>
                            <div class="col-md-1">
                                <div class="form-control-static" name="name_grupo">Administracion</div>
                            </div>
                        <label class="col-md-2 control-label">Fecha Emisión:</label>
                            <div class="col-md-1">
                                <div class="form-control-static" name="fecha_emision">22/12/2020</div>
                            </div>
                        <label class="col-md-1 control-label">Moneda:</label>
                            <div class="col-md-2">
                                <div class="form-control-static" name="name_moneda">Soles</div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Descripción:</label>
                            <div class="col-md-10">
                                <div class="form-control-static" name="descripcion">CONSULTORIA DE PROYECTOS TECNOLOGICOS PARA EL GOBIERNO REGIONAL DE TACNA</div>
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
                    class="btn btn-box-tool add-new-title">
                    <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                </button>
                <!-- <button type="button" data-id="1649" title="Editar Datos Generales" class="btn btn-box-tool editar-oportunidad" data-codigo="OKC2007042"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button> -->
                <!-- <a target="_blank" href="#" title="Imprimir" class="btn btn-box-tool"><i class="glyphicon glyphicon-print" aria-hidden="true"></i></a> -->
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table" id="listaPartidas">
                    <thead>
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

@include('presupuestos.presupuestoModal')

@endsection

@section('scripts')
    <script src="{{('/js/presupuestos/titulos.js')}}"></script>
@endsection