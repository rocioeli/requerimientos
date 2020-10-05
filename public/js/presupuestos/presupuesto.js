$(document).ready(function () {
    $('#listaPresupuestos').DataTable({
        // 'dom': 'lBfrtip',
        'language' : idioma,
        'destroy' : true,
    });

    $('#listaPresupuestos tbody tr').on('click', function(){
        var id = $(this).attr('value');
        
        $('#presupuestosModal').modal('hide');
        mostrarPartidas(id);
    });
});

$(function(){
    var id_presup = localStorage.getItem("id_presup");
    if (id_presup !== null){
        mostrarPartidas(id_presup);
        localStorage.removeItem("id_presup");
    }
});

$(".nuevo-presupuesto").on('click',function(){
    $('#presupuestoCreate').modal({
        show: true
    });
    
    $('#submit-presupuestoCreate').removeAttr('disabled');

    $('[name=id_presup]').val('');
    $('#cod_presup').text('');
    $('[name=moneda]').val('1');
    $('[name=descripcion]').val('');
    $('[name=id_grupo]').val('0');
});

$(".editar-presupuesto").on('click', function(){
    $('#presupuestoCreate').modal({
        show: true
    });
    
    $('#submit-presupuestoCreate').removeAttr('disabled');
    
    if (presupuesto !== null){
        $('[name=id_presup]').val(presupuesto.id_presup);
        $('#cod_presup').text(presupuesto.codigo);
        $('[name=moneda]').val(presupuesto.moneda);
        $('[name=descripcion]').val(presupuesto.descripcion);
        $('[name=id_grupo]').val(presupuesto.id_grupo);
        $('[name=fecha_emision]').val(presupuesto.fecha_emision);
    }
});

$("#form-presupuestoCreate").on("submit", function(e){
    e.preventDefault();
    var data = $(this).serialize();
    var id = $('[name=id_presup]').val();
    var url = '';
    $('#submit-presupuestoCreate').attr('disabled','true');
    
    if (id == ''){
        url = 'guardar-presupuesto';
    } else {
        url = 'actualizar-presupuesto';
    }
    console.log(data);
    guardar_presupuesto(data, url);

    $('#presupuestoCreate').modal('hide');
});

function guardar_presupuesto(data, url){
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': csrf_token},
        url: url,
        data: data,
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            nuevo_id_titulo = '';
            mostrarPartidas(response.id_presup);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
}

let nuevo_id_titulo = '';
let presupuesto = null;

function mostrarPartidas(id){
    $.ajax({
        type: 'GET',
        headers: {'X-CSRF-TOKEN': csrf_token},
        url: 'mostrarPartidas/'+id,
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            presupuesto = response;

            $('[name=id_presup]').val(id);
            $('[name=codigo]').text(response.codigo);
            $('[name=descripcion]').text(response.descripcion);
            $('[name=name_grupo]').text(response.grupo['descripcion']);
            $('[name=fecha_emision]').text(response.fecha_emision);
            $('[name=name_moneda]').text(response.moneda_seleccionada['descripcion']);

            var html = ''; 

            response.titulos.sort(function(a, b) {
                if (a.codigo > b.codigo) {
                  return 1;
                }
                if (a.codigo < b.codigo) {
                  return -1;
                }
                return 0;
            });

            response.partidas.sort(function(a, b) {
                if (a.codigo > b.codigo) {
                  return 1;
                }
                if (a.codigo < b.codigo) {
                  return -1;
                }
                return 0;
            });

            var desPadre = '';
            response.titulos.forEach(element => {
                desPadre = response.titulos.find(titulo => titulo.codigo == element.cod_padre);

                html += `<tr style="background: LightCyan;">
                    <td><a name="${element.id_titulo}"></a>${element.codigo}</td>
                    <td>${element.descripcion}</td>
                    <td>${element.total}</td>
                    <td style="padding:0px;">
                        <div class="btn-group" role="group">

                            <button type="button" class="btn btn-box-tool btn-xs btn-success agregar-titulo" data-toggle="tooltip" data-placement="bottom" 
                                title="Agregar SubTitulo" data-codigo="${element.codigo}" data-descripcion="${element.descripcion}">
                                <i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>

                            <button type="button" class="btn btn-box-tool btn-xs btn-primary agregar-partida" data-toggle="tooltip" data-placement="bottom" 
                                title="Agregar Partida" data-codigo="${element.codigo}" data-descripcion="${element.descripcion}">
                                <i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>

                            <button type="button" class="btn btn-box-tool btn-xs btn-info editar-titulo" data-toggle="tooltip" data-placement="bottom" 
                                title="Editar SubTitulo" data-id="${element.id_titulo}" data-codigo="${element.codigo}" data-descripcion="${element.descripcion}"
                                data-codpadre="${element.cod_padre}" data-despadre="${(desPadre!==undefined ? desPadre.descripcion : '')}">
                                <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>

                            <button type="button" class="btn btn-box-tool btn-xs btn-danger anular-titulo" data-toggle="tooltip" data-placement="bottom" 
                                title="Anular SubTitulo" data-id="${element.id_titulo}">
                                <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
                        </div>
                    </td>
                    <td hidden>${element.cod_padre}</td>
                    <td hidden></td>
                </tr>`;

                response.partidas.forEach(partida => {

                    if (element.codigo == partida.cod_padre){
                        
                        html += `<tr>
                            <td><a name="${partida.id_partida}"></a>${partida.codigo}</td>
                            <td>${partida.descripcion}</td>
                            <td>${partida.importe_total}</td>
                            <td style="padding:0px;">
                                <div class="btn-group" role="group">

                                    <button class="btn btn-box-tool btn-xs btn-default ver-detalle" data-toggle="tooltip" data-placement="bottom" 
                                        title="Ver Detalle" data-id="${partida.id_partida}">
                                        <i class="glyphicon glyphicon-chevron-down" aria-hidden="true"></i></button>
                                    
                                    <button class="btn btn-box-tool btn-xs btn-info editar-partida" data-toggle="tooltip" data-placement="bottom" 
                                        title="Editar Partida" data-id="${partida.id_partida}" data-cod="${partida.codigo}" data-des="${partida.descripcion}" 
                                        data-total="${partida.importe_total}" data-codpadre="${element.codigo}" data-despadre="${element.descripcion}">
                                        <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>

                                    <button class="btn btn-box-tool btn-xs btn-danger anular-partida" data-toggle="tooltip" data-placement="bottom" 
                                        title="Anular Partida" data-id="${partida.id_partida}" >
                                        <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
                                </div>
                            </td>
                            <td hidden></td>
                            <td hidden>${partida.cod_padre}</td>
                        </tr>`;
                    }
                    
                });
            });
            $('#listaPartidas tbody').html(html);
            
            if (nuevo_id_titulo !== ''){
                location.href = "#"+nuevo_id_titulo;
            }
            // else if (nueva_id_partida !== ''){
            //     location.href = "#"+nueva_id_partida;
            // }
        }
    }).fail( function( jqXHR, textStatus, errorThrown ){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
}

function leftZero(canti, number){
    let vLen = number.toString();
    let nLen = vLen.length;
    let zeros = '';
    for(var i=0; i<(canti-nLen); i++){
        zeros = zeros+'0';
    }
    return zeros+number;
}