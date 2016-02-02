<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-tasks"></i>Tarea</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Proceso', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-6">
            <div class="section">
                <label class="field select">
                    <?php echo $this->Form->select('Tarea.flujos_user_id', $flujos, array('empty' => 'En Flujo....', 'id' => 'idflujo')) ?>
                    <i class="arrow double"></i>
                </label>
            </div>
            <div class="section">
                <label class="field select">
                    <?php echo $this->Form->select('Tarea.asignado_id', $usuarios, array('empty' => 'Asignar a...')) ?>

                    <i class="arrow double"></i>
                </label>
            </div>
            <div class="section">
                <label for="datepicker1" class="field prepend-icon">
                    <?php echo $this->Form->text('Tarea.fechainicio', array('class' => 'form-control', 'placeholder' => 'Fecha Inicio', 'id' => 'ddatepicker1')); ?>
                    <label class="field-icon">
                        <i class="fa fa-calendar-o"></i>
                    </label>
                </label>
            </div>
            <div class="section">
                <label for="datepicker1" class="field prepend-icon">
                    <?php echo $this->Form->text('Tarea.fechafin', array('class' => 'form-control', 'placeholder' => 'Fecha Fin', 'id' => 'ddatepicker2')); ?>
                    <label class="field-icon">
                        <i class="fa fa-calendar-o"></i>
                    </label>
                </label>
            </div>
            <div class="section">
                <label class="field select">
                    <?php echo $this->Form->select('Tarea.prioridad', array('Urgente' => 'Urgente', 'Alta' => 'Alta', 'Normal' => 'Normal', 'Baja' => 'Baja'), array('empty' => 'Seleccione Prioridad','required')) ?>
                    <i class="arrow double"></i>
                </label>
            </div>

        </div>
        <!-- end section -->

        <div class="col-md-6">
            <div class="section">
                <label class="field select" id="carga_proceso_d">
                    <?php echo $this->Form->select('Tarea.proceso_id', array(), array('empty' => 'En Proceso....', 'disabled')) ?>
                    <i class="arrow double"></i>
                </label>
            </div>
            <div class="section" id="spy3">
                <label for="comment" class="field prepend-icon">
                    <?php echo $this->Form->textarea('Tarea.descripcion', array('class' => 'gui-textarea', 'placeholder' => 'Descripcion','required')) ?>
                    <label for="comment" class="field-icon">
                        <i class="fa fa-comments"></i>
                    </label>
                    <span class="input-footer">
                        <strong>Nota:</strong> Use este campo para describir la tarea
                    </span>
                </label>
            </div>
            <div class="section">
                <label for="useremail" class="field prepend-icon">
                    <?php echo $this->Form->text('Tarea.porcentaje', array('class' => 'gui-input', 'placeholder' => 'Porcentaje de la tarea')); ?>
                    <label for="useremail" class="field-icon">
                        <i class="fa fa-neuter"></i>
                    </label>
                </label>
            </div>
        </div>
        <!-- end section -->
    </div>
</div>
<!-- end .form-body section -->

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
</div>
<!-- end .form-footer section --> 
<?php echo $this->Form->hidden('user_id',array('value' => $this->Session->read('Auth.User.id'))) ?> 

<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>
<?php echo $this->Html->script(array('vendor/plugins/moment/moment.min', 'vendor/plugins/datepicker/js/bootstrap-datetimepicker', 'inicalendario2')) ?>
<script>

  $('#idflujo').change(function () {
      $('#carga_proceso_d').load('<?php echo $this->Html->url(array('controller' => 'Procesos','action' => 'ajax_sel_procesos')); ?>/'+$('#idflujo').val());
  });
</script>