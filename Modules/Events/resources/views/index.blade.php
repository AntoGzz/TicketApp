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

                    <section class="col-lg-3 connectedSortable">

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

                            @include('events::formCreateEvent')

                        </div>

                    </section>

                    <section class="col-lg-9 connectedSortable">

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

                            @include('events::tableEvents')

                        </div>

                    </section>

            </div>

        </div>
    </section>

   @include('events::modalEditEvent')

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
        $(document).ready(function() {
            // Validar y enviar formulario
            $('#up_event').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    quantity: {
                        required: true,
                    },
                    date: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Ingresa el Nombre del Evento",
                    },
                    quantity: {
                        required: "Ingresa la Cantidad de Boletos",
                    },
                    date: {
                        required: "Ingresa la Fecha del Evento",
                    },
                    description: {
                        required: "Ingresa la Descripción del Evento",
                    },
                },
                errorElement: 'label',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        // Variable global de la data
        var initialData = {!! json_encode($data) !!};
        $(function () {
            bsCustomFileInput.init();

            //Datemask yyyy-mm-dd
            $('#datemask').inputmask('yyyy-mm-dd', {
                'placeholder': 'yyyy-mm-dd'
            })
            //Money Euro
            $('[data-mask]').inputmask()

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
                        filename: 'Gestión de Eventos',
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: 'Gestión de Eventos',
                        filename: 'Gestión de Eventos',
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        filename: 'Gestión de Eventos',
                        title: 'Gestión de Eventos',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        title: 'Gestión de Eventos',
                    },"colvis"
                ],
                "data": initialData,
                "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "date" },
                { "data": "quantity" },
                { "data": "description" },
                {
                    "data": "created_at",
                    "render": function (data, type, row) {
                        // Formatear la fecha utilizando moment.js
                        var formattedDate = moment(data).format('YYYY-MM-DD h:mm a');
                        return formattedDate;
                    }
                },
                {
                    "data": "id",
                    "render": function (data, type, row) {
                        var btn = '';

                        btn += ' <button class="btn btn-sm btn-primary" onclick="editEvent(' + data + ')"><span class="fa fa-edit"></span></button>';
                        // btn += ' <button class="btn btn-sm btn-info" onclick="seeBtn(' + data + ')"><span class="fa fa-eye"></span></button>';
                        btn += ' <button class="btn btn-sm btn-danger" onclick="trashBtn(' + data + ')"><span class="fa fa-trash"></span></button>';
                        // btn += ' <button class="btn btn-sm btn-secondary" onclick="downBtn(' + data + ')"><span class="fa fa-download"></span></button>';

                        return btn;
                    }
                }
            ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        // Registro de Evento
        $("#btn_send").click(function(e) {
            event.preventDefault();
            // Validar formulario
            var valid = $("#up_event").validate().form();

            // Si el formulario es válido, enviar la petición AJAX
            if (valid) {
                var formData  = new FormData(document.getElementById('up_event'))
                console.log('formData',formData);
                var route = "events/newEvent";
                toastr.info('Formulario Válido. Enviando...')
                $.ajax({
                    url: route,
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        toastr.info('Enviando Datos. Espere...')
                    },
                    success: function(res) {
                        toastr.success('Datos Guardados. Espere...')
                        if(res.state == 200){
                            resetForm();
                            toastr.info('Recargado Información. Espere...')
                            var table = $('#example1').DataTable();
                            var currentPage = table.page();
                            // Recarga los datos en la DataTable sin volver a dibujar toda la tabla
                            getData(currentPage);
                        }else{
                            toastr.error('No se pudieron guardar los datos. Verifica el formulario.')
                        }

                    },
                    error: function(xhr, status, error) {
                        toastr.error('Error en el envio de los Datos.')
                    }
                });
            } else {
                toastr.error('Error en el Formulario. Verifique los campos')
            }
        })

        // Ventana de Evento
        function editEvent(id){
            console.log('edit',id);
            $('#form-editEvent')[0].reset();
            $.getJSON('/events/getEvent/', {
                id: id
            }, function(data)
            {
                $('#spanNro').text(data.id);
                $('#eNro').val(data.id);
                $('#eName').val(data.name);
                $('#eQuantity').val(data.quantity);
                $('#eDate').val(data.date);
                $('#eDescription').val(data.description);
                $('#editBtn').val(data.id);
            });
            $('#editEvent').modal("show");
        };

        //  Actualizar ticket
        $('#editBtn').click(function(e){
            var value = e.target.value;
            editBtn(value);
        });

        function editBtn(id) {
            var id = $('#eNro').val();
            var date = $('#eNDate').val();
            var tickets = $('#eQuantity').val();
            var name = $('#eName').val();
            var description = $('#eDescription').val();
            var table = $('#example1').DataTable();

            var valid = $("#form-editEvent").validate().form();

            if (valid) {
                $.ajax({
                    url: 'events/updateEvent',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        'id': id,
                        'date': date,
                        'tickets': tickets,
                        'name': name,
                        'description': description,
                    },
                    beforeSend: function () {
                        toastr.info('Enviando Datos. Espere...');
                    },
                    success: function (response) {
                        $('#form-editEvent')[0].reset();
                        $('#editEvent').modal("hide");
                        // Recargar la tabla
                        var table = $('#example1').DataTable();
                        var currentPage = table.page();
                        // Recarga los datos en la DataTable sin volver a dibujar toda la tabla
                        getData(currentPage);
                        toastr.success('Evento actualizado correctamente.!');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.info('Ha ocurrido un error al actualizar el Evento!: ' + textStatus);
                    }
                });
            } else {
                toastr.error('Error en el Formulario. Verifique los campos')
            }
        }

        // Refrescamos datatable
        function getData(currentPage) {
            toastr.info('Refrescando tabla.!');
            $.ajax({
                url: '/events/getDatatableIndex',
                type: 'GET',
                success: function (data) {
                    toastr.success('Tabla refrescada.!');
                    // Obtén la DataTable actual
                    var table = $('#example1').DataTable();
                    // Guarda la página actual antes de limpiar y agregar nuevos datos
                    var currentPage = table.page();

                    // Recarga los datos en la DataTable sin volver a dibujar toda la tabla
                    table.clear().rows.add(data.data).draw();
                    // Vuelve a la página guardada
                    table.page(currentPage).draw('page');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    toastr.danger('No se pudo refrescar la tabla.!' + textStatus, errorThrown);
                }
            });
        }

         // Borrar Evento
         function trashBtn(id){
            $.ajax({
                url: 'events/trashEvent',
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    'id': id,
                },
                beforeSend: function() {
                    toastr.warning('Eliminando Evento. Espere...');
                },
                success: function(response) {
                    $('#trashEvent').modal("hide");
                    toastr.success('Evento eliminado correctamente.!');
                    var table = $('#example1').DataTable();
                    var currentPage = table.page();
                    // Recarga los datos en la DataTable sin volver a dibujar toda la tabla
                    getData(currentPage);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    toastr.info('Ha ocurrido un error al eliminar el Evento!: ' + textStatus);
                }
            });
        }

        // Reiniciar formulario
        function resetForm() {
            $("#up_event")[0].reset();
        }

        $("#btn_reset").click(function(e){
            resetForm();
        })
    </script>
@endsection
