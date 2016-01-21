<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">

        <div class="panel mb25 mt5">

            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-menu p12 admin-form theme-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success btn-block" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'flujo')); ?>');"><i class="fa fa-plus"></i> NUEVO FLUJO</button>
                        </div>
                    </div>

                </div>

                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center" style="font-size: 16px;">FLUJOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($flujos as $flu): ?>
                                  <tr>
                                      <td class="text-center" style="font-size: 16px;">
                                          <a href="<?php echo $this->Html->url(array('controller' => 'Flujos','action' => 'accion_flujo',$flu['Flujo']['id'])); ?>" class="btn btn-primary btn-block"><?= $flu['Flujo']['nombre'] ?></a>
                                      </td>
                                  </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>