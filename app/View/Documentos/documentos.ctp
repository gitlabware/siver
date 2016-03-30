<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-square"></i>Registrar documentos</span>
</div>

<?= $this->Form->create('Documento', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div id="base-documento">
        <div class="section row" id="camp-selelcion">
            <div class="col-md-10">
                <label class="field select">
                    <?php echo $this->Form->select('Documento.tipo', $documentos, array('empty' => 'Seleccione el Documento', 'id' => 'idsel-tipo')) ?>
                    <i class="arrow double"></i>
                </label>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-info" title="Cambio a texto" onclick="
                        $('#camp-selelcion').hide(400);
                        //$('#idsel-tipo').attr('required', false).val('');
                        $('#camp-texto').show(400);
                        //$('#idtext-tipo').attr('required', true);">
                    <i class="fa fa-exchange"></i>
                </button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success" title="Ingresar documento" onclick="carganuevodoc('#idsel-tipo');">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="section row" id="camp-texto" style="display: none;">
            <div class="col-md-10">
                <label for="firstname" class="field prepend-icon">
                    <?php echo $this->Form->text('Documento.nombre', ['class' => 'gui-input', 'placeholder' => 'Ingrese tipo de documento', 'id' => 'idtext-tipo']); ?>
                    <label for="email" class="field-icon">
                        <i class="fa fa-edit"></i>
                    </label>
                </label>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-info"  title="Cambio a seleccion" onclick="
                        $('#camp-selelcion').show(400);
                        //$('#idsel-tipo').attr('required', true);
                        $('#camp-texto').hide(400);
                        // $('#idtext-tipo').attr('required', false).val('');">
                    <i class="fa fa-exchange"></i>
                </button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success" title="Ingresar documento" onclick="carganuevodoc('#idtext-tipo');">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="section row">
            <div class="col-md-12" id="div_carga_archivo" style="display: none;">
                <div class="progress"> 
                    <div id="cargaarchivo" class="progress-bar progress-bar-info" role=progressbar aria-valuenow=20 aria-valuemin=0 aria-valuemax=100 style=width:0%>0%</div> 
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
</div>
<!-- end .form-footer section -->
<?php echo $this->Form->hidden('FlujosUser.id') ?> 
<?php echo $this->Form->hidden('FlujosUser.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 

<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>

<script>
    var numero = 0;
    function carganuevodoc(campo) {

        if ($(campo).val() != '') {
            numero++;
            var contenido_doc = ''
                    + '<div class="section row" id="p-documento-' + numero + '">'
                    + '    <div class="col-md-4"><label for="firstname" class="field">'
                    + '            <input type="text" class="gui-input" placeholder="' + $(campo).val() + '" disabled="">'
                    + '            <input type="hidden" value="' + $(campo).val() + '" name="data[documentos][' + numero + '][tipo]">'
                    + '        </label>'
                    + '    </div>'
                    + '    <div class="col-md-2">'
                    + '        <label class="switch block mt15 switch-primary">'
                    + '            <input type="checkbox" id="f1-' + numero + '"   name="data[documentos][' + numero + '][original]">'
                    + '            <label for="f1-' + numero + '" data-on="ORIGINAL" data-off="COPIA"></label>'
                    + '    </label>'
                    + '    </div>'
                    + '    <div class="col-md-2">'
                    + '        <label for="firstname" class="field">'
                    + '            <input type="number" class="gui-input" placeholder="Cantidad" name="data[documentos][' + numero + '][hojas]">'
                    + '        </label>'
                    + '    </div>'
                    + '    <div class="col-md-3">'
                    + '        <label class="field file">'
                    + '            <span class="button btn-primary"><i class="fa fa-upload"></i></span>'
                    + '            <input type="file" class="gui-file" id="file2-' + numero + '" onChange="document.getElementById(' + "'uploader2-" + numero + "'" + ').value = this.value;" name="data[documentos][' + numero + '][archivo]">'
                    + '            <input type="text" class="gui-input" id="uploader2-' + numero + '" placeholder="Seleccione el archivo">'
                    + '        </label>'
                    + '    </div>'
                    + '    <div class="col-md-1">'
                    + '        <button type="button" class="btn btn-danger" title="Quitar" onclick="quitar(' + numero + ')">'
                    + '            <i class="fa fa-remove"></i>'
                    + '        </button>'
                    + '    </div>'
                    + ''
                    + ''
                    + ''
                    + ''
                    + ''
                    + ''
                    + '';
            $(campo).val('');

            $('#base-documento').after(contenido_doc);
        }
    }

    function quitar(num) {
        $('#p-documento-' + num).hide(500);
        setTimeout(function () {
            $('#p-documento-' + num).remove();
        }, 500);
    }
</script>


<script>

    function registradocumento(num) {
        if ($('#p-documento-' + num).attr('id') != null) {
            var ocu_error = false;
            var formData = new FormData($('#f-add')[0]);
            $.ajax({
                url: '<?php echo $this->Html->url(array('controller' => 'Documentos', 'action' => 'guarda_docuementos', $idFlujosUser)); ?>/' + num, //Server script to process data
                type: 'POST',
                xhr: function () {  // Custom XMLHttpRequest
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) { // Check if upload property exists
                        myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // For handling the progress of the upload
                    }
                    return myXhr;
                },
                //Ajax events
                beforeSend: function () {
                    $('#div_carga_archivo').show(100);
                    $('.pocu').hide(100);
                },
                success: function (data) {
                    if ($.parseJSON(data).error === '') {
                        //mensaje_m("Excelente!!", 'Se ha registrado los documentos!!', "success");
                        quitar(num);
                    } else {
                        mensaje_m("Error!!", $.parseJSON(data).error, "danger");
                        ocu_error = true;
                    }

                    if (num == numero && !ocu_error) {
                        mensaje_m("Excelente!!", 'Se ha registrado los documentos', "success");
                        setTimeout(function () {
                            window.location = '';
                        }, 800);
                    }
                    console.log(ocu_error);
                    console.log(num);
                    num++;
                    registradocumento(num);
                },
                data: formData,
                //Options to tell jQuery not to process data or worry about content-type.
                cache: false,
                contentType: false,
                processData: false
            });
        } else {
            if (num == numero) {
                setTimeout(function () {
                    window.location = '';
                }, 2000);
            }
            num++;
            registradocumento(num);
        }

    }

    $('#f-add').submit(function (e) {
        var empezar_c = 1;
        registradocumento(empezar_c);
        e.preventDefault();
    });

</script>
<script>

    function progressHandlingFunction(e) {
        if (e.lengthComputable) {
            $('#cargaarchivo').css({width: parseInt((e.loaded / e.total) * 100) + '%'});
            $('#cargaarchivo').html(parseInt((e.loaded / e.total) * 100));
        }
    }
    function mensaje_m(tipo_notif, texto_noyif, noteStyle) {
        var Stacks = {
            stack_bar_top: {
                "dir1": "down",
                "dir2": "right",
                "push": "top",
                "spacing1": 0,
                "spacing2": 0
            }
        }
        var noteShadow = "false";
        var noteStack = "stack_bar_top";
        var noteOpacity = "1";

        // Create new Notification
        new PNotify({
            title: tipo_notif,
            text: texto_noyif,
            shadow: noteShadow,
            opacity: noteOpacity,
            addclass: noteStack,
            type: noteStyle,
            stack: Stacks[noteStack],
            width: "100%",
            delay: 2000
        });
    }
</script>