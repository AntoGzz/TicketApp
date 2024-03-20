<div id="seeTicket" class="modal" tabindex="-1" role="dialog" aria-labelledby="seeTicketLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="" method="post" id="form-seeTicket">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Información de la Orden: #
                        <span id="spanNro"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-4 pt-2">
                            <label for="tNro">Evento #</label>
                            <input type="text" name="tNro" id="tNro" class="form-control" placeholder="#"
                                readonly>
                        </div>
                        <div class="col-sm-4 pt-2">
                            <label for="tIdentification">Identificación</label>
                            <input type="text" name="tIdentification" id="tIdentification" class="form-control"
                                placeholder="Identificación" readonly>
                        </div>
                        <div class="col-sm-4 pt-2">
                            <label for="tName">Nombre</label>
                            <input type="text" name="tName" id="tName" class="form-control"
                                placeholder="Nombre" readonly>
                        </div>
                        <div class="col-sm-4 pt-2">
                            <label for="tPhone">Teléfono</label>
                            <input type="text" name="tPhone" id="tPhone" class="form-control"
                                placeholder="Teléfono" readonly>
                        </div>
                        <div class="col-sm-8 pt-2">
                            <label for="tEmail">Correo Electrónico</label>
                            <input type="text" name="tEmail" id="tEmail" class="form-control"
                                placeholder="Correo Electrónico" readonly>
                        </div>
                        <div class="col-sm-6 pt-2">
                            <label for="tDateSale">Fecha de Venta</label>
                            <input type="text" name="tDateSale" id="tDateSale" class="form-control"
                                placeholder="Fecha de Venta" readonly>
                        </div>
                        <div class="col-sm-6 pt-2">
                            <label for="tDate">Fecha del Evento</label>
                            <input type="text" name="tDate" id="tDate" class="form-control"
                                placeholder="Fecha del Evento" readonly>
                        </div>
                        <div class="col-sm-2 pt-2">
                            <label for="tQuantity">Boletos</label>
                            <input name="tQuantity" id="tQuantity" class="form-control" placeholder="tQuantity"
                                readonly>
                        </div>

                        <div class="col-sm-10 pt-2">
                            <label for="tEvent">Evento</label>
                            <input name="tEvent" id="tEvent" class="form-control" placeholder="tEvent" readonly>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal-footer">
                    <div class="btn-group">
                        <div class="col-6">
                            <button class="btn btn-sm btn-info" type="button" id="tPrint">Imprimir</button>
                        </div>
                    </div>
                </div> --}}
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
