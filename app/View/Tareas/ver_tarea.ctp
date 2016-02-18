<script>
  $('body').addClass('sb-r-o');
</script>

<div id="topbar-dropmenu">
    <div class="topbar-menu row">

        <?php if ($this->Session->read('Auth.User.id') == $tarea['Tarea']['user_id']): ?>
          <div class="col-xs-6 col-sm-3">
              <a  href="javascript:" onclick="cierra_elmenu();
                      cargarmodal('<?php echo $this->Html->url(array('action' => 'tarea_ajax', $tarea['Tarea']['id'])); ?>', true);" class="metro-tile">
                  <span class="metro-icon glyphicon glyphicon-edit"></span>
                  <p class="metro-title">Editar Tarea</p>
              </a>
          </div>
          <div class="col-xs-6 col-sm-3">
              <?php echo $this->Html->link('<span class="metro-icon fa fa-remove"></span> <p class="metro-title"> Eliminar Tarea</p>', array('action' => 'eliminar', $tarea['Tarea']['id']), array('class' => 'metro-tile', 'escape' => false, 'confirm' => 'Esta seguro de eliminar la tarea???')) ?>
          </div>
        <?php endif; ?>
        <div class="col-xs-6 col-sm-3">
            <a  href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                  cargarmodal('<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'adjunto', $tarea['Tarea']['flujos_user_id'], $tarea['Tarea']['proceso_id'], $tarea['Tarea']['id'])); ?>');">
                <span class="metro-icon glyphicon glyphicon-upload"></span>
                <p class="metro-title">Subir Archivo</p>
            </a>
        </div>
        <?php if (empty($estado['TareasEstado']['estado']) || $estado['TareasEstado']['estado'] !== 'Completado'): ?>
          <div class="col-xs-6 col-sm-3">
              <?php echo $this->Html->link('<span class="metro-icon fa fa-check"></span> <p class="metro-title"> Tarea Completa</p>', array('action' => 'completa_tarea', $tarea['Tarea']['id']), array('class' => 'metro-tile', 'escape' => false)) ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($estado['TareasEstado']['estado']) && $estado['TareasEstado']['estado'] === 'Completado'): ?>
          <div class="col-xs-6 col-sm-3">
              <?php echo $this->Html->link('<span class="metro-icon fa fa-repeat"></span> <p class="metro-title"> Reanudar Tarea</p>', array('action' => 'reanudar_tarea', $tarea['Tarea']['id']), array('class' => 'metro-tile', 'escape' => false)) ?>
          </div>
        <?php endif; ?>
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
                <a href="dashboard.html">
                    <?php
                    if (!empty($flujo['FlujosUser']['descripcion'])) {
                      echo $flujo['FlujosUser']['descripcion'];
                    } else {
                      echo 'FLujo Libre';
                    }
                    ?> 
                    - <b>
                        <?php
                        if (!empty($proceso['Proceso']['nombre'])) {
                          echo $proceso['Proceso']['nombre'];
                        } else {
                          echo "Proceso Libre";
                        }
                        ?>
                    </b>
                </a>
            </li>

        </ol>
    </div>

