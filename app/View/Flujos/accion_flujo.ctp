<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">
        <h2><?php echo $flujo['Flujo']['nombre'] ?></h2>
        <div class="panel mb25 mt5">

            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-menu p12 admin-form theme-primary">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-warning btn-block" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'flujo', $flujo['Flujo']['id'])); ?>');"><i class="fa fa-edit"></i> EDITAR FLUJO</button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-danger btn-block" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'flujo')); ?>');"><i class="fa fa-remove"></i> ELIMINAR FLUJO</button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-success btn-block" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'proceso', $flujo['Flujo']['id'])); ?>');"><i class="fa fa-plus"></i> NUEVO PROCESO</button>
                        </div>
                    </div>

                </div>

                <div class="panel-body pn">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table dataTable tabla-dato table-bordered" style="width: 100%;" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="bg-light">
                                        <th></th>
                                        <th class="text-center" style="font-size: 16px;">Proceso</th>
                                        <th>Accion </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($procesos as $key => $pro): ?>
                                      <tr>
                                          <td><?php echo ($key + 1) ?></td>
                                          <td class="btn-group" style="width: 200px;"><?php echo $pro['Proceso']['nombre'] ?></td>
                                          <td>
                                              <div class="btn-group" style="width: 200px;">
                                                  <button type="button" class="btn btn-primary light">
                                                      <i class="fa fa-envelope"></i>
                                                  </button>
                                                  <button type="button" class="btn btn-primary">
                                                      <i class="fa fa-home"></i>
                                                  </button>
                                                  <button type="button" class="btn btn-primary dark">
                                                      <i class="fa fa-coffee"></i>
                                                  </button>
                                              </div>
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
    </div>
</section>