<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <!-- dashboard tiles -->
        <div class="row">
            <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile text-center br-a br-grey">
                    <div class="panel-body">
                        <h1 class="fs30 mt5 mbn">1,426</h1>
                        <h6 class="text-system">NEW ORDERS</h6>
                    </div>
                    <div class="panel-footer br-t p12">
                        <span class="fs11">
                            <i class="fa fa-arrow-up pr5"></i> 3% INCREASE
                            <b>1W AGO</b>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile text-center br-a br-grey">
                    <div class="panel-body">
                        <h1 class="fs30 mt5 mbn">63,262</h1>
                        <h6 class="text-success">TOTAL SALES GROSS</h6>
                    </div>
                    <div class="panel-footer br-t p12">
                        <span class="fs11">
                            <i class="fa fa-arrow-up pr5"></i> 2.7% INCREASE
                            <b>1W AGO</b>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile text-center br-a br-grey">
                    <div class="panel-body">
                        <h1 class="fs30 mt5 mbn">248</h1>
                        <h6 class="text-warning">PENDING SHIPMENTS</h6>
                    </div>
                    <div class="panel-footer br-t p12">
                        <span class="fs11">
                            <i class="fa fa-arrow-up pr5 text-success"></i> 1% INCREASE
                            <b>1W AGO</b>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xl-3 visible-xl">
                <div class="panel panel-tile text-center br-a br-grey">
                    <div class="panel-body">
                        <h1 class="fs30 mt5 mbn">6,718</h1>
                        <h6 class="text-danger">UNIQUE VISITS</h6>
                    </div>
                    <div class="panel-footer br-t p12">
                        <span class="fs11">
                            <i class="fa fa-arrow-down pr5 text-danger"></i> 6% DECREASE
                            <b>1W AGO</b>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <style>

        </style>
        <!-- recent activity table -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title hidden-xs"> Tareas Ultimas</span>
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
                                                  <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Tareas', 'action' => 'ver_tarea',0,0, $ta['Tarea']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER TAREA')); ?>
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
                                                  <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Tareas', 'action' => 'ver_tarea',0,0, $ta['Tarea']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER TAREA')); ?>
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

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-dark">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-tasks"></i>
                        </span>
                        <span class="panel-title"> Flujos</span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Creado</th>
                                        <th>Usuario</th>
                                        <th>Flujo</th>
                                        <th>Descripcion</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($flujos as $flujo): ?>
                                    
                                      <tr>
                                          <td><?php echo $flujo['FlujosUser']['created']; ?></td>
                                          <td><?php echo $flujo['User']['nombre_completo']; ?></td>
                                          <td><?php echo $flujo['Flujo']['nombre']; ?></td>
                                          <td><?php echo $flujo['FlujosUser']['descripcion']; ?></td>
                                          <td class="text-center" style="font-size: 16px;">
                                              <div class="btn-group" style="width: 120px;">
                                                  <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Tareas', 'action' => 'ver_tarea',0,0, $ta['Tarea']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER TAREA')); ?>
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

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-system">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-clock-o"></i>
                        </span>
                        <span class="panel-title"> Actividades</span>
                    </div>
                    <div class="panel-body ptn pbn p10">
                        <ol class="timeline-list">
                            <?php foreach ($actividades as $ac): ?>
                              <li class="timeline-item">
                                  <?php echo $ac[0]['icono'] ?>
                                  <div class="timeline-desc">
                                      <?php echo $ac[0]['contenido'] ?>


                                  </div>
                                  <div class="timeline-date"><?php echo $ac[0]['created'] ?></div>
                              </li>
                            <?php endforeach; ?>

                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="panel-icon">
                            <i class="fa fa-comments-o"></i>
                        </span>
                        <span class="panel-title">Comentarios</span>
                    </div>
                    <div class="panel-body pb5">
                        <?php foreach ($comentarios as $com): ?>
                          <h4>
                              <?php echo $com['User']['nombre_completo']; ?> 
                              <div class="widget-menu pull-right mr10">
                                  <div class="text-muted">

                                      <small><?php echo $com['Comentario']['created']; ?></small>
                                  </div>
                              </div>
                          </h4>
                          <p class="text-muted"> 
                              <?php
                              echo '"' . $com['Comentario']['descripcion'] . '"';
                              if (!empty($com['Tarea'])) {
                                echo ' en tarea: <a href="' . $this->Html->url(array('controller' => 'Tareas', 'action' => 'ver_tarea', 0, 0, $com['Tarea']['id'])) . '">' . $com['Tarea']['descripcion'] . '</a>';
                              } elseif (!empty($com['Proceso'])) {
                                echo ' en proceso: <a href="' . $this->Html->url(array('controller' => 'Procesos', 'action' => 'ver_ver_proceso', $com['Proceso']['flujos_user_id'], $com['Proceso']['id'])) . '">' . $com['Tarea']['descripcion'] . '</a>';
                              }
                              ?>

                          </p>
                          <hr class="short br-lighter">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- end: .tray-center -->



</section>
<!-- End: Content -->