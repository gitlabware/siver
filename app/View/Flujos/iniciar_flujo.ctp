<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">

<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-square"></i>Flujo</span>
</div>

<?= $this->Form->create('Flujo', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <!--<div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
    <?php //echo $this->Form->text('FlujosUser.descripcion', ['class' => 'gui-input', 'required', 'placeholder' => 'Nombre']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
    </div>-->
    <div class="section row" id="cliente-select">
        <div class="col-md-11">
            <label class="field select">
                <?php echo $this->Form->select('FlujosUser.cliente_id', $clientes, array('empty' => 'Seleccione el Cliente', 'required', 'id' => 'idsel-cli')) ?>
                <i class="arrow double"></i>
            </label>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-success" title="Nuevo Cliente" onclick="
                    $('#cliente-select').hide(400);
                    $('#idsel-cli').attr('required', false).val('');
                    $('#cliente-text').show(400);
                    $('#idtext-cli').attr('required', true);">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="section row" id="cliente-text" style="display: none;">
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('Cliente.nombre', ['class' => 'gui-input', 'placeholder' => 'Nombre del Cliente', 'id' => 'idtext-cli']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-user"></i>
                </label>
            </label>
        </div>
        <div class="col-md-5">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('Cliente.ci_nit', ['class' => 'gui-input', 'placeholder' => 'C.I./NIT']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-credit-card"></i>
                </label>
            </label>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-success" title="Seleccionar Cliente" onclick="
                    $('#cliente-select').show(400);
                    $('#idsel-cli').attr('required', true);
                    $('#cliente-text').hide(400);
                    $('#idtext-cli').attr('required', false).val('');">
                <i class="fa fa-hand-o-left"></i>
            </button>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-4">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('FlujosUser.expediente', ['class' => 'gui-input', 'placeholder' => 'Expediente', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
        <div class="col-md-4">
            <label class="field select">
                <?php echo $this->Form->select('FlujosUser.regione_id', $regiones, array('empty' => 'Seleccione la region', 'required')) ?>
                <i class="arrow double"></i>
            </label>
        </div>
        <div class="col-md-4">
            <label for="datepicker1" class="field prepend-icon">
                <?php echo $this->Form->text('FlujosUser.fecha_inicio', array('class' => 'form-control', 'placeholder' => 'Fecha Inicio', 'id' => 'ddatepicker1','required')); ?>
                <label class="field-icon">
                    <i class="fa fa-calendar-o"></i>
                </label>
            </label>
        </div>
    </div>

    <?php if (!empty($this->request->data['FlujosUser']['id'])): ?>
        <div class="section row">
            <div class="col-md-12">
                <label class="field select">
                    <?php echo $this->Form->select('FlujosUser.estado', array('Activo' => 'Activo', 'Finalizado' => 'Finalizado'), array('empty' => 'Seleccione Estado', 'required')) ?>
                    <i class="arrow double"></i>
                </label>
            </div>
        </div>
    <?php else: ?>

        <?php echo $this->Form->hidden('FlujosUser.estado', array('value' => 'Activo')) ?> 
    <?php endif; ?>

    <div class="section row">
        <div class="col-md-12">
            <label class="field select">
                <?php echo $this->Form->select('FlujosUser.proceso_id', $procesos, array('empty' => 'Seleccione Proceso Inicial', 'required')) ?>
                <i class="arrow double"></i>
            </label>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->textarea('FlujosUser.descripcion_2', ['class' => 'gui-textarea', 'placeholder' => 'Descripcion']); ?>
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
<?php echo $this->Form->hidden('FlujosUser.id') ?> 
<?php echo $this->Form->hidden('FlujosUser.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 

<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>

<?php echo $this->Html->script(array('vendor/plugins/moment/moment.min', 'vendor/plugins/datepicker/js/bootstrap-datetimepicker', 'inicalendario3')) ?>