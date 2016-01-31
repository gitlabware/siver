
<div class="panel">
    <div class="panel-menu p12 admin-form theme-primary">
        <div class="row">
            <div class="col-md-4">
                        <a class="btn btn-warning btn-block" href="<?php echo $this->Html->url(array('action' => 'ver_proceso', $idFlujoUser, $idProceso)); ?>"><i class="fa fa-eye"></i> VER</a>
                    </div>
            <div class="col-md-4">
                <a class="btn btn-success btn-block" href="<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'tarea', $idFlujoUser, $idProceso)); ?>"><i class="fa fa-plus"></i> NUEVO TAREA</a>
            </div>
            <div class="col-md-4">
                <?php echo $this->Html->link('<i class="fa fa-stop"></i> FINALIZAR PROCESO', array('action' => 'finaliza_proceso', $idFlujoUser, $idProceso), array('class' => 'btn btn-danger btn-block', 'escape' => false, 'confirm' => 'Esta seguro de finalizar el Proceso???')) ?>
            </div>
        </div>
    </div>
    
</div>

