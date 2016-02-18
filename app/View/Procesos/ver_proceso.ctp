
<script>
  $('body').addClass('sb-r-o');
</script>
<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">


        <div class="col-xs-6 col-sm-3">
            <a  href="<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'tarea', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'])); ?>" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-plus"></span>
                <p class="metro-title">Nuevo Tarea</p>
            </a>
        </div>
        <?php if (!empty(current($estados)) && current($estados)['ProcesosEstado']['estado'] !== 'Finalizado'): ?>
          <div class="col-xs-6 col-sm-3">
              <?php echo $this->Html->link('<span class="metro-icon fa fa-stop"></span> <p class="metro-title">Finalizar Proceso</p>', array('action' => 'finaliza_proceso', $flujo['FlujosUser']['id'], $proceso['Proceso']['id']), array('class' => 'metro-tile', 'escape' => false, 'confirm' => 'Esta seguro de finalizar el Proceso???')) ?>
          </div>
        <?php endif; ?>
        <div class="col-xs-6 col-sm-3">
            <a  href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                  cargarmodal('<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'adjunto', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'], 0)); ?>');">
                <span class="metro-icon glyphicon glyphicon-upload"></span>
                <p class="metro-title">Subir Archivo</p>
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

<header id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="javascript:">
                    <?php echo $proceso['Proceso']['nombre'] ?> <b> <?php echo $flujo['FlujosUser']['descripcion'] ?></b>
                </a>
            </li>

        </ol>
    </div>

</header>

