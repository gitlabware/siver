$(document).ready(function () {
    $('#tabla-imp').dataTable({
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [-1]
            }],
        "oLanguage": {
            "oPaginate": {
                "sPrevious": "Anterior",
                "sNext": "Siguiente"
            },
            "sSearch": "Buscar",
            "sLengthMenu": "Mostrar _MENU_ registros"
        },
        "iDisplayLength": 10,
        "aLengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "Todos"]
        ],
        'order': [],
        "sDom": '<"dt-panelmenu clearfix" lfrB>t<"dt-panelfooter clearfix"ip>',
        //dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                    '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                                    );
                    $(win.document.body).find('table').find('th:last-child').remove();
                    $(win.document.body).find('table').find('td:last-child').remove();
                    $(win.document.body).find('table').removeClass('table-bordered').removeClass('table')
                            .addClass('CSSTableGenerator')
                            .css('font-size', 'inherit');
                },
                className: 'btn btn-sm btn-dark boton-p',
                text: '<i class="fa fa-print"></i> Imprimir'
            }
        ]
    }).columnFilter({
        sPlaceHolder: "head:before",
        aoColumns: filtro_c
    });
});

/*$('#tabla-imp').dataTable().columnFilter({
 sPlaceHolder: "head:before",
 aoColumns: filtro_c
 });*/