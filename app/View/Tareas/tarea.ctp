<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

    <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <!-- Begin: Content Header -->
        <div class="content-header">
            <h2> Tarea "<?php echo $flujo['FlujosUser']['descripcion']; ?>"</h2>
        </div>

        <!-- Validation Example -->
        <div class="admin-form theme-primary mw1000 center-block" style="padding-bottom: 175px;">

            <div class="panel heading-border panel-primary">
                <?php echo $this->Form->create('Tarea'); ?>
                <form method="post" action="/" id="admin-form">

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
                                        <?php echo $this->Form->text('Tarea.fecha_inicio', array('class' => 'gui-input', 'placeholder' => 'Fecha Inicio', 'id' => 'datepicker1')); ?>
                                        <label class="field-icon">
                                            <i class="fa fa-calendar-o"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="section">
                                    <label for="datepicker1" class="field prepend-icon">
                                        <?php echo $this->Form->text('Tarea.fecha_fin', array('class' => 'gui-input', 'placeholder' => 'Fecha Fin', 'id' => 'datepicker2')); ?>
                                        <label class="field-icon">
                                            <i class="fa fa-calendar-o"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="section">
                                    <label class="field select">
                                        <?php echo $this->Form->select('Tarea.asignado_id', array('Urgente' => 'Urgente', 'Alta' => 'Alta', 'Normal' => 'Normal', 'Baja' => 'Baja'), array('empty' => 'Seleccione Prioridad')) ?>
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
                    <?php echo $this->Form->end(); ?>
            </div>

        </div>
        <!-- end: .admin-form -->

    </div>
    <!-- end: .tray-center -->

</section>
<?php echo $this->Html->script(array('jquery-ui-datepicker.min', 'inicalendario2'), array('block' => 'scriptjs')) ?>