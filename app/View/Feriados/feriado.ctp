<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-calendar-o"></i>Feriado</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Feriado', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('Feriado.nombre', ['class' => 'gui-input', 'placeholder' => 'Nombre del feriado', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-bookmark-o"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section">
        <label for="datepicker1" class="field prepend-icon">
            <?php echo $this->Form->text('Feriado.fecha', array('class' => 'form-control', 'placeholder' => 'Fecha de Activacion', 'id' => 'ddatepicker1', 'required')); ?>
            <label class="field-icon">
                <i class="fa fa-calendar-o"></i>
            </label>
        </label>
    </div>
</div>
<!-- end .form-body section -->

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
    <?php if (!empty($this->request->data['Feriado']['id'])): ?>
      <?php echo $this->Html->link('Eliminar', array('action' => 'eliminar', $this->request->data['Feriado']['id']), array('class' => 'button btn-danger', 'confirm' => 'Esta seguro de eliminar el feriado??')); ?>
    <?php endif; ?>
</div>
<!-- end .form-footer section -->
<?php echo $this->Form->hidden('id')?> 

<?= $this->Form->end(); ?>
<?php
echo $this->Html->script(
  array(
    'vendor/plugins/moment/moment.min',
    'vendor/plugins/datepicker/js/bootstrap-datetimepicker',
    'inicalendario3',
    'jquery.validate.min',
    'inivalidacion_reg'
  )
)
?>