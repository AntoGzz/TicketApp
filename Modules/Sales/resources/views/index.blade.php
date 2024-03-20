{{-- @extends('sales::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('sales.name') !!}</p>
@endsection --}}
@extends('layouts.app')

@section('header-cs-styles')
    <link rel="stylesheet" href="{{ asset('tpl/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tpl/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tpl/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <style>
        .planned-text{
            color: #001f3f;
        }
        .sold-text{
            color: #17a2b8;
        }
        .available-text{
            color: #28a745;
        }
    </style>
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <section class="col-lg-12 connectedSortable">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Eventos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body" style="display: inline-flex!important;">
                        @foreach($data as $result)
                            <div class="col-4 ">
                                <div class="card card-widget widget-user">
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username">{{ $result->name }}</h3>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="{{ asset('tpl/v3/dist/img/user1-128x128.jpg') }}" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $result->quantity }}</h5>
                                                    <span class="planned-text">Planificadas</span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $result->quantity_sold }}</h5>
                                                    <span class="sold-text">Vendidas</span>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{ $result->quantity_available }}</h5>
                                                    <span class="available-text">Disponibles</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </section>

            <section class="col-lg-12 connectedSortable">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Ventas por Evento</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    @include('sales::tableSalesPerEvents')

                </div>
            </section>

        </div>
    </section>

@endsection

@section('bottom-cs-js')
    <script src="{{ asset('tpl/v3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('tpl/v3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        var initialData = {!! json_encode($data) !!};
        $(function () {
            bsCustomFileInput.init();

            // Carga inicial de la datatable
            $("#example1").DataTable({
                "dom": 'Bfrtip',
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                /* "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                }, */
                "buttons": [
                    "copy",
                    {
                        extend: 'csv',
                        text: 'CSV',
                        filename: 'Reporte de Ventas por Evento',
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: 'Reporte de Ventas por Evento',
                        filename: 'Reporte de Ventas por Evento',
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        filename: 'Reporte de Ventas por Evento',
                        title: 'Reporte de Ventas por Evento',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        title: 'Reporte de Ventas por Evento',
                    },"colvis"
                ],
                "data": initialData,
                "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "quantity" },
                { "data": "quantity_sold" },
                { "data": "quantity_available" }
            ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
