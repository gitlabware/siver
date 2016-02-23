
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-square"></i>Flujo</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Flujo', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->textarea('FlujosUser.descripcion', ['class' => 'gui-textarea', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
    </div>
    <?php if (!empty($this->request->data['FlujosUser']['id'])): ?>
      <div class="section row pocu">
          <label class="field select">
              <?php echo $this->Form->select('FlujosUser.estado', array('Activo' => 'Activo', 'Finalizado' => 'Finalizado'), array('empty' => 'Seleccione Estado', 'required')) ?>
              <i class="arrow double"></i>
          </label>
      </div>
    <?php else: ?>
      <?php echo $this->Form->hidden('FlujosUser.estado', array('value' => 'Activo')) ?> 
    <?php endif; ?>

</div>
<!-- end .form-body section -->

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