
<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-visible">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <span class="glyphicon glyphicon-tasks"></span>Usuarios</div>
                    </div>
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            <table class="table dataTable tabla-dato table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?= __('#') ?></th>
                                        <th><?= __('nombre') ?></th>
                                        <th><?= __('username') ?></th>
                                        <th><?= __('role') ?></th>
                                        <th><?= __('Accion') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios as $key => $user): ?>
                                      <tr>
                                          <td><?= $key + 1 ?></td>
                                          <td><?= h($user['User']['nombre_completo']) ?></td>
                                          <td><?= h($user['User']['username']) ?></td>
                                          <td><?= h($user['User']['role']) ?></td>
                                          <td>
                                              <a href="javascript:" class="btn btn-info" title="Editar" onclick="cargarmodal('<?= $this->Html->url(['action' => 'usuario', $user['User']['id']]) ?>')"><i class="fa fa-edit"></i></a>
                                                  <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $user['User']['id']], ['confirm' => __('Esta seguro de eliminar al usuario '. $user['User']['nombre_completo'].' ??'), 'class' => 'btn btn-danger', 'escape' => false, 'title' => 'Eliminar']) ?>
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

