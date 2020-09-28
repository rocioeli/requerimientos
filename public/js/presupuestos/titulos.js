$(".add-new-title").on('click',function(){
    $(this).attr("disabled", "disabled");

    var row = `<tr>
        <td>01</td>
        <td><input type="number" class="form-control" name="total" id="total"></td>
        <td>1000</td>
        <td>
            <div class="btn-group" role="group">
                <button class="btn btn-box-tool btn-success" data-toggle="tooltip" data-placement="bottom" title="Agregar" >
                    <i class="glyphicon glyphicon-ok add" aria-hidden="true"></i></button>
                <button class="btn btn-box-tool btn-danger" data-toggle="tooltip" data-placement="bottom" title="Descartar" >
                    <i class="glyphicon glyphicon-remove delete" aria-hidden="true"></i></button>
            </div>
        </td>
    </tr>`;
    $("#listaPartidas").append(row);
});

