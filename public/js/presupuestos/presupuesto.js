$(document).ready(function () {
    $('#listaPresupuestos').DataTable({
        // 'dom': 'lBfrtip',
        'language' : idioma,
        'destroy' : true,
    });

    $('#listaPresupuestos tbody tr').on('click', function(){
        var id = $(this).attr('value');
        $('[name=id_presup]').val(id);
        $('[name=codigo]').text($(this).find('td')[0].innerText);
        $('[name=descripcion]').text($(this).find('td')[1].innerText);
        $('[name=name_grupo]').text($(this).find('td')[2].innerText);
        $('[name=fecha_emision]').text($(this).find('td')[3].innerText);
        $('[name=name_moneda]').text($(this).find('td')[4].innerText);
        
        $('#presupuestosModal').modal('hide');
        mostrarPartidas(id);
    });
});

function mostrarPartidas(id){
    $.ajax({
        type: 'GET',
        headers: {'X-CSRF-TOKEN': csrf_token},
        url: 'mostrarPartidas/'+id,
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            console.log(response['titulos']);
            var html = ''; 
            var suma_servicios = 0;

            response['titulos'].sort(function(a, b) {
                if (a.codigo > b.codigo) {
                  return 1;
                }
                if (a.codigo < b.codigo) {
                  return -1;
                }
                return 0;
            });

            response['partidas'].sort(function(a, b) {
                if (a.codigo > b.codigo) {
                  return 1;
                }
                if (a.codigo < b.codigo) {
                  return -1;
                }
                return 0;
            });

            response['titulos'].forEach(element => {
                // suma_servicios += parseFloat(element.valor_total);
                html += `<tr id="${element.id_titulo}" style="background: LightCyan;">
                    <td>${element.codigo}</td>
                    <td>${element.descripcion}</td>
                    <td>${element.total}</td>
                    <td style="padding:0px;">
                        <button class="btn btn-box-tool btn-sm btn-danger delete-titulo" data-toggle="tooltip" data-placement="bottom" title="Descartar" >
                        <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
                    </td>
                </tr>`;

                response['partidas'].forEach(partida => {

                    if (element.codigo == partida.cod_padre){
                        // suma_servicios += parseFloat(element.valor_total);
                        html += `<tr id="${partida.id_partida}">
                            <th>${partida.codigo}</th>
                            <th>${partida.descripcion}</th>
                            <th>${partida.importe_total}</th>
                            <th style="padding:0px;">
                                <button class="btn btn-box-tool btn-sm btn-danger delete-partida" data-toggle="tooltip" data-placement="bottom" title="Descartar" >
                                <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
                            </th>
                        </tr>`;
                    }
                    
                });
            });
            $('#listaPartidas tbody').html(html);
            // $('[name=total_directos]').text(formatDecimalDigitos(suma_servicios,2));
            // actualizaTotales();
        }
    }).fail( function( jqXHR, textStatus, errorThrown ){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    });
}