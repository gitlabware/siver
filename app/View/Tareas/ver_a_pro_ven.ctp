
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-warning"></i>Procesos a Vencer</span>
</div>
<!-- end .panel-heading section -->

<div class="panel-body p25">
    <?php foreach ($alertas as $al): ?>
      <div class="alert alert-sm alert-border-left alert-warning <?php echo $al['Alerta']['clase']; ?> alert-dismissable">
          <i class="fa fa-info pr10"></i>
          <a href="<?php echo $this->Html->url(array('controller' => 'Procesos','action' => 'ver_proceso',$al['Alerta']['flujos_user_id'],$al['Alerta']['proceso_id'])); ?>" class="alert-link"><?php echo $al['Alerta']['mensaje']; ?></a>
      </div>
    <?php endforeach; ?>
</div>
