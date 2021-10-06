// Google Analytics: change UA-XXXXX-X to be your site's ID.
(function(b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
        function() {
            (b[l].q = b[l].q || []).push(arguments)
        });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.src = 'https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
}(window, document, 'script', 'ga'));
ga('create', 'UA-XXXXX-X', 'auto');
ga('send', 'pageview');

function retorno(data) {
    if (!data.erro) {
        $('input[name=address]').val(data.logradouro);
        $('input[name=district]').val(data.bairro);
        $('input[name=city]').val(data.localidade);
        $('select[name=state]').val(data.uf).trigger('change');
    }
}

$(function() {
    var table = $('#data_table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
        },
        responsive: true,
        select: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }]
    });

    $('input[name=zipcode]').on('blur', function() {
        let cep = $(this).val().replace(/\D/g, '');

        if (cep !== '' && cep !== 'undefined') {
            let validacep = /^[0-9]{8}$/;

            if (validacep.test(cep)) {
                let script = document.createElement('script');
                script.src = `https://viacep.com.br/ws/${cep}/json/?callback=retorno`;
                document.body.appendChild(script);
            }
        }
    });

    // Consulta dados do cnpj na receita e preenche automaticamente os campos
    $('input[name=document]').on('blur', function() {
        let document = $(this).val().replace(/\D/g, '');
        let url = 'https://www.receitaws.com.br/v1/cnpj/' + document;

        $.ajax({
            method: 'GET',
            url: url,
            dataType: 'jsonp',
            success: function(result) {
                if (result.status === 'OK') {
                    $('[name=name]').val(result.nome);
                    $('[name=alias]').val(result.fantasia);
                    $('[name=phone]').val(result.telefone);
                    $('[name=email]').val(result.email);
                    $('[name=zipcode]').val(result.cep);
                    $('[name=address]').val(result.logradouro);
                    $('[name=number]').val(result.numero);
                    $('[name=district]').val(result.bairro);
                    $('[name=complement]').val(result.complemento);
                    $('[name=city]').val(result.municipio);
                    $('[name=state]').val(result.uf).change();
                }
            }
        });
    });

    $('input[name=phone]').inputmask("(99) 9999-9999");
    $('input[name=celphone]').inputmask("(99) 9 9999-9999");
    $('input[name=zipcode]').inputmask("99999-999");
    $('input[name=document]').inputmask({
        mask: ["999.999.999-99", "99.999.999/9999-99"]
    });

    $('.select2').select2({
        width: 'resolve'
    });
});

$(window).on('load', function() {
    $('#loading').fadeOut(300, function() {
        $('#loading').remove();
    });
});