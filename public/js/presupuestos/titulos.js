$(".add-new-title").on('click',function(){
    $(this).attr("disabled", "disabled");

    var row = `<tr>
        <td width="150px"><input type="text" class="form-control" name="codigo" value="01"></td>
        <td><input type="text" class="form-control" name="descripcion"></td>
        <td>1000</td>
        <td>
            <div class="btn-group" role="group">
                <button class="btn btn-box-tool btn-sm btn-success add" data-toggle="tooltip" data-placement="bottom" title="Agregar" >
                    <i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                <button class="btn btn-box-tool btn-sm btn-danger delete" data-toggle="tooltip" data-placement="bottom" title="Descartar" >
                    <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
            </div>
        </td>
    </tr>`;
    $("#listaPartidas").append(row);
});

// Add row on add button click
$('#listaPartidas tbody').on("click", ".add", function(){
    var empty = false;
    var input = $(this).parents("tr").find('input');
    input.each(function(){
        if(!$(this).val()){
            $(this).addClass("error");
            empty = true;
        } else{
            $(this).removeClass("error");
        }
    });
    $(this).parents("tr").find(".error").first().focus();
    if(!empty){
        var descripcion = '';
        var codigo = '';

        input.each(function(){
            if ($(this)[0].name == 'descripcion'){
                descripcion = $(this).val();
            } 
            else if ($(this)[0].name == 'codigo'){
                codigo = $(this).val();
            }
            $(this).parent("td").html($(this).val());
        });
        $(this).addClass("hidden");

        var id = $('[name=id_presup]').val();
        var data = 'id_presup='+id+
            '&descripcion='+descripcion;
        // guardar_directo(data);
        $(".add-new-title").removeAttr('disabled');
    }		
});
