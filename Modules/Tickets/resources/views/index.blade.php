{{-- @extends('tickets::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('tickets.name') !!}</p>
@endsection --}}
@extends('layouts.app')

@section('header-cs-styles')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('tpl/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tpl/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tpl/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
                        <li class="breadcrumb-item active">Gestión de Boletos</li>
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
                            <h3 class="card-title">Nueva Orden de Compra</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        @include('tickets::formCreateTicketSold')

                    </div>

                </section>

                <section class="col-lg-12 connectedSortable">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Listado de Ordenes Completadas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        @include('tickets::tableTicketsSold')

                    </div>

                </section>

            </div>

        </div>
    </section>

   @include('tickets::modalSeeTicket')

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
    <script src="{{ asset('tpl/v3/plugins/jquery-validation/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            getEvents();

            $('#identification').keyup(function() {
                this.value = this.value.toUpperCase();
            });

            $('#identification').mask('S-AAAAAAAA', {
                'translation': {
                    S: {
                        pattern: /[CVEJPGRcvejpgr]{1}/
                    },
                    A: {
                        pattern: /[0-9]/
                    },
                }
            });

            var idenValidFunc = function(value, element) {
                if (typeof element === "undefined") {
                    return true;
                }
            }

            $.validator.addMethod("identification", idenValidFunc, "Por favor, introduce un Rif válido.");

            $('#phone').mask('(0424)-AAAAAAA', {
                'translation': {
                    A: {
                        pattern: /[0-9]/
                    },
                },
                placeholder: "(04__)-_______"
            });

            $('#quantity_sold').mask('AAAA', {
                'translation': {
                    A: {
                        pattern: /[0-9]/
                    },
                }
            });

            // Validar y enviar formulario
            $('#up_ticket').validate({
                rules: {
                    identification: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    quantity_sold: {
                        required: true,
                    },
                    event_id: {
                        required: true,
                    },
                    payment_file: {
                        required: true,
                    }
                },
                messages: {
                    identification: {
                        required: "Ingrese la Identificación del Comprador",
                    },
                    name: {
                        required: "Ingrese el Nombre del Comprador",
                    },
                    last_name: {
                        required: "Ingrese el Apellido del Comprador",
                    },
                    phone: {
                        required: "Ingrese un Número de Contacto del Comprador",
                    },
                    email: {
                        required: "Ingrese el Correo Electrónico",
                        email: "Ingresa un Correo Electrónico Válido"
                    },
                    quantity_sold: {
                        required: "Ingrese la Cantidad de Boletos a Comprar",
                    },
                    event_id: {
                        required: "Seleccione un Evento",
                    },
                    payment_file: {
                        required: "Agregue el Comprobante de Pago",
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
            })
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
                        filename: 'Gestión de Boletos',
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: 'Gestión de Boletos',
                        filename: 'Gestión de Boletos',
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        filename: 'Gestión de Boletos',
                        title: 'Gestión de Boletos',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        title: 'Gestión de Boletos',
                    },"colvis"
                ],
                "data": initialData,
                "columns": [
                { "data": "id" },
                { "data": "full_name" },
                { "data": "event" },
                { "data": "quantity_tickets" },
                {
                    "data": "date",
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

                        btn += ' <button class="btn btn-sm btn-primary" onclick="seeTicket(' + data + ')"><span class="fa fa-eye"></span></button>';
                        // btn += ' <button class="btn btn-sm btn-info" onclick="seeBtn(' + data + ')"><span class="fa fa-eye"></span></button>';
                        // btn += ' <button class="btn btn-sm btn-danger" onclick="trashBtn(' + data + ')"><span class="fa fa-trash"></span></button>';
                        // btn += ' <button class="btn btn-sm btn-secondary" onclick="downBtn(' + data + ')"><span class="fa fa-download"></span></button>';

                        return btn;
                    }
                }
            ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        function checkExt(e) {
            var value = e.value;
            if (!value.match(/\.(pdf)$/)) { // Aqui las extensiones a filtrar
                document.getElementById("payment_file").value = "";
                toastr.error('PDF Inválido. El archivo no es un PDF')
            }
        }

        $('#event_id').on('change',function(){
            var id = $(this).val();
            $('#quantity_sold').val('');
            if(id){
                $('#quantity_sold').prop('disabled',false);
            }else{
                $('#quantity_sold').prop('disabled',true);
            }
        });

        $('#quantity_sold').on('change',function(){
            var quantity_sold = $('#quantity_sold').val();
            var event = $('#event_id').val();
            $.get('/events/selectAvailable?event=' + event, function(data) {
                if (quantity_sold > data.quantity_available) {
                    if (data.quantity_available === undefined || data.quantity_available === null) {
                        toastr.error("Error al obtener los boletos disponibles");
                    } else {
                        toastr.error('Cantidad solicitada mayor a los disponibles');
                    }
                    $('#quantity_sold').val('');
                }
            });
        });

        function getEvents(){
            $.get('/events/select', function(data) {
                $('#event_id').empty();
                $('#event_id').append("<option value=''>Seleccione un Evento...</option>");
                $.each(data, function(index, subItemObj) {
                    $('#event_id').append("<option value='" + subItemObj.id + "'>" + subItemObj.event + ' - ' + subItemObj.date + "</option>");
                    $("#event_id option[value=" + {{ old('event_id') }} + "]").attr("selected", true);
                });
            });
        }

        // Registro de Evento
        $("#btn_send").click(function(e) {
            event.preventDefault();
            // Validar formulario
            var valid = $("#up_ticket").validate().form();

            // Si el formulario es válido, enviar la petición AJAX
            if (valid) {
                var formData  = new FormData(document.getElementById('up_ticket'))
                var route = "tickets/newTicket";
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
                            getEvents();
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

        // Refrescamos datatable
        function getData(currentPage) {
            toastr.info('Refrescando tabla.!');
            $.ajax({
                url: '/tickets/getDatatableIndex',
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

        // Ventana de Evento
        function seeTicket(id){
            console.log('edit',id);
            $('#form-seeTicket')[0].reset();
            $.getJSON('/tickets/getTicket/', {
                id: id
            }, function(data)
            {
                $('#spanNro').text(data.id);
                $('#tNro').val(data.id);
                $('#tIdentification').val(data.identification);
                $('#tName').val(data.full_name);
                $('#tPhone').val(data.phone);
                $('#tEmail').val(data.email);
                $('#tDateSale').val(data.created_at);
                $('#tQuantity').val(data.quantity_tickets);
                $('#tEvent').val(data.event);
                $('#tDate').val(data.date);
                $('#tPrint').val(data.id);
            });
            $('#seeTicket').modal("show");
        };

        // Reiniciar formulario
        function resetForm() {
            $("#up_ticket")[0].reset();
        }

        $("#btn_reset").click(function(e){
            resetForm();
        })
    </script>
@endsection
