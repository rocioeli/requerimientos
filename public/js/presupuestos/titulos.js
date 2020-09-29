$(".add-new-title").on('click',function(){
    $(this).attr("disabled", "disabled");
    
    var row = `<tr>
        <td width="150px"><input type="text" class="form-control" name="codigo" value="01"></td>
        <td><input type="text" class="form-control" name="descripcion"></td>
        <td>1000</td>
        <td style="padding: 0px;">
            <div class="btn-group" role="group">
                <button class="btn btn-box-tool btn-xs btn-success add" data-toggle="tooltip" data-placement="bottom" title="Agregar" >
                    <i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                <button class="btn btn-box-tool btn-xs btn-danger delete" data-toggle="tooltip" data-placement="bottom" title="Descartar" >
                    <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
            </div>
        </td>
    </tr>`;
    $("#listaPartidas").append(row);
});

$("#listaPartidas tbody").on('click', ".agregar-titulo", function(){
    $(this).attr("disabled", "disabled");
    var cod = $(this).data('codigo');
    
    var titulo = prompt("Ingrese la descripción del título", "Ingrese una descripción...");
    if (titulo != null) {
        var i = 1;
        var filas = document.querySelectorAll('#listaPartidas tbody tr');
        filas.forEach(function(e){
            var colum = e.querySelectorAll('td');
            var padre = colum[4].innerText;
            if (padre == cod){
                i++;
            }
        });
        var id_pres = $('[name=id_presup]').val();
        var data = 'id_presup='+id_pres+'&codigo='+cod+'.'+leftZero(2,i)+'&descripcion='+titulo+'&cod_padre='+cod;
        
        nuevo_id_titulo = "";
        guardar_titulo(data, id_pres);
        
    }
});

function guardar_titulo(data, id_pres){
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': csrf_token},
        url: "guardar-titulo",
        data: data,
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            nuevo_id_titulo = response.id_titulo;
            alert('Se guardo exitosamente');
            mostrarPartidas(id_pres);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
}

$("#listaPartidas tbody").on('click', ".editar-titulo", function(){
    $(this).attr("disabled", "disabled");
    var id = $(this).data('id');
    var des = $(this).data('descripcion');
    
    var titulo = prompt("Ingrese la descripción del título", des);
    if (titulo != null) {
        var id_pres = $('[name=id_presup]').val();
        var data = 'id_titulo='+id+
                '&descripcion='+titulo;
        
        nuevo_id_titulo = "";
        actualizar_titulo(data, id_pres);
        
    }
});

function actualizar_titulo(data, id_pres){
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': csrf_token},
        url: "actualizar-titulo",
        data: data,
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            nuevo_id_titulo = response.id_titulo;
            alert('Se actualizó exitosamente');
            mostrarPartidas(id_pres);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
}

$("#listaPartidas tbody").on('click', ".anular-titulo", function(){
    $(this).attr("disabled", "disabled");
    var id = $(this).data('id');
    var rspta = confirm('¿Está seguro que desea anular?');
    if (rspta){
        nuevo_id_titulo = "";
        anular_titulo(id);
    }
});

function anular_titulo(id){
    $.ajax({
        type: 'GET',
        headers: {'X-CSRF-TOKEN': csrf_token},
        url: "anular-titulo/"+id,
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            var id_pres = $('[name=id_presup]').val();
            mostrarPartidas(id_pres);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
}
