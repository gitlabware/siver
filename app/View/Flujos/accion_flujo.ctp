<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">

        <div class="col-xs-6 col-sm-3">
            <a href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                  cargarmodal('<?php echo $this->Html->url(array('action' => 'flujo', $flujo['Flujo']['id'])); ?>');">
                <span class="metro-icon glyphicon glyphicon-edit"></span>
                <p class="metro-title">Editar Flujo</p>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <?php echo $this->Html->link('<span class="metro-icon fa fa-remove"></span> <p class="metro-title">Eliminar Flujo</p>', array('action' => 'eliminar', $flujo['Flujo']['id']), array('class' => 'metro-tile', 'escape' => false, 'confirm' => 'Esta seguro de eliminar el Flujo???')) ?>

        </div>
        <div class="col-xs-6 col-sm-3">
            <a href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                  cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'proceso', $flujo['Flujo']['id'])); ?>');">
                <span class="metro-icon glyphicon glyphicon-plus"></span>
                <p class="metro-title">Nuevo Proceso</p>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <a href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                  cargarmodal('<?php echo $this->Html->url(array('action' => 'iniciar_flujo', $flujo['Flujo']['id'])); ?>');">
                <span class="metro-icon glyphicon glyphicon-play"></span>
                <p class="metro-title">Iniciar Flujo</p>
            </a>
        </div>
    </div>
</div>

<script>
  function cierra_elmenu() {
      $('.metro-modal').fadeOut('fast');
      setTimeout(function () {
          $('#topbar-dropmenu').slideToggle(150).toggleClass('topbar-menu-open');
      }, 250);
  }

</script>
<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">
        <h2><?php echo $flujo['Flujo']['nombre'] ?></h2>
        <div class="panel mb25 mt5 panel-group accordion accordion-lg">

            <?php if ($this->Session->read('Auth.User.id') == $flujo['Flujo']['user_id']): ?>

              <div class="panel">
                  <div class="panel-heading">
                      <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#acor-procesos">
                          Listado de Procesos
                          <span class="label hidden label-muted label-sm ph15 mt15 mr5 pull-right">189</span>
                      </a>
                  </div>
                  <div id="acor-procesos" class="panel-collapse collapse" style="height: 0px;">
                      <?php if (!empty($procesos)): ?>
                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table dataTable table-bordered" style="width: 100%;" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="bg-light">
                                                <th></th>
                                                <th class="text-center" style="font-size: 16px;">Proceso</th>
                                                <th>Accion </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($procesos as $key => $pro): ?>
                                              <tr class="blockquote-info">
                                                  <td><?php echo ($key + 1) ?></td>
                                                  <td><?php echo $pro['Proceso']['nombre'] ?></td>
                                                  <td>
                                                      <div class="btn-group" style="width: 120px;;">
                                                          <button type="button" class="btn btn-warning" title="Editar Proceso" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'proceso', $flujo['Flujo']['id'], $pro['Proceso']['id'])); ?>');">
                                                              <i class="fa fa-edit"></i>
                                                          </button>
                                                          <button type="button" class="btn btn-success" title="Condiciones Necesarias" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'condiciones', $flujo['Flujo']['id'], $pro['Proceso']['id'])) ?>');">
                                                              <i class="fa fa-ban"></i>
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
                      <?php endif; ?>
                  </div>
              </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($flujos)): ?>
          <div class="panel panel-success">
              <div class="panel-heading">
                  <span class="fa fa-star-o mr5"></span> Flujos Creados
              </div>
              <div class="panel-body pn">
                  <div class="table-responsive">
                      <table class="table dataTable tabla-dato table-bordered">
                          <thead>
                              <tr class="bg-light">
                                  <th>Descripcion</th>
                                  <th>Usuario</th>
                                  <th>Creado</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($flujos as $flu): ?>
                                <tr>
                                    <td><?php echo $flu['FlujosUser']['descripcion']; ?></td>
                                    <td><?php echo $flu['User']['nombre_completo']; ?></td>
                                    <td><?php echo $flu['FlujosUser']['created']; ?></td>
                                    <td class="text-center" style="font-size: 16px;">
                                        <div class="btn-group" style="width: 120px;">

                                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Flujos', 'action' => 'enflujo', $flu['FlujosUser']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER FLUJO')); ?>
                                        </div>
                                    </td>
                                </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        <?php endif; ?>
    </div>
</section>