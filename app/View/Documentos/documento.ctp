<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-square"></i>Documento</span>
</div>

<?= $this->Form->create('Documento', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row" id="camp-selelcion">
        <div class="col-md-10">
            <label class="field select">
                <?php echo $this->Form->select('Documento.tipo', $documentos, array('empty' => 'Seleccione el Documento', 'id' => 'idsel-tipo')) ?>
                <i class="arrow double"></i>
            </label>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-info btn-block" title="Cambio a texto" onclick="
                    $('#camp-selelcion').hide(400);
                    //$('#idsel-tipo').attr('required', false).val('');
                    $('#camp-texto').show(400);
                    //$('#idtext-tipo').attr('required', true);">
                <i class="fa fa-exchange"></i>
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
        <div class="col-md-2">
            <button type="button" class="btn btn-info btn-block"  title="Cambio a seleccion" onclick="
                    $('#camp-selelcion').show(400);
                    //$('#idsel-tipo').attr('required', true);
                    $('#camp-texto').hide(400);
                    // $('#idtext-tipo').attr('required', false).val('');">
                <i class="fa fa-exchange"></i>
            </button>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php //echo $this->Form->text('Documento.nombre', ['class' => 'gui-input', 'placeholder' => 'Ingrese tipo de documento', 'id' => 'idtext-tipo']); ?>
                <label class="switch block mt15 switch-primary">
                    <?php echo $this->Form->checkbox('Documento.original', array('id' => 'f1')) ?>
                    <!--<input type="checkbox" id="f1"   name="data[documentos][original]">-->
                    <label for="f1" data-on="ORIGINAL" data-off="COPIA"></label>
                </label>
        </div>
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('Documento.hojas', ['class' => 'gui-input', 'placeholder' => 'Cantidad Hojas', 'type' => 'number']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-bookmark-o"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-12">
            <label class="field prepend-icon append-button file">
                <span class="button btn-primary">Seleccione el archivo</span>
                <?php echo $this->Form->file('Documento.archivo', array('id' => 'file1', 'class' => 'gui-file', 'onchange' => "document.getElementById('uploader1').value = this.value;")); ?>

                <input type="text" class="gui-input" id="uploader1" placeholder="Seleccione el archivo">
                <label class="field-icon">
                    <i class="fa fa-upload"></i>
                </label>
            </label>
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

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
</div>
<!-- end .form-footer section -->
<?php echo $this->Form->hidden('Documento.id') ?>  

<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>

<script>

    $('#f-add').submit(function (e) {
        //var file = $("#file1")[0].files[0];
        //alert($("#f-add").valid());
        if ($("#f-add").valid()) {
            var formData = new FormData($('#f-add')[0]);
            $.ajax({
                url: '<?php echo $this->Html->url(array('action' => 'guarda_docuemento')); ?>', //Server script to process data
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
                        mensaje_m("Excelente!!", 'Se ha guardado los datos del documento!!', "success");
                    } else {
                        mensaje_m("Error!!", $.parseJSON(data).error, "danger");
                    }

                    setTimeout(function () {
                        window.location = '';
                    }, 2000);

                },
                data: formData,
                //Options to tell jQuery not to process data or worry about content-type.
                cache: false,
                contentType: false,
                processData: false
            });
        }

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