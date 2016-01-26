<div class="panel">
    <div class="panel-menu p12 admin-form theme-primary">
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-warning btn-block" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => '')); ?>');"><i class="fa fa-edit"></i> EDITAR FLUJO</button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-success btn-block" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'nueva_tarea')); ?>');"><i class="fa fa-plus"></i> NUEVO TAREA</button>
            </div>
            <div class="col-md-4">
                <?php echo $this->Html->link('<i class="fa fa-stop"></i> FINALIZAR PROCESO', array('action' => 'finaliza_proceso',$idFlujoUser,$idProceso), array('class' => 'btn btn-danger btn-block', 'escape' => false, 'confirm' => 'Esta seguro de finalizar el Proceso???')) ?>
            </div>
        </div>
    </div>
</div>