<section id="content" class=" animated fadeIn">

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span class="panel-icon">
                        <i class="fa fa-tasks"></i>
                    </span>
                    <span class="panel-title"> Tareas</span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered theme-info">
                            <thead>
                                <tr>
                                    <th>Creado</th>
                                    <th>Usuario</th>
                                    <th>Contenido</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tareas as $ta): ?>
                                  <tr>
                                      <td><?php echo $ta['Tarea']['created'] ?></td>
                                      <td><?php echo $ta['User']['nombre_completo'] ?></td>
                                      <td>
                                          <?php echo $ta['Tarea']['descripcion'] ?> <b class="text-primary"> Asignado a <?php echo $ta['Asignado']['nombre_completo'] ?></b>
                                      </td>
                                      <td>
                                          <div class="btn-group" style="width: 120px;;">
                                              <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Tareas', 'action' => 'ver_tarea', $idFlujoUser, $idProceso, $ta['Tarea']['id']), array('class' => 'btn btn-info', 'title' => 'Ver tarea', 'escape' => FALSE)) ?>
                                              <?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('controller' => 'Tareas', 'action' => 'tarea', $idFlujoUser, $idProceso, $ta['Tarea']['id']), array('class' => 'btn btn-warning', 'title' => 'Editar tarea', 'escape' => FALSE)) ?>
                                              <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('controller' => 'Tareas', 'action' => 'eliminar', $ta['Tarea']['id']), array('class' => 'btn btn-danger', 'title' => 'Eliminar tarea', 'escape' => FALSE, 'confirm' => 'Esta seguro de eliminar la tarea??')) ?>

                                          </div>
                                      </td>
                                  </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            $adjuntos = $this->requestAction(array('controller' => 'Adjuntos', 'action' => 'get_adjuntos', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'], 0));
            ?>
            <?php if (!empty($adjuntos)): ?>
              <div class="panel panel-dark">
                  <div class="panel-heading">
                      <span class="panel-icon"><i class="fa fa-paperclip"></i></span>
                      <span class="panel-title"> Adjuntos</span>
                  </div>	
                  <div class="panel-body">
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>Creado</th>
                                      <th>Creado Por</th>
                                      <th>Nombre</th>
                                      <th>Accion</th>
                                  </tr>
                              <tbody>
                                  <?php foreach ($adjuntos as $ad): ?>
                                    <tr>
                                        <td><?php echo $ad['Adjunto']['created'] ?></td>
                                        <td><?php echo $ad['User']['nombre_completo'] ?></td>
                                        <td><?php echo $ad['Adjunto']['nombre'] ?></td>
                                        <td>
                                            <?php echo $this->Html->link('<i class="fa fa-download"></i>', array('controller' => 'Adjuntos', 'action' => 'descargar', $ad['Adjunto']['id']), array('class' => 'btn btn-success', 'title' => 'Descargar archivo', 'escape' => FALSE)) ?>
                                            <?php if ($this->Session->read('Auth.User.id') == $ad['Adjunto']['user_id']): ?>
                                              <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('controller' => 'Adjuntos', 'action' => 'eliminar_archivo', $ad['Adjunto']['id']), array('class' => 'btn btn-danger', 'title' => 'Eliminar tarea', 'escape' => FALSE, 'confirm' => 'Esta seguro de eliminar el archivo adjunto??')) ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                  <?php endforeach; ?>
                              </tbody>
                              </thead>
                          </table>

                      </div>
                  </div>
              </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span class="panel-icon"><i class="fa fa-comments"></i></span>
                    <span class="panel-title"> Formulario Comentarios</span>
                </div>	
                <div class="panel-body admin-form theme-primary">
                    <?= $this->Form->create('Comentario', ['class' => 'form-validacion', 'id' => 'f-add', 'action' => 'registra_comentario']); ?>
                    <div class="section" id="spy3">
                        <label for="comment" class="field prepend-icon">
                            <?php echo $this->Form->textarea('descripcion', ['class' => 'gui-textarea', 'required', 'placeholder' => 'Tu comentario']); ?>
                            <label for="comment" class="field-icon">
                                <i class="fa fa-comments"></i>
                            </label>
                        </label>
                    </div>
                    <div class="panel-footer text-right">
                        <button type="submit" class="button btn-primary"> Registrar Comentario </button>
                    </div>
                    <?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 
                    <?php echo $this->Form->hidden('flujos_user_id', array('value' => $flujo['FlujosUser']['id'])) ?>
                    <?php echo $this->Form->hidden('proceso_id', array('value' => $proceso['Proceso']['id'])) ?>
                    <?php echo $this->Form->hidden('tarea_id', array('value' => 0)) ?>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
            <?php
            $comentarios = $this->requestAction(array('controller' => 'Comentarios', 'action' => 'get_comentarios', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'], 0));
            ?>
            <?php if (!empty($comentarios)): ?>
              <div class="panel panel-system">
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
                            <?php if ($this->Session->read('Auth.User.id') == $com['Comentario']['user_id']): ?>
                              <div class="widget-menu pull-right mr10">
                                  <div class="btn-group">

                                      <?php echo $this->Html->link('<span class="glyphicon glyphicon-remove fs11 "></span>', array('controller' => 'Comentarios', 'action' => 'eliminar', $com['Comentario']['id']), array('class' => 'btn btn-xs btn-danger', 'escape' => false, 'confirm' => 'Esta seguro de eliminar el comentario??', 'title' => 'Eliminar Comentario')) ?>

                                  </div>
                              </div>
                            <?php endif; ?>
                        </h4>
                        <p class="text-muted"> <?php echo $com['Comentario']['descripcion']; ?>
                            <br> <?php echo $com['Comentario']['created']; ?>
                        </p>
                        <hr class="short br-lighter">
                      <?php endforeach; ?>
                  </div>
              </div>
            <?php endif; ?>
        </div>
    </div>


</section>
<?php $this->start('fueracontent'); ?>
<aside id="sidebar_right" class="nano">

    <?php if (!empty($estados)): ?>
      <?php foreach ($estados as $es): ?>
        <?php
        $icono = '';
        $color = '';
        if ($es['ProcesosEstado']['estado'] === 'Finalizado') {
          $icono = 'fa-check-circle';
          $color = 'success';
        } elseif ($es['ProcesosEstado']['estado'] === 'Reanudado') {
          $icono = 'fa-repeat';
          $color = 'info';
        } elseif ($es['ProcesosEstado']['estado'] === 'Vencido') {
          $icono = 'fa-exclamation-triangle';
          $color = 'danger';
        } elseif ($es['ProcesosEstado']['estado'] === 'Activo') {
          $icono = 'fa-circle';
          $color = 'primary';
        }
        ?>
        <blockquote class="blockquote-<?php echo $color; ?>">
            <p><?php echo $es['ProcesosEstado']['estado']; ?> <span class="label label-<?php echo $color; ?>"><?php echo $es['ProcesosEstado']['created']; ?></span></p>
        </blockquote>
      <?php endforeach; ?>

    <?php endif; ?>
</ul>

<div data-offset-top="200">
    <div>
        <?php
        $procesos = $this->requestAction(array('controller' => 'Flujos', 'action' => 'get_procesos', $idFlujoUser));
        ?>
        <ul class="nav tray-nav" data-smoothscroll="-90">

            <?php foreach ($procesos as $pro): ?>
              <?php
              $activo = '';
              if ($idProceso == $pro['Proceso']['id']) {
                $activo = 'active';
              }
              ?>

              <li class="<?php echo $activo ?>">
                  <a href="<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'ver_proceso', $idFlujoUser, $pro['Proceso']['id'])); ?>">
                      <span class="fa fa-circle-o fa-lg"></span> <?php echo $pro['Proceso']['nombre'] ?></a>
              </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

</aside>
<?php $this->end(); ?>
<script>
  $('#carga-proc').load('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'verproceso', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'])); ?>', function () {

  });

</script>