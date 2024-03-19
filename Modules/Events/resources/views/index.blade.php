{{-- @extends('events::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('events.name') !!}</p>
@endsection
 --}}
 @extends('layouts.app')

@section('header-cs-styles')
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Dashboard</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                        <li class="breadcrumb-item active">Gestión de Eventos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <section class="col-lg-12 connectedSortable">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Nuevo Evento</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button> --}}
                            </div>
                        </div>

                        {{-- @include('tickets::formCreatedTicket') --}}

                    </div>

                </section>

                <section class="col-lg-12 connectedSortable">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Listado de Requerimientos</h3>
                            <div class="card-tools">
                               {{--  <span id="ntA" title="Abiertos" class="badge badge-secondary">{{$countA}}</span>
                                <span id="ntP" title="Pendientes" class="badge badge-warning">{{$countP}}</span>
                                <span id="ntEP" title="En Proceso" class="badge badge-info">{{$countE}}</span>
                                <span id="ntR" title="Resueltos" class="badge badge-success">{{$countR}}</span>
                                <span id="ntNP" title="No Procesados" class="badge badge-danger">{{$countN}}</span>
                                <span id="ntSR" title="Sin Resolución" class="badge badge-danger">{{$countS}}</span> --}}
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button> --}}
                            </div>
                        </div>

                        {{-- @include('tickets::tableTickets') --}}

                    </div>

                </section>
            </div>

        </div>
    </section>

@endsection

@section('bottom-cs-js')

    <script src="{{asset('tpl/v3/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('tpl/v3/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>

    </script>
@endsection
