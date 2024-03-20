<div class="card-body">
    <form id="up_ticket" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input-group my-3 col-3 col-sm-3">
                <div class="input-group">
                    <div class="input-group-prepend" style="height: 38px;">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Formato: V-XXXXXXXXX" name="identification" id="identification" >
                </div>
            </div>
            <div class="input-group my-3 col-3 col-sm-3">
                <div class="input-group">
                    <div class="input-group-prepend" style="height: 38px;">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre" name="name">
                </div>
            </div>
            <div class="input-group my-3 col-3 col-sm-3">
                <div class="input-group">
                    <div class="input-group-prepend" style="height: 38px;">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Apellido" name="last_name">
                </div>
            </div>
            <div class="input-group my-3 col-3 col-sm-3">
                <div class="input-group">
                    <div class="input-group-prepend" style="height: 38px;">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Teléfono" name="phone" id="phone">
                </div>
            </div>
            <div class="input-group my-3 col-3 col-sm-3">
                <div class="input-group">
                    <div class="input-group-prepend" style="height: 38px;">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Correo Electrónico" name="email">
                </div>
            </div>
            <div class="input-group my-3 col-3 col-sm-4">
                <div class="input-group">
                    <div class="input-group-prepend" style="height: 38px;">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <select name="event_id" id="event_id" class="form-control">
                    </select>
                </div>
            </div>
            <div class="input-group my-3 col-3 col-sm-2">
                <div class="input-group-prepend" style="height: 38px;">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="# de Boletos" id="quantity_sold" name="quantity_sold" disabled>
            </div>
            <div class="input-group my-3 col-3 col-sm-3">
                <div class="custom-file">
                    <input id="payment_file" name="payment_file" type="file" class="custom-file-input" accept="application/pdf" onchange="checkExt(this);" name="payment_file"/>
                    <label class="custom-file-label" for="payment_file">Comprobante (PDF -  Máx: 10 MB)</label>
                </div>
                {{-- <div class="input-group-prepend" style="height: 38px;">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="file" class="form-control" placeholder="Comprobante" id="payment_file"
                    name="payment_file"> --}}
            </div>
        </div>

        <button type="button" class="btn btn-secondary" id="btn_reset">Limpiar Campos</button>
        <button type="submit" class="btn btn-primary" id="btn_send">Enviar</button>
    </form>
</div>
