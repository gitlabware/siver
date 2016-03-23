<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title hidden-xs"> Listado Tareas</span>
                <ul class="nav panel-tabs panel-tabs-merge panel-tabs-border">
                    <li class="active">
                        <a href="#tareas" data-toggle="tab"> Tareas</a>
                    </li>
                    <li>
                        <a href="#mistareas" class="hidden-xs" data-toggle="tab"> Mis Tareas</a>
                    </li>
                </ul>
            </div>
            <div class="panel-body pn">
                <div class="tab-content pn br-n">
                    <div id="tareas" class="tab-pane active">
                        <div class="table-responsive">
                            <table class="table admin-form theme-warning table-bordered tc-checkbox-1 fs13">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Creado</th>
                                        <th>Usuario</th>
                                        <th>Asignado</th>
                                        <th>Descripcion</th>
                                        <th>Fechas</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tareas as $ta): ?>
                                      <?php
                                      $estilo = '';
                                      $color = '';
                                      if ($ta['Tarea']['estado'] === 'Completado') {
                                        $estilo = 'text-decoration:line-through;';
                                        $color = 'success';
                                      } elseif ($ta['Tarea']['estado'] === 'Reanudado') {
                                        $estilo = '';
                                        $color = 'info';
                                      } elseif ($ta['Tarea']['estado'] === 'Vencido') {
                                        $estilo = '';
                                        $color = 'danger';
                                      }
                                      ?>
                                      <tr style="<?php echo $estilo; ?>" class="<?php echo $color; ?>">
                                          <td><?php echo $ta['Tarea']['created'] ?></td>
                                          <td><?php echo $ta['User']['nombre_completo'] ?></td>
                                          <td><?php echo $ta['Asignado']['nombre_completo'] ?></td>
                                          <td><?php echo $ta['Tarea']['descripcion'] ?></td>
                                          <td>
                                              <?php
                                              echo $ta['Tarea']['fecha_inicio'];
                                              if (!empty($ta['Tarea']['fecha_fin'])) {
                                                echo ' a ' . $ta['Tarea']['fecha_fin'];
                                              }
                                              ?>
                                          </td>
                                          <td class="text-center" style="font-size: 16px;">
                                              <div class="btn-group" style="width: 120px;">
                                                  <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Tareas', 'action' => 'ver_tarea', 0, 0, $ta['Tarea']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER TAREA')); ?>
                                                  <?php if ($this->Session->read('Auth.User.id') == $ta['Tarea']['user_id']): ?>

                                                    <a  href="javascript:" onclick="cierra_elmenu();
                                                              cargarmodal('<?php echo $this->Html->url(array('action' => 'tarea_ajax', $ta['Tarea']['id'])); ?>', true);" class="btn btn-warning" title="Editar tarea">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('action' => 'eliminar', $ta['Tarea']['id']), array('class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'Esta seguro de eliminar la tarea???', 'title' => 'eliminar tarea')) ?>

                                                  <?php endif; ?>
                                              </div>
                                          </td>
                                      </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="mistareas" class="tab-pane">
                        <div class="table-responsive">
                            <table class="table admin-form theme-warning table-bordered tc-checkbox-1 fs13">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Creado</th>
                                        <th>Usuario</th>
                                        <th>Descripcion</th>
                                        <th>Fechas</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mis_tareas as $ta): ?>
                                      <?php
                                      $estilo = '';
                                      $color = '';
                                      if ($ta['Tarea']['estado'] === 'Completado') {
                                        $estilo = 'text-decoration:line-through;';
                                        $color = 'success';
                                      } elseif ($ta['Tarea']['estado'] === 'Reanudado') {
                                        $estilo = '';
                                        $color = 'info';
                                      } elseif ($ta['Tarea']['estado'] === 'Vencido') {
                                        $estilo = '';
                                        $color = 'danger';
                                      }
                                      ?>
                                      <tr style="<?php echo $estilo; ?>" class="<?php echo $color; ?>">
                                          <td><?php echo $ta['Tarea']['created'] ?></td>
                                          <td><?php echo $ta['User']['nombre_completo'] ?></td>
                                          <td><?php echo $ta['Tarea']['descripcion'] ?></td>
                                          <td>
                                              <?php
                                              echo $ta['Tarea']['fecha_inicio'];
                                              if (!empty($ta['Tarea']['fecha_fin'])) {
                                                echo ' a ' . $ta['Tarea']['fecha_fin'];
                                              }
                                              ?>
                                          </td>
                                          <td class="text-center" style="font-size: 16px;">
                                              <div class="btn-group" style="width: 120px;">
                                                  <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Tareas', 'action' => 'ver_tarea', 0, 0, $ta['Tarea']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER TAREA')); ?>
                                                  <?php if ($this->Session->read('Auth.User.id') == $ta['Tarea']['user_id']): ?>

                                                    <a  href="javascript:" onclick="cierra_elmenu();
                                                              cargarmodal('<?php echo $this->Html->url(array('action' => 'tarea_ajax', $ta['Tarea']['id'])); ?>', true);" class="btn btn-warning" title="Editar tarea">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('action' => 'eliminar', $ta['Tarea']['id']), array('class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'Esta seguro de eliminar la tarea???', 'title' => 'eliminar tarea')) ?>

                                                  <?php endif; ?>
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


