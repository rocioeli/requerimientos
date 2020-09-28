var Util = ( function () {
    function mensaje($element, $class, $message)
    {
        $($element).html('<div class="alert '+ $class +'"><span class="close" data-dismiss="alert" aria-label="close">×</span>'+ $message +'</div>');
    }

    function notify (tipo, mensaje) {
        Lobibox.notify(tipo, {
            size: 'mini',
            rounded: true,
            sound: false,
            delayIndicator: false,
            msg: mensaje
        });
    }

    function formato_numero(numero, decimales, punto_decimal, separador_miles)
    {
        numero = (numero + '')
                .replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+numero) ? 0 : +numero,
                prec = !isFinite(+decimales) ? 0 : Math.abs(decimales),
                sep = (typeof separador_miles === 'undefined') ? ',' : separador_miles,
                dec = (typeof punto_decimal === 'undefined') ? '.' : punto_decimal,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + (Math.round(n * k) / k)
                            .toFixed(prec);
                };

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
                .split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '')
                .length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1)
                    .join('0');
        }
        return s.join(dec);
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

    function details(txt1, txt2, txt3, txt4, txt5, txt6)
    {
        var serie = Math.floor(Math.random() * 100);
        var price = formato_numero(txt4, 2, '.', ',');
        content = `
        <tr id="okc-${ serie }">
            <td>
                <input type="hidden" class="form-control input-sm" name="body_type[]" value="${ txt1 }"><span>${ txt5 }</span>
            </td>
            <td>
                <input type="hidden" class="form-control input-sm" name="body_category[]" value="${ txt2 }"><span>${ txt6 }</span>
            </td>
            <td>
                <input type="hidden" class="form-control input-sm" name="body_observation[]" value="${ txt3 }"><span>${ txt3 }</span>
            </td>
            <td align="right">
                <input type="hidden" class="form-control input-sm" name="body_precio[]" value="${ txt4 }"><span>${ price }</span>
            </td>
            <td>
                <button type="button" class="btn btn-xs btn-danger btn-flat" onClick="removeList(${ serie });"><span class="icon-cancel"></span></button>
            </td>
        </tr>`;
        return content;
    }

    return {
        formato_numero: formato_numero,
        leftZero: leftZero,
        mensaje: mensaje,
        notify: notify,
        details: details,
    };
})();