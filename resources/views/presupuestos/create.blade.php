@extends('themes/lte/layout')

@section('links')
<link href="/assets/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('title') Nuevo Presupuesto @endsection

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
                <button data-toggle="modal" data-target="#presupuestoModal" data-id="1649" title="Nuevo Presupuesto" class="btn btn-box-tool"><i class="glyphicon glyphicon-file" aria-hidden="true"></i></button>
                <button type="button" data-id="1649" title="Editar Presupuesto" class="btn btn-box-tool editar-oportunidad" data-codigo="OKC2007042"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
                <a target="_blank" href="#" title="Imprimir" class="btn btn-box-tool"><i class="glyphicon glyphicon-print" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

{{$grupos}}

            </div>
        </div>
    </div>
</div>


@include('presupuestos.presupuestoModal')

@endsection

@section('scripts')
@endsection