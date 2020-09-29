<div class="modal fade" id="partidaCreate" tabindex="-1" role="dialog" aria-labelledby="partidaCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="partidaCreateLabel">Detalle de la Partida</h3>
            </div>
            <form id="form-partidaCreate">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input style="display: none" name="id_presup"/> 
                            <h5>Código Padre</h5>
                            <input type="text" name="cod_padre" class="form-control" readOnly/>
                        </div>
                        <div class="col-md-8">
                            <h5>Descripción Padre</h5>
                            <input type="text" name="descripcion_padre" class="form-control" readOnly/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Código</h5>
                            <input type="text" name="codigo" class="form-control" readOnly/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Descripción</h5>
                            <input type="text" name="descripcion" class="form-control" 
                                placeholder="Ingrese la descripción de la partida..." required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Total</h5>
                            <input type="number" name="importe_total" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="submit-partidaCreate" class="btn btn-success" value="Guardar"/>
                </div>
            </form>
        </div>
    </div>
</div>
