<div id="topbar-dropmenu">
    <div class="topbar-menu row">

        <?php if ($this->Session->read('Auth.User.id') == $tarea['Tarea']['user_id']): ?>
          <div class="col-xs-6 col-sm-3">
              <a  href="<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'tarea', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'], $tarea['Tarea']['id'])); ?>" class="metro-tile">
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
                  cargarmodal('<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'adjunto', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'], $tarea['Tarea']['id'])); ?>');">
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
<section id="content" class="animated fadeIn">

    <!-- Begin: Content Header -->
    <p class="lead text-center mv30">

        <?php echo $flujo['FlujosUser']['descripcion']; ?> - <b><?php echo $proceso['Proceso']['nombre'] ?></b>
    </p>

    <div class="row">
        <div class="col-md-8">

            <div class="panel">
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
            $adjuntos = $this->requestAction(array('controller' => 'Adjuntos', 'action' => 'get_adjuntos', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'], $tarea['Tarea']['id']));
            ?>
            <?php if (!empty($adjuntos)): ?>
              <div class="panel">
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
                                      <th>Descripcion</th>
                                      <th>Accion</th>
                                  </tr>
                              <tbody>
                                  <?php foreach ($adjuntos as $ad): ?>
                                    <tr>
                                        <td><?php echo $ad['Adjunto']['created'] ?></td>
                                        <td><?php echo $ad['User']['nombre_completo'] ?></td>
                                        <td><?php echo $ad['Adjunto']['nombre'] ?></td>
                                        <td><?php echo $ad['Adjunto']['descripcion'] ?></td>
                                        <td>
                                            <?php echo $this->Html->link('<i class="fa fa-download"></i>', array('controller' => 'Adjuntos', 'action' => 'descargar', $ad['Adjunto']['id']), array('class' => 'btn btn-success', 'title' => 'Descargar archivo', 'escape' => FALSE)) ?>
                                            <?php if ($this->Session->read('Auth.User.id') == $ad['Adjunto']['user_id']): ?>
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
            <div class="panel">
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
                    <?php echo $this->Form->hidden('tarea_id', array('value' => $tarea['Tarea']['id'])) ?>
                    <?= $this->Form->end(); ?>


                </div>
            </div>
            <?php
            $comentarios = $this->requestAction(array('controller' => 'Comentarios', 'action' => 'get_comentarios', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'], $tarea['Tarea']['id']));
            ?>
            <?php if (!empty($comentarios)): ?>
              <div class="panel">
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
<!-- End: Content -->

<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
]);
?>