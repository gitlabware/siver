
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-file"></i>Archivo</span>
</div>
<!-- end .panel-heading section -->

<?php echo $this->Form->create('Adjunto', array('class' => 'form-validacion', 'id' => 'f-add')); ?>

<div class="panel-body p25">
    <div class="section row pocu">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('nombre', ['class' => 'gui-input', 'required', 'placeholder' => 'Nombre']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-pencil"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row pocu">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('nombre_original', ['class' => 'gui-input', 'required', 'placeholder' => 'Nombre del archivo']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-pencil"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row pocu">
        <label class="field select">
            <?php echo $this->Form->select('visible', array('Todos' => 'Todos', 'Mi' => 'Mi'), array('empty' => 'Visible para...', 'required', 'value' => 'Todos')) ?>
            <i class="arrow double"></i>
        </label>
    </div>
    <div class="section row pocu">
        <label class="field select">
            <?php echo $this->Form->select('flujos_user_id', $flujos, array('empty' => 'En Flujo....', 'id' => 'idflujo')) ?>
            <i class="arrow double"></i>
        </label>
    </div>
    <div class="section row pocu">
        <label class="field select" id="carga_proceso_d">
            <?php
            $disabled_p = 'disabled';
            if (!empty($procesos)) {
              $disabled_p = '';
            }
            ?>
            <?php echo $this->Form->select('proceso_id', $procesos, array('empty' => 'En Proceso....', $disabled_p)) ?>
            <i class="arrow double"></i>
        </label>
    </div>
    <div class="section row pocu" id="carga_tarea_d">

    </div>
    <div class="section row">
        <div class="col-md-12" id="div_carga_archivo" style="display: none;">
            <div class="progress"> 
                <div id="cargaarchivo" class="progress-bar progress-bar-info" role=progressbar aria-valuenow=20 aria-valuemin=0 aria-valuemax=100 style=width:0%>0%</div> 
            </div> 
        </div>
    </div>
</div>
<!-- end .form-body section -->
<?php if ($this->Session->read('Auth.User.id') == $adjunto['Adjunto']['user_id']):?>
<div class="panel-footer">
    <?php echo $this->Html->link('Eliminar', array('action' => 'eliminar_archivo', $idAdjunto), array('class' => 'button btn-danger', 'confirm' => 'Esta seguro de eliminar el archivo??')); ?>
    <button type="submit" class="button btn-primary">Registrar</button>
</div>
<?php endif;?>
<?= $this->Form->end(); ?>
<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>
<script>

  $('#idflujo').change(function () {
      $('#carga_proceso_d').load('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'ajax_sel_procesos')); ?>/' + $('#idflujo').val());
  });
<?php if (!empty($this->request->data['Adjunto']['flujos_user_id'])): ?>
$('#carga_proceso_d').load('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'ajax_sel_procesos',$this->request->data['Adjunto']['flujos_user_id'],'Adjunto',$this->request->data['Adjunto']['proceso_id'])); ?>' );
<?php endif; ?>

</script>