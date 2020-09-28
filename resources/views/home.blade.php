@extends('themes/lte/layout')

@section('links')
@endsection

@section('title') DASHBOARD @endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="javascript: void();"><i class="fa fa-building"></i> Melakar</a></li>
        <li class="active"> Inicio</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div style="padding: 20px;">
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script>
    </script>    
@endsection