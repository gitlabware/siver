<?php echo $this->Form->select("$modelo.proceso_id", $procesos, array('empty' => 'En Proceso....', 'id' => 'idproceso-s')) ?>
<i class="arrow double"></i>

<script>
  $('#idproceso-s').change(function () {
      $('#carga_tarea_d').load('<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'ajax_sel_tareas')); ?>/' + $('#idflujo').val() + '/' + $('#idproceso-s').val());
  });

<?php if (!empty($idTarea)): ?>
    $('#carga_tarea_d').load('<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'ajax_sel_tareas')); ?>/' + $('#idflujo').val() + '/<?php echo $idProceso . '/' . $idTarea ?>');
<?php endif; ?>
</script>