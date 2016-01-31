
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-file"></i>Archivo adjunto</span>
</div>
<!-- end .panel-heading section -->
<?php echo $this->Form->create('Adjunto', array('class' => 'form-validacion', 'enctype' => 'multipart/form-data', 'id' => 'f-add'), array('type' => 'file')); ?>

<div class="panel-body p25">
    <div class="section row pocu">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('nombre', ['class' => 'gui-input', 'required', 'placeholder' => 'Nombre']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-pencil"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row pocu">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->textarea('descripcion', ['class' => 'gui-textarea', 'placeholder' => 'Descripcion']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-pencil"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row pocu">
        <label class="field prepend-icon append-button file">
            <span class="button btn-primary">Seleccione el archivo</span>
            <?php echo $this->Form->file('archivo', array('id' => 'file1', 'class' => 'gui-file', 'onchange' => "document.getElementById('uploader1').value = this.value;", 'required')); ?>

            <input type="text" class="gui-input" id="uploader1" placeholder="Seleccione el archivo">
            <label class="field-icon">
                <i class="fa fa-upload"></i>
            </label>
        </label>
    </div>
    <div class="section row">
        <div class="col-md-12" id="div_carga_archivo" style="display: none;">
            <div class="progress"> 
                <div id="cargaarchivo" class="progress-bar progress-bar-info" role=progressbar aria-valuenow=20 aria-valuemin=0 aria-valuemax=100 style=width:0%>0%</div> 
            </div> 
        </div>
    </div>
</div>
<!-- end .form-body section -->

<div class="panel-footer pocu">
    <button type="submit" class="button btn-primary">Registrar</button>
</div>
<!-- end .form-footer section -->
<?php echo $this->Form->hidden('tarea_id', array('value' => $idTarea)) ?> 
<?php echo $this->Form->hidden('proceso_id', array('value' => $idProceso)) ?> 
<?php echo $this->Form->hidden('flujos_user_id', array('value' => $idFlujosUser)) ?> 
<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 
<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>

<script>

  $('#f-add').submit(function (e) {
      var file = $("#file1")[0].files[0];
      if (file != null) {
          var size = file.size;

          if (size <= 2097152) {
              var formData = new FormData($('#f-add')[0]);
              $.ajax({
                  url: '<?php echo $this->Html->url(array('action' => 'guarda_archivo')); ?>', //Server script to process data
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
                      $('#div_carga_archivo').toggle(100);
                      $('.pocu').toggle(100);
                  },
                  success: function () {

                      mensaje_m("Excelente!!", 'Se ha registrado el archivo adjunto!!', "success");
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
          } else {
              mensaje_m("Error!!", 'Peso maximo 2Mb', "danger");
          }

          //var formData = $('#f-add').serializeArray();

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