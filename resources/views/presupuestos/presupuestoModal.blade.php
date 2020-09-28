<div class="modal fade" id="presupuestoModal" tabindex="-1" role="dialog" aria-labelledby="presupuestoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="presupuestoModalLabel">Presupuesto - Datos Generales</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Descripción</h5>
                        <textarea name="descripcion" id="descripcion" cols="77" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5>Grupo</h5>
                        <select class="form-control" name="id_grupo" disabled="true">
                            <option value="0">Elija una opción</option>
                            @foreach($grupos as $item)
                                <option value="{{$item->id_grupo}}">{{$item->cod_grupo}} - {{$item->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>
