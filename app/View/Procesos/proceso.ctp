
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-tasks"></i>Proceso</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Proceso', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->textarea('nombre', ['class' => 'gui-textarea', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('tiempo', ['class' => 'gui-input','type' => 'number','min' => 0,'placeholder' => 'Dias de Vencimiento']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-bookmark-o"></i>
                </label>
            </label>
            
        </div>
    </div>
</div>
<!-- end .form-body section -->

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
    <?php if (!empty($this->request->data['Proceso']['id'])): ?>
      <?php echo $this->Html->link('Eliminar', array('action' => 'eliminar',$this->request->data['Proceso']['id']), array('class' => 'button btn-danger','confirm' => 'Esta seguro de eliminar el proceso??')) ?>
    <?php endif; ?>
</div>
<!-- end .form-footer section -->
<?php echo $this->Form->hidden('id') ?> 
<?php echo $this->Form->hidden('user_id') ?> 
<?php echo $this->Form->hidden('flujo_id') ?> 
<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>