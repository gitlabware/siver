<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">
        <h2><?php echo $flujo['Flujo']['nombre'] ?></h2>
        <div class="panel mb25 mt5">

            <div class="panel">
                
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center" style="font-size: 16px;">FLUJOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($procesos as $pro): ?>
                                <?php 
                                //$consulta = $this->requestAction(array('controller' => 'Procesos','action' => ''));
                                ?>
                                  <tr>
                                      <td class="text-center" style="font-size: 16px;">
                                          <a href="<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'accion_flujo', $pro['Proceso']['id'])); ?>" class="btn btn-primary btn-block "><?php echo $pro['Proceso']['nombre'] ?></a>
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