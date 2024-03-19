<div class="card-body">
    <form id="up_event">
        @csrf
        <div class="input-group my-3 col-12 col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend" style="height: 38px;">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Nombre" name="name">
            </div>
        </div>
        <div class="input-group my-3 col-12 col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend" style="height: 38px;">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Cantidad de Boletos" name="quantity"
                    pattern="[0-9]*" title="Por favor, ingresa solo números">
            </div>
        </div>
        <div class="input-group my-3 col-12 col-sm-12">
            <div class="input-group">
                <div class="input-group-prepend" style="height: 38px;">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="datetime-local" class="form-control" data-inputmask-alias="datetime"
                    data-inputmask-inputformat="yyyy-mm-dd" data-mask="" placeholder="yyyy-mm-dd" name="date">
            </div>
        </div>
        <div class="input-group my-3 col-lg-12 col-sm-12">
            <div class="input-group-prepend" style="height: 38px;">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Descripción del Evento" id="description"
                name="description">
        </div>

        <button type="button" class="btn btn-secondary" id="btn_reset">Limpiar Campos</button>
        <button type="submit" class="btn btn-primary" id="btn_send">Enviar</button>
    </form>
</div>