$("#listaPartidas tbody").on('click', ".agregar-partida", function(){
    $(this).attr("disabled", "disabled");
    var cod = $(this).data('codigo');
    var des = $(this).data('descripcion');
    
    var i = 1;
    var filas = document.querySelectorAll('#listaPartidas tbody tr');
    filas.forEach(function(e){
        var colum = e.querySelectorAll('td');
        var padre = colum[5].innerText;
        if (padre == cod){
            i++;
        }
    });

    $('#partidaCreate').modal({
        show: true
    });

    $('[name=codigo]').val(cod+'.'+leftZero(2,i));
    $('[name=cod_padre]').val(cod);
    $('[name=descripcion_padre]').val(des);
    $('[name=descripcion]').val('');
    $('[name=importe_total]').val('');

});

$("#form-partidaCreate").on("submit", function(e){
    e.preventDefault();
    var data = $(this).serialize();

    $('#submit-partidaCreate').attr('disabled','true');
    guardar_partida(data);

    $('#partidaCreate').modal('hide');
});

function guardar_partida(data){
    console.log(data);
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': csrf_token},
        url: "guardar-partida",
        data: data,
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            nueva_id_partida = response.id_partida;
            // alert('Se guardo exitosamente');
            mostrarPartidas(response.id_presup);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
}