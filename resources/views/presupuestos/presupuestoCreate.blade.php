<div class="modal fade" id="presupuestoCreate" tabindex="-1" role="dialog" aria-labelledby="presupuestoCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="presupuestoCreateLabel">Datos Generales</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Grupo</h5>
                        <select class="form-control" name="id_grupo">
                            <option value="0">Elija una opción</option>
                            @foreach($grupos as $item)
                                <option value="{{$item->id_grupo}}">{{$item->cod_grupo}} - {{$item->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <h5>Fecha Emisión</h5>
                        <input type="date" name="fecha_emision" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <h5>Moneda</h5>
                        <select class="form-control" name="moneda">
                            <option value="0">Elija una opción</option>
                            @foreach($monedas as $item)
                                <option value="{{$item->id_moneda}}">{{$item->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>Descripción</h5>
                        <textarea name="descripcion" id="descripcion" cols="77" rows="5"></textarea>
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