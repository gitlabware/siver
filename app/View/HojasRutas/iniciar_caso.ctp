<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">

<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-square"></i> <?php echo $flujo['Flujo']['nombre'] ?></span>
</div>

<?= $this->Form->create('Flujo', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-12">
            <label class="field select">
                <?php echo $this->Form->select('FlujosUser.asesor_id', $usuarios, array('empty' => 'Seleccione el Asesor Legal', 'required')) ?>
                <i class="arrow double"></i>
            </label>
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
                <?php echo $this->Form->text('FlujosUser.fecha_inicio', array('class' => 'form-control', 'placeholder' => 'Fecha Inicio', 'id' => 'ddatepicker1', 'required')); ?>
                <label class="field-icon">
                    <i class="fa fa-calendar-o"></i>
                </label>
            </label>
        </div>
    </div>

    
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
<?php echo $this->Form->hidden('FlujosUser.estado', array('value' => 'Activo')) ?> 
<?php echo $this->Form->hidden('FlujosUser.hojas_ruta_id', array('value' => $idHojasRuta)) ?> 
<?php echo $this->Form->hidden('FlujosUser.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 

<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>

<?php echo $this->Html->script(array('vendor/plugins/moment/moment.min', 'vendor/plugins/datepicker/js/bootstrap-datetimepicker', 'inicalendario3')) ?>