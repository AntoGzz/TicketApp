<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Dashboard</title>

    <link rel="stylesheet" href="{{asset('css.css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">

    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('tpl/v3/ionicons/2.0.1/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <!-- Chart.js y Chart.js Plugin Core Service -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-core-service"></script>
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


    {{-- <link rel="stylesheet" href="{{asset('tpl/v3/plugins/jqvmap/jqvmap.min.css')}}"> --}}

    <link rel="stylesheet" href="{{asset('tpl/v3/dist/css/adminlte.min.css?v=3.2.0')}}">

    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/summernote/summernote-bs4.min.css')}}">

    <link rel="stylesheet" href="{{asset('tpl/v3/plugins/toastr/toastr.min.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.1-alpha.3/themify-icons.min.css">



    @yield('header-cs-styles')
    @yield('header-cs-js')

</head>
