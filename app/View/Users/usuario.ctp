
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-user"></i>Usuario</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('User', ['class' => 'form-validacion', 'id' => 'f-add', 'action' => 'guardarusuario']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('nombre_completo', ['class' => 'gui-input', 'placeholder' => 'Nombre completo', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-user"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-12">
            <label class="field select">
                <?php echo $this->Form->select('role', array('Usuario' => 'Usuario', 'Administrador' => 'Administrador'), array('empty' => 'Asignar a...')) ?>
                <i class="arrow double"></i>
            </label>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('username', ['class' => 'gui-input', 'placeholder' => 'Usuario', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-user"></i>
                </label>
            </label>
        </div>
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->password('password2', ['class' => 'gui-input', 'placeholder' => 'Contraseña', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-lock"></i>
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
<?php echo $this->Form->hidden('id') ?>
<?php //echo $this->Form->hidden('role', array('value' => 'Usuario')) ?> 
<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>