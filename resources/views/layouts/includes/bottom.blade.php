<script src="{{asset('tpl/v3/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('tpl/v3/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('tpl/v3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
{{-- <script src="{{asset('tpl/v3/plugins/chart.js/Chart.min.js')}}"></script> --}}

<script src="{{asset('tpl/v3/plugins/sparklines/sparkline.js')}}"></script>

{{-- <script src="{{asset('tpl/v3/plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
{{-- <script src="{{asset('tpl/v3/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}

<script src="{{asset('tpl/v3/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{asset('tpl/v3/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('tpl/v3/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('tpl/v3/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script src="{{asset('tpl/v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('tpl/v3/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('tpl/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('tpl/v3/plugins/toastr/toastr.min.js')}}"></script>

{{-- <script src="{{asset('tpl/v3/plugins/select2/js/select2.full.min.js')}}"></script> --}}
<script src="{{asset('tpl/v3/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

<script src="{{asset('tpl/v3/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('tpl/v3/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script src="{{asset('tpl/v3/dist/js/adminlte.js?v=3.2.0')}}"></script>
{{-- <script src="{{asset('tpl/v3/dist/js/adminlte.min.js?v=3.2.0')}}"></script> --}}

<script src="{{asset('tpl/v3/dist/js/demo.js')}}"></script>

<script src="{{asset('tpl/v3/dist/js/pages/dashboard.js')}}"></script>

{{-- <script type="text/javascript">
    // BEGIN: Obtener Usuario
    var infoUserRoute = "/infoUserRoute/get";
    $.get(infoUserRoute, function(data) {
        var name = data.id[0].name;
        var jobtitle = data.id[0].rol_name;
        var username = name;
        document.getElementById("infoUser").innerHTML = username;
        document.getElementById("infoJob").innerHTML = jobtitle;
    });
    // END: Obtener Usuario

    var notificationsUrl = "/administrative/getNotifications";
    $.get(notificationsUrl, function(data) {
        document.getElementById("countT").innerHTML = data.countT;
        document.getElementById("countA").innerHTML = data.countA;
        document.getElementById("countP").innerHTML = data.countP;
        document.getElementById("countE").innerHTML = data.countE;
        document.getElementById("last_timeA").innerHTML = data.last_timeA;
        document.getElementById("last_timeE").innerHTML = data.last_timeE;
        document.getElementById("last_timeP").innerHTML = data.last_timeP;
    });
</script> --}}

@yield('bottom-cs-styles')
@yield('bottom-cs-js')
