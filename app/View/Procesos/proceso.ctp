
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-tasks"></i>Proceso</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Proceso', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25 theme-primary">
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
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('tiempo', ['class' => 'gui-input', 'type' => 'number', 'min' => 0, 'placeholder' => 'Dias de Vencimiento']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-bookmark-o"></i>
                </label>
            </label>
        </div>
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('tiempo_alertas', ['class' => 'gui-input', 'type' => 'number', 'min' => 0, 'placeholder' => 'Alerta dias antes']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-bookmark-o"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-6">
            <div class="option-group field">
                <label class="option">
                    <?php echo $this->Form->checkbox('auto_inicio'); ?>
                    <span class="checkbox"></span>Iniciar automatic.</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="option-group field">
                <label class="option">
                    <?php echo $this->Form->checkbox('auto_fin'); ?>
                    <span class="checkbox"></span>Finalizar automatic.</label>
            </div>
        </div>
    </div>
    <?php
    if (empty($this->request->data['Proceso']['id'])) {
      $checked = 'Dias habiles y feriados';
    } else {
      $checked = $this->request->data['Proceso']['tipo_dias'];
    }
    ?>
    <div class="section">
        
        <div class="option-group field">
            <label class="option">
                <?php
                echo $this->Form->radio('Proceso.tipo_dias', array('Dias habiles y feriados' => 'Dias habiles y feriados &nbsp;&nbsp;', 'Todos los dias' => 'Todos los dias &nbsp;&nbsp;'), array(
                  'separator' => '<span class="radio"></span></label><label class="option">',
                  'label' => false,
                  'legend' => false,
                  'value' => $checked
                ));
                ?>
                <span class="radio"></span>
            </label>
        </div>
        <!-- end .option-group section -->
    </div>
</div>
<!-- end .form-body section -->

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
    <?php if (!empty($this->request->data['Proceso']['id'])): ?>
      <?php echo $this->Html->link('Eliminar', array('action' => 'eliminar', $this->request->data['Proceso']['id']), array('class' => 'button btn-danger', 'confirm' => 'Esta seguro de eliminar el proceso??')) ?>
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