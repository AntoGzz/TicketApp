<div id="editEvent" class="modal" tabindex="-1" role="dialog" aria-labelledby="editEventLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="" method="post" id="form-editEvent">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Información del Evento: #
                        <span id="spanNro"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-4 pt-2">
                            <label for="eNro">Evento #</label>
                            <input type="text" name="eNro" id="eNro" class="form-control" value="{{ old('eNro') }}" placeholder="#" readonly>
                        </div>

                        <div class="col-sm-4 pt-2">
                            <label for="eQuantity">Boletos</label>
                            <input name="eQuantity" id="eQuantity" cols="63" rows="3" class="form-control" placeholder="eQuantity">
                        </div>

                        <div class="col-sm-4 pt-2">
                            <label for="ePrice">Precio por Boleto</label>
                            <input name="ePrice" id="ePrice" cols="63" rows="3" class="form-control" placeholder="ePrice">
                        </div>

                        <div class="col-sm-6 pt-2">
                            <label for="eDate">Fecha Planteada</label>
                            <input type="text" name="eDate" id="eDate" class="form-control" value="{{ old('eDate') }}" placeholder="Fecha del Evento" readonly>
                        </div>

                        <div class="col-sm-6 pt-2">
                            <label for="eNDate">Nueva Fecha</label>
                            <input type="datetime-local" name="eNDate" id="eNDate" class="form-control" value="{{ old('eNDate') }}" placeholder="Fecha del Evento" >
                        </div>

                        <div class="col-sm-12 pt-2">
                            <label for="eName">Nombre</label>
                            <input type="text" name="eName" id="eName" class="form-control" value="{{ old('eName') }}" placeholder="Nombre">
                        </div>

                        <div class="col-sm-12 pt-2">
                            <label for="eDescription">Descripción</label>
                            <textarea class="form-control" name="eDescription" id="eDescription" cols="63" rows="3" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="btn-group">
                        <div class="col-6">
                            <button class="btn btn-sm btn-warning" type="button" id="editBtn">Actualizar</button>
                        </div>
                    </div>
                </div>
          </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
