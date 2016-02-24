<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-play-circle"></i>Activacion</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Adjunto', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="alert alert-info pastel alert-dismissable">
        <i class="fa fa-info pr10"></i>
        <strong>Informacion!</strong> Se cambiara o se creara un estado de Activo en el proceso que podria influir en dias de vencimiento y activacion o finalizacion automatica.
    </div>
    <div class="section">
        <label for="datepicker1" class="field prepend-icon">
            <?php echo $this->Form->text('ProcesosEstado.created', array('class' => 'form-control', 'placeholder' => 'Fecha de Activacion', 'id' => 'ddatepicker1', 'value' => date("Y-m-d H:i:s"),'required')); ?>
            <label class="field-icon">
                <i class="fa fa-calendar-o"></i>
            </label>
        </label>
    </div>
</div>
<!-- end .form-body section -->

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
</div>
<!-- end .form-footer section -->
<?php //echo $this->Form->hidden('id')?> 
<?php echo $this->Form->hidden('ProcesosEstado.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 
<?php echo $this->Form->hidden('ProcesosEstado.flujos_user_id', array('value' => $idFlujosUser)); ?>
<?php echo $this->Form->hidden('ProcesosEstado.proceso_id', array('value' => $idProceso)); ?>
<?php echo $this->Form->hidden('ProcesosEstado.estado', array('value' => 'Activo')); ?>
<?= $this->Form->end(); ?>
<?php
echo $this->Html->script(
  array(
    'vendor/plugins/moment/moment.min',
    'vendor/plugins/datepicker/js/bootstrap-datetimepicker',
    'inicalendario2',
    'jquery.validate.min',
    'inivalidacion_reg'
  )
)
?>