<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-play-circle"></i>Activacion</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Adjunto', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section">
        <label for="datepicker1" class="field prepend-icon">
            <?php echo $this->Form->text('Tarea.fechainicio', array('class' => 'form-control', 'placeholder' => 'Fecha de Activacion', 'id' => 'ddatepicker1')); ?>
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
<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 
<?php echo $this->Form->hidden('tipo', array('value' => 'Carpeta')); ?>
<?php echo $this->Form->hidden('extension', array('value' => '')); ?>

<?php echo $this->Form->hidden('estado', array('value' => 'Activo')); ?>
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