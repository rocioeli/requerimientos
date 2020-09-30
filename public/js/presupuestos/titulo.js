$(".add-new-title").on('click',function(){
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
    var cod = $(this).data('codigo');
    var des = $(this).data('descripcion');
    var i = 1;
    var filas = document.querySelectorAll('#listaPartidas tbody tr');
    
    filas.forEach(function(e){
        var colum = e.querySelectorAll('td');
        var padre = colum[4].innerText;
        if (padre == cod){
            i++;
        }
    });

    $('#tituloCreate').modal({
        show: true
    });
    $('#submit-tituloCreate').removeAttr('disabled');

    $('[name=codigo]').val(cod+'.'+leftZero(2,i));
    $('[name=cod_padre]').val(cod);
    $('[name=id_titulo]').val('');
    $('[name=descripcion]').val('');
    $('#cod_padre_titu').text(cod);
    $('#descripcion_padre_titu').text(des);

});

$("#form-tituloCreate").on("submit", function(e){
    e.preventDefault();
    var data = $(this).serialize();
    var id = $('[name=id_titulo]').val();
    var url = '';
    $('#submit-tituloCreate').attr('disabled','true');
    
    if (id == ''){
        url = 'guardar-titulo';
    } else {
        url = 'actualizar-titulo';
    }
    console.log(data);
    guardar_titulo(data, url);

    $('#tituloCreate').modal('hide');
});

function guardar_titulo(data, url){
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': csrf_token},
        url: url,
        data: data,
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            if (url == 'guardar-titulo'){
                nuevo_id_titulo = response.id_titulo;
            } else {
                nuevo_id_titulo = '';
            }
            mostrarPartidas(response.id_presup);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
}

$("#listaPartidas tbody").on('click', ".editar-titulo", function(){
    var id = $(this).data('id');
    var cod = $(this).data('codigo');
    var des = $(this).data('descripcion');
    var codp = $(this).data('codpadre');
    var desp = $(this).data('despadre');
    
    $('#tituloCreate').modal({
        show: true
    });
    $('#submit-tituloCreate').removeAttr('disabled');

    $('[name=id_titulo]').val(id);
    $('[name=codigo]').val(cod);
    $('[name=cod_padre]').val(codp);
    $('[name=descripcion]').val(des);
    $('#cod_padre_titu').text(codp);
    $('#descripcion_padre_titu').text(desp);

});

$("#listaPartidas tbody").on('click', ".anular-titulo", function(){
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
