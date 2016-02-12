
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-folder-open"></i>Carpeta</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Adjunto', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('nombre', ['class' => 'gui-input', 'required', 'placeholder' => 'Ingrese el nombre de la carpeta']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
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
<?php echo $this->Form->hidden('parent_id',array('value' => $idCarpeta)); ?>
<?php echo $this->Form->hidden('estado',array('value' => 'Activo')); ?>
<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>