<script>
  $('body').addClass('sb-r-o');
</script>
<!-- Begin: Content -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
<header id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'enflujo', $flujo['FlujosUser']['id'])); ?>">
                    Tarea "<?php echo $flujo['FlujosUser']['descripcion']; ?>"
                </a>
            </li>
        </ol>
    </div>
    <div class="topbar-right hidden-lg">
        <div class="ml15 ib va-m" id="toggle_sidemenu_r">
            <a href="#" class="pl5">
                <i class="fa fa-sign-in fs22 text-primary"></i>
            </a>
        </div>
    </div>
</header>
<section id="content" class="table-layout animated fadeIn">

    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <!-- Begin: Content Header -->
        <div class="content-header hidden-lg hidden-md">
            <h2> Tarea "<?php echo $flujo['FlujosUser']['descripcion']; ?>"</h2>
        </div>
        <!-- Validation Example -->
        <div class="admin-form theme-primary mw1000 center-block" style="padding-bottom: 175px;">
            <div class="panel heading-border panel-primary">
                <?php echo $this->Form->create('Tarea'); ?>
                <div class="panel-body bg-light">
                    <div class="section-divider mt20 mb40">
                        <span> Para el proceso "<?php echo $proceso['Proceso']['nombre'] ?>" </span>
                    </div>
                    <!-- .section-divider -->
                    <div class="section row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field select">
                                    <?php echo $this->Form->select('Tarea.asignado_id', $usuarios, array('empty' => 'Asignar a...')) ?>

                                    <i class="arrow double"></i>
                                </label>
                            </div>
                            <div class="section">
                                <label for="datepicker1" class="field prepend-icon">
                                    <?php echo $this->Form->text('Tarea.fechainicio', array('class' => 'form-control', 'placeholder' => 'Fecha Inicio', 'id' => 'ddatepicker1')); ?>
                                    <label class="field-icon">
                                        <i class="fa fa-calendar-o"></i>
                                    </label>
                                </label>
                            </div>
                            <div class="section">
                                <label for="datepicker1" class="field prepend-icon">
                                    <?php echo $this->Form->text('Tarea.fechafin', array('class' => 'form-control', 'placeholder' => 'Fecha Fin', 'id' => 'ddatepicker2')); ?>
                                    <label class="field-icon">
                                        <i class="fa fa-calendar-o"></i>
                                    </label>
                                </label>
                            </div>
                            <div class="section">
                                <label class="field select">
                                    <?php echo $this->Form->select('Tarea.prioridad', array('Urgente' => 'Urgente', 'Alta' => 'Alta', 'Normal' => 'Normal', 'Baja' => 'Baja'), array('empty' => 'Seleccione Prioridad', 'required')) ?>
                                    <i class="arrow double"></i>
                                </label>
                            </div>
                        </div>
                        <!-- end section -->
                        <div class="col-md-6">
                            <div class="section" id="spy3">
                                <label for="comment" class="field prepend-icon">
                                    <?php echo $this->Form->textarea('Tarea.descripcion', array('class' => 'gui-textarea', 'placeholder' => 'Descripcion')) ?>
                                    <label for="comment" class="field-icon">
                                        <i class="fa fa-comments"></i>
                                    </label>
                                    <span class="input-footer">
                                        <strong>Nota:</strong> Use este campo para describir la tarea
                                    </span>
                                </label>
                            </div>
                            <div class="section">
                                <label for="useremail" class="field prepend-icon">
                                    <?php echo $this->Form->text('Tarea.porcentaje', array('class' => 'gui-input', 'placeholder' => 'Porcentaje de la tarea')); ?>
                                    <label for="useremail" class="field-icon">
                                        <i class="fa fa-neuter"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <!-- end section -->
                    </div>
                </div>
                <!-- end .form-body section -->
                <div class="panel-footer text-right">
                    <button type="submit" class="button btn-primary"> Registrar Tarea </button>
                    <button type="reset" class="button"> Cancelar </button>
                </div>
                <!-- end .form-footer section -->
                <?php echo $this->Form->hidden('Tarea.proceso_id', array('value' => $proceso['Proceso']['id'])) ?>
                <?php echo $this->Form->hidden('Tarea.flujos_user_id', array('value' => $flujo['FlujosUser']['id'])) ?>
                <?php echo $this->Form->hidden('Tarea.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?>
                <?php echo $this->Form->hidden('Tarea.id'); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <!-- end: .admin-form -->
    </div>
    <!-- end: .tray-center -->

</section>

<?php $this->start('fueracontent'); ?>

<aside id="sidebar_right" class="nano affix">
    <div class="sidebar-right-content nano-content p15">
        <?php
        $estados = $this->requestAction(array('controller' => 'Procesos', 'action' => 'get_estados', $idFlujoUser, $idProceso));
        ?>
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
                      $btncss = '';
                      if ($pro['Proceso']['estado'] == 'Activo') {
                        $btncss = 'primary';
                      } elseif ($pro['Proceso']['estado'] == 'Finalizado') {
                        $btncss = 'success';
                      }
                      ?>

                      <li class="<?php echo $activo ?>">
                          <a href="<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'ver_proceso', $idFlujoUser, $pro['Proceso']['id'])); ?>">
                              <span class="text-<?php echo $btncss ?> fa fa-circle-o fa-lg"></span> <?php echo $pro['Proceso']['nombre'] ?></a>
                      </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>


</aside>


<?php $this->end(); ?>




<?php echo $this->Html->script(array('vendor/plugins/moment/moment.min', 'vendor/plugins/datepicker/js/bootstrap-datetimepicker', 'inicalendario2'), array('block' => 'scriptjs')) ?>