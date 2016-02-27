
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-warning"></i>Tareas Vencidas</span>
</div>
<!-- end .panel-heading section -->

<div class="panel-body p25">
    <?php foreach ($alertas as $al): ?>
      <div class="alert alert-sm alert-border-left alert-danger <?php echo $al['Alerta']['clase']; ?> alert-dismissable">
          <i class="fa fa-info pr10"></i>
          <a href="<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'ver_tarea', 0, 0, $al['Alerta']['tarea_id'])); ?>" class="alert-link"><?php echo $al['Alerta']['mensaje']; ?></a>
      </div>
    <?php endforeach; ?>
</div>