</header>
<section id="content" class="animated fadeIn">
    <div class="">

        <div class="">


            <div class="row">
                <div class="col-md-8">

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <span class="panel-icon"><i class="fa fa-pencil"></i></span>
                            <span class="panel-title"> Tarea</span>
                        </div>	
                        <div class="panel-body">
                            <div class="alert alert-info pastel alert-dismissable">
                                <i class="fa fa-tasks pr10"></i>
                                <strong><?php echo $tarea['User']['nombre_completo'] ?></strong> - en fecha 
                                <?php
                                echo $tarea['Tarea']['created'];
                                if (!empty($tarea['Asignado']['nombre_completo'])) {
                                  echo 'asigno a <strong>' . $tarea['Asignado']['nombre_completo'] . '</strong>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="panel-body bg-light p20">
                            <p class="fs14 lh25">
                                <?php echo $tarea['Tarea']['descripcion'] ?>
                            </p>
                        </div>
                        <div class="panel-body pn br-b-n" style="margin-top: -1px;">
                            <table class="table table-bordered table-striped">
                                <colgroup>
                                    <col class="col-xs-1">
                                    <col class="col-xs-7">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th scope="row">Fecha Inicio:</th>
                                        <td><?php echo $tarea['Tarea']['fecha_inicio'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fecha Fin:</th>
                                        <td><?php echo $tarea['Tarea']['fecha_fin'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Prioridad:</th>
                                        <td><?php echo $tarea['Tarea']['prioridad'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Porcentaje:</th>
                                        <td><?php echo $tarea['Tarea']['porcentaje'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                    $adjuntos = $this->requestAction(array('controller' => 'Adjuntos', 'action' => 'get_adjuntos', $tarea['Tarea']['flujos_user_id'], $tarea['Tarea']['proceso_id'], $tarea['Tarea']['id']));
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
                                              <th>Archivos</th>
                                              <th>Accion</th>
                                          </tr>
                                      <tbody>
                                          <?php foreach ($adjuntos as $ad): ?>
                                            <tr>
                                                <td><?php echo $ad['Adjunto']['created'] ?></td>
                                                <td><?php echo $ad['User']['nombre_completo'] ?></td>
                                                <td><?php echo $ad['Adjunto']['nombre'] ?></td>
                                                <td><?php echo $ad['Adjunto']['nombre_original'] ?></td>
                                                <td>
                                                    <?php echo $this->Html->link('<i class="fa fa-download"></i>', array('controller' => 'Adjuntos', 'action' => 'descargar', $ad['Adjunto']['id']), array('class' => 'btn btn-success', 'title' => 'Descargar archivo', 'escape' => FALSE)) ?>
                                                    <?php if ($this->Session->read('Auth.User.id') == $ad['Adjunto']['user_id']): ?>
                                                      <a href="javascript:" class="btn btn-warning" title="Editar" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'ver_adjunto', $ad['Adjunto']['id'])); ?>');"><i class="fa fa-edit"></i></a>
                                                      <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('controller' => 'Adjuntos', 'action' => 'eliminar', $ad['Adjunto']['id']), array('class' => 'btn btn-danger', 'title' => 'Eliminar tarea', 'escape' => FALSE, 'confirm' => 'Esta seguro de eliminar el archivo adjunto??')) ?>
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
                            <?php echo $this->Form->hidden('flujos_user_id', array('value' => $tarea['Tarea']['flujos_user_id'])) ?>
                            <?php echo $this->Form->hidden('proceso_id', array('value' => $tarea['Tarea']['proceso_id'])) ?>
                            <?php echo $this->Form->hidden('tarea_id', array('value' => $tarea['Tarea']['id'])) ?>
                            <?= $this->Form->end(); ?>


                        </div>
                    </div>
                    <?php
                    $comentarios = $this->requestAction(array('controller' => 'Comentarios', 'action' => 'get_comentarios', $tarea['Tarea']['flujos_user_id'], $tarea['Tarea']['proceso_id'], $tarea['Tarea']['id']));
                    ?>
                    <?php if (!empty($comentarios)): ?>
                      <div class="panel panel-system">
                          <div class="panel-heading">
                              <span class="panel-icon">
                                  <i class="fa fa-comments-o"></i>
                              </span>
                              <span class="panel-title">Comentarios</span>
                          </div>
                          <div class="panel-body">
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
            <div class="row">
                <div class="col-md-12">


                </div>
            </div>
        </div>
    </div>
    <!-- Begin: Content Header -->



</section>
<!-- End: Content -->



<?php $this->start('fueracontent'); ?>
<aside id="sidebar_right" class="nano">

    <?php if (!empty($estados)): ?>
      <?php foreach ($estados as $es): ?>
        <?php
        $icono = '';
        $color = '';
        if ($es['TareasEstado']['estado'] === 'Completado') {
          $icono = 'fa-check-circle';
          $color = 'success';
        } elseif ($es['TareasEstado']['estado'] === 'Reanudado') {
          $icono = 'fa-repeat';
          $color = 'info';
        } elseif ($es['TareasEstado']['estado'] === 'Vencido') {
          $icono = 'fa-exclamation-triangle';
          $color = 'danger';
        }
        ?>
        <blockquote class="blockquote-<?php echo $color; ?>">
            <p><?php echo $es['TareasEstado']['estado']; ?> <span class="label label-<?php echo $color; ?>"><?php echo $es['TareasEstado']['created']; ?></span></p>
        </blockquote>
      <?php endforeach; ?>

    <?php endif; ?>
</ul>

<div data-offset-top="200">
    <div>
        <?php
        $procesos = $this->requestAction(array('controller' => 'Flujos', 'action' => 'get_procesos', $tarea['Tarea']['flujos_user_id']));
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
                  <a href="<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'ver_proceso', $tarea['Tarea']['flujos_user_id'], $pro['Proceso']['id'])); ?>">
                      <span class="fa fa-circle-o fa-lg"></span> <?php echo $pro['Proceso']['nombre'] ?></a>
              </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

</aside>
<?php $this->end(); ?>
<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>