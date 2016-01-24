<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-tasks"></i>Condiciones</span>
</div>
<!-- end .panel-heading section -->
<?= $this->Form->create('Proceso', ['class' => 'form-validacion', 'id' => 'f-add', 'action' => 'registra_condicion']); ?>
<div class="panel-body p25">
    <h4><?php echo $proceso['Proceso']['nombre'] ?></h4>
    <div class="section row">
        <div class="col-md-7">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->select('ProcesosCondicione.condicion_id', $opciones, ['class' => 'form-control', 'required', 'empty' => 'Seleccione el proceso de condicion']); ?>

            </label>
        </div>
        <div class="col-md-4">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->select('ProcesosCondicione.tipo', ['Necesario' => 'Necesario', 'Opcional' => 'Opcional'], ['class' => 'form-control', 'value' => 'Necesario', 'required', 'empty' => 'Seleccione el tipo de condicion']); ?>
            </label>
        </div>
    </div>
    <?php if (!empty($condiciones_g)): ?>
      <div class="section row">
          <div class="col-md-12">
              <table class="table table-bordered">
                  <thead>
                      <tr class="system">
                          <th>Proceso</th>
                          <th>Tipo</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($condiciones_g as $con): ?>
                        <tr>
                            <td><?php echo $con['Condicion']['nombre'] ?></td>
                            <td><?php echo $con['ProcesosCondicione']['tipo'] ?></td>
                            <td>
                                <a href="javascript:" title="Quitar condicion" onclick="if (confirm('Esta seguro de quitar la condicion??')) {
                                              eliminar_cond(<?php echo $con['ProcesosCondicione']['id'] ?>);
                                          }" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>
    <?php endif; ?>
</div>
<!-- end .form-body section -->

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
</div>
<!-- end .form-footer section -->
<?php echo $this->Form->hidden('ProcesosCondicione.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 
<?php echo $this->Form->hidden('ProcesosCondicione.proceso_id', array('value' => $proceso['Proceso']['id'])) ?> 
<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>

<script>
  var texto_noyif = "";
  function eliminar_cond(idProcCond) {
      var formURL = '<?php echo $this->Html->url(array('action' => 'eliminar_cond')); ?>/' + idProcCond;
      $.ajax(
              {
                  url: formURL,
                  type: "POST",
                  success: function (data, textStatus, jqXHR)
                  {
                      texto_noyif = "Se ha eliminado correctamente";
                      cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'condiciones', $proceso['Proceso']['flujo_id'], $proceso['Proceso']['id'])); ?>');
                      mensaje_b();
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      //if fails   
                      alert("error");
                  }
              });
  }
  $("#f-add").submit(function (e)
  {
      var postData = $(this).serializeArray();
      var formURL = $(this).attr("action");
      $.ajax(
              {
                  url: formURL,
                  type: "POST",
                  data: postData,
                  /*beforeSend:function (XMLHttpRequest) {
                   alert("antes de enviar");
                   },
                   complete:function (XMLHttpRequest, textStatus) {
                   alert('despues de enviar');
                   },*/
                  success: function (data, textStatus, jqXHR)
                  {
                      //data: return data from server
                      //$("#parte").html(data);
                      texto_noyif = "Se ha registrado correctamente";
                      cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'condiciones', $proceso['Proceso']['flujo_id'], $proceso['Proceso']['id'])); ?>');
                      mensaje_b();
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      //if fails   
                      alert("error");
                  }
              });
      e.preventDefault(); //STOP default action
      //e.unbind(); //unbind. to stop multiple form submit.
  });

  function mensaje_b() {
      var tipo_notif = "Excelente!!";

      var noteStyle = "success";
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