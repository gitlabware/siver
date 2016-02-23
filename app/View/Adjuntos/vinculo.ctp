
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-chain"></i>Vincular con Archivo</span>
</div>
<!-- end .panel-heading section -->

<div class="panel-menu">
    <input id="fooFilter" type="text" class="form-control" placeholder="Busque el archivo aqui...">
</div>
<div class="panel-body p25">

    <table class="table footable" data-filter="#fooFilter" data-page-navigation=".pagination" data-page-size="6">
        <thead>
            <tr>
                <th>Creado</th>
                <th>Nombre Original</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adjuntos as $ad):?>
            <tr>
                <td><?php echo $ad['Adjunto']['created']?></td>
                <td><?php echo $ad['Adjunto']['nombre_original']?></td>
                <td>
                  <?php echo $this->Html->link('<i class="fa fa-chain"></i>', array('controller' => 'Adjuntos', 'action' => 'vincular',$ad['Adjunto']['id'], $idFlujosUser,$idProceso,$idTarea), array('class' => 'btn btn-primary', 'escape' => false, 'title' => 'VINCULAR AQUI')); ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot class="footer-menu">
            <tr>
                <td colspan="5">
                    <nav class="text-right">
                        <ul class="pagination hide-if-no-paging"></ul>
                    </nav>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<!-- FooTable Plugin -->
<script src="<?php echo $this->request->webroot; ?>js/vendor/plugins/footable/js/footable.all.min.js"></script>
<!-- FooTable Addon -->
<script src="<?php echo $this->request->webroot; ?>js/vendor/plugins/footable/js/footable.filter.min.js"></script>

<script>
  $('.footable').footable();
</script>