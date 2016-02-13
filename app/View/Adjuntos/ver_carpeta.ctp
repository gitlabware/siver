
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-folder-open"></i>Carpeta</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Adjunto', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-12">
            <?php if (empty($flujo)): ?>
              <label for="firstname" class="field prepend-icon">
                  <?php echo $this->Form->text('nombre', ['class' => 'gui-input', 'required', 'placeholder' => 'Ingrese el nombre de la carpeta']); ?>
                  <label for="email" class="field-icon">
                      <i class="fa fa-edit"></i>
                  </label>
              </label>

            <?php else: ?>
              <label for="firstname" class="field prepend-icon">
                  <?php echo $this->Form->text('nombre_original', ['class' => 'gui-input', 'required', 'placeholder' => 'Ingrese el nombre de la carpeta', 'disabled']); ?>
                  <label for="email" class="field-icon">
                      <i class="fa fa-edit"></i>
                  </label>
              </label>
              <?php echo $this->Form->hidden('nombre'); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-12">
            <label class="field select">
                <?php echo $this->Form->select('visible', array('Todos' => 'Todos', 'Mi' => 'Mi'), array('empty' => 'Visible para...', 'required')) ?>
                <i class="arrow double"></i>
            </label>
        </div>
    </div>

</div>
<!-- end .form-body section -->

<?php if ($this->Session->read('Auth.User.id') == $carpeta['Adjunto']['user_id']):?>
<div class="panel-footer">
    <?php if (empty($flujo)): ?>
      <?php echo $this->Html->link('Eliminar', array('action' => 'eliminar_carpeta', $idCarpeta), array('class' => 'button btn-danger ', 'confirm' => 'Esta seguro de eliminar la carpeta??')); ?>
    <?php else: ?>
      <?php //echo $this->Html->link('Eliminar', array('action' => 'eliminar_carpeta', $idCarpeta), array('class' => 'button btn-danger', 'confirm' => 'Esta seguro de eliminar la carpeta??', 'disabled')); ?>
    <?php endif; ?>
    <button type="submit" class="button btn-primary">Registrar</button>
</div>
<?php endif;?>
<!-- end .form-footer section -->
<?php //echo $this->Form->hidden('id')?> 
<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>
