<script>
    $('body').addClass('sb-r-o');
</script>
<header id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="<?php echo $this->Html->url(array('controller' => 'HojasRutas', 'action' => 'ver_hoja', $flujo_user['HojasRuta']['id'])); ?>" > <span class="text-primary">HR: <?php echo $flujo_user['HojasRuta']['codigo_caso'] ?></span></a>
                -- 
                <a href="javascript:">
                    <?php echo $flujo_user['FlujosUser']['expediente'] ?> <b> <?php echo $flujo_user['Flujo']['nombre'] ?></b>
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
<section id="content" class=" animated fadeIn">
    <div class="tray tray-center">

        <div class="mw1000 center-block">

            <!-- Begin: Admin Form -->
            <div class="admin-form">

                <div class="panel heading-border">
                    <?= $this->Form->create('HojasRutas', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
                    <div class="panel-body bg-light">
                        <div class="section-divider mb40" id="spy1">
                            <span>Datos del Recurso</span>
                        </div>
                        <!-- .section-divider -->

                        <!-- Basic Inputs -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <label class="field select">
                                        <?php echo $this->Form->select('FlujosUser.asesor_id', $usuarios, array('empty' => 'Seleccione el Asesor Legal', 'required')) ?>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="section">
                                    <label for="firstname" class="field prepend-icon">
                                        <?php echo $this->Form->text('FlujosUser.expediente', ['class' => 'gui-input', 'placeholder' => 'Expediente', 'required']); ?>
                                        <label for="email" class="field-icon">
                                            <i class="fa fa-edit"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="section">
                                    <label class="field select">
                                        <?php echo $this->Form->select('FlujosUser.regione_id', $regiones, array('empty' => 'Seleccione la region', 'required')) ?>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="section">
                                    <label for="datepicker1" class="field prepend-icon">
                                        <?php echo $this->Form->text('FlujosUser.fecha_inicio', array('class' => 'form-control', 'placeholder' => 'Fecha Inicio', 'id' => 'ddatepicker1', 'required')); ?>
                                        <label class="field-icon">
                                            <i class="fa fa-calendar-o"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <label class="field select">
                                        <?php echo $this->Form->select('FlujosUser.proceso_id', $procesos, array('empty' => 'Seleccione Proceso Inicial', 'required')) ?>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section">
                                    <label for="firstname" class="field prepend-icon">
                                        <?php echo $this->Form->textarea('FlujosUser.descripcion_2', ['class' => 'gui-textarea', 'placeholder' => 'Descripcion']); ?>
                                        <label for="email" class="field-icon">
                                            <i class="fa fa-edit"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="section">
                                    <label for="firstname" class="field prepend-icon">
                                        <?php echo $this->Form->textarea('FlujosUser.observacion', ['class' => 'gui-textarea', 'placeholder' => 'Observacion']); ?>
                                        <label for="email" class="field-icon">
                                            <i class="fa fa-edit"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <?php if ($flujo['Flujo']['tributos_determinados'] == 1): ?>
                            <div class="section-divider mb40" id="spy1">
                                <span>Tributos Determinados </span>
                            </div>
                            <?php foreach ($tributos as $key => $tri): ?>
                                <?php echo $this->Form->hidden("tributos.$key.id"); ?>
                                <?php echo $this->Form->hidden("tributos.$key.tributo_id", array('value' => $tri['Tributo']['id'])); ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="section">
                                            <div class="option-group field">
                                                <label class="option">
                                                    <?php echo $this->Form->checkbox("tributos.$key.estado"); ?>
                                                    <span class="checkbox"></span><?php echo $tri['Tributo']['nombre']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="field">
                                            <?php echo $this->Form->text("tributos.$key.periodo_fiscal", array('class' => 'gui-input', 'placeholder' => 'Periodo Fiscal')); ?>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="field">
                                            <?php echo $this->Form->text("tributos.$key.deuda_tributaria", array('class' => 'gui-input', 'placeholder' => 'Administracion Tributaria')); ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>


                        <div class="section-divider mb40" id="spy1">
                            <span>Resultados del proceso</span>
                        </div>
                        <?php foreach ($resultados as $key => $re): ?>
                            <div class="section row">
                                <div class="col-md-8">
                                    <div class="section">

                                        <label class="field text-center">
                                            <b><?php echo $re['Resultado']['pregunta']; ?></b>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="section">
                                        <label class="field select">
                                            <?php
                                            $valor = '';
                                            if (!empty($re['FlujosUsersResultado']['id'])) {
                                                echo $this->Form->hidden("Resultados.$key.id", array('value' => $re['FlujosUsersResultado']['id']));
                                                $valor = $re['FlujosUsersResultado']['respuesta'];
                                            }
                                            ?>
                                            <?php echo $this->Form->hidden("Resultados.$key.resultado_id", array('value' => $re['Resultado']['id'])) ?>
                                            <?php echo $this->Form->select("Resultados.$key.respuesta", array('SI' => 'SI', 'NO' => 'NO', 'N/A' => 'N/A'), array('empty' => 'Resultado', 'required', 'value' => $valor)) ?>
                                            <i class="arrow double"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- end .form-body section -->
                    <div class="panel-footer text-right">
                        <button type="submit" class="button btn-primary"> Guardar </button>
                    </div>
                    <!-- end .form-footer section -->
                    <?php echo $this->Form->hidden('FlujosUser.id') ?> 
                    <?php echo $this->Form->hidden('FlujosUser.estado', array('value' => 'Activo')) ?> 
                    <?php echo $this->Form->hidden('FlujosUser.hojas_ruta_id', array('value' => $idHojasRuta)) ?> 
                    <?php echo $this->Form->hidden('FlujosUser.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?> 
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->start('fueracontent'); ?>
<aside id="sidebar_right" class="nano affix">
    <div class="sidebar-right-content nano-content p15">
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
                <ul class="nav tray-nav" data-smoothscroll="-90">
                    <?php foreach ($procesos_2 as $pro): ?>
                        <?php
                        $btncss = '';
                        if ($pro['Proceso']['estado'] == 'Activo') {
                            $btncss = 'primary';
                        } elseif ($pro['Proceso']['estado'] == 'Finalizado') {
                            $btncss = 'success';
                        }
                        ?>
                        <li class="">
                            <a href="<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'ver_proceso', $idFlujosUser, $pro['Proceso']['id'])); ?>">
                                <span class="text-<?php echo $btncss ?> fa fa-circle-o fa-lg"></span> <?php echo $pro['Proceso']['nombre'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
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
