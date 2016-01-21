var str = "";
var nombre = "";
var fecha = [];
function ini_fechas(formulario) {

    $(formulario + ' input.mascara-f').each(function (i, valor) {
        $(valor).mask("99-99-9999");
    });

    $(formulario).submit(function (e) {
        $(formulario + ' input.mascara-f').each(function (i, valor) {
            str = $(valor).val();
            nombre = $(valor).attr('name');
            fecha = str.split("-");
            $(formulario).append('<input type="hidden" name="' + nombre + '[year]" value="' + fecha[2] + '"></input>');
            $(formulario).append('<input type="hidden" name="' + nombre + '[month]" value="' + fecha[1] + '"></input>');
            $(formulario).append('<input type="hidden" name="' + nombre + '[day]" value="' + fecha[0] + '"></input>');
        });
    });
}