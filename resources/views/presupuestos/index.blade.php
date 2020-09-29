@extends('themes/lte/layout')

@section('links')
<link href="/assets/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    .lbl-codigo:hover{
        color:#007bff !important; 
        cursor:pointer;
    }
</style>
@endsection

@section('title') Lista de Presupuestos @endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="javascript: void();"><i class="fa fa-building"></i> Presupuestos</a></li>
        <li class="active"> @yield('title')</li>
    </ol>
@endsection

@section('content')
    <div class="box box-solid">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm table-hover table-bordered dt-responsive nowrap" 
                        id="listaPresupuestos">
                        <thead>
                            <tr style="background: gainsboro;">
                                <th hidden></th>
                                <th scope="col">Código</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha Emisión</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Empresa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($presupuestos as $presup)
                            <tr>
                                <td hidden>{{ $presup->id_presup }}</td>
                                <td><label class="lbl-codigo" title="Abrir Presupuesto" onClick="abrirPresupuesto('{{ $presup->id_presup }}')">{{ $presup->codigo }}</label></td>
                                <td>{{ $presup->descripcion }}</td>
                                <td>{{ $presup->fecha_emision }}</td>
                                <td>{{ $presup->grupo->descripcion }}</td>
                                <td>{{ $presup->empresa->codigo }}</td>
                            </tr>
                            @empty
                                <tr><td colSpan="6">No hay registros para mostrar</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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

    <script>
        $(document).ready(function () {

            seleccionarMenu(window.location);

            $('#listaPresupuestos').DataTable({
                // 'dom': 'lBfrtip',
                'language' : idioma,
                'destroy' : true,
            });
        });

        function abrirPresupuesto(id){
            console.log('abrirPresupuesto()');
            localStorage.setItem("id_presup",id);
            location.assign("/finanzas/presupuesto/create");
        }
    </script>
@endsection