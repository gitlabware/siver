<script>
    $('body').addClass('sb-r-o');
</script>
<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <?php if ($this->Session->read('Auth.User.role') == 'Administrador'): ?>
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
        <?php endif; ?>
        <div class="col-xs-6 col-sm-3">
            <a href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                    cargarmodal('<?php echo $this->Html->url(array('action' => 'iniciar_flujo', $flujo['Flujo']['id'])); ?>', true);">
                <span class="metro-icon glyphicon glyphicon-play"></span>
                <p class="metro-title">Nuevo Caso</p>
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
                <?php
                $p_head = 'class="accordion-toggle accordion-icon link-unstyled collapsed"';
                $p_acor = 'class="panel-collapse collapse" style="height: 0px;"';
                if (empty($flujos_c)) {
                    $p_head = 'class="accordion-toggle accordion-icon link-unstyled" aria-expanded="true"';
                    $p_acor = 'class="panel-collapse collapse in"';
                }
                ?>
                <div class="panel">
                    <div class="panel-heading">
                        <a <?php echo $p_head; ?> data-toggle="collapse" data-parent="#accordion2" href="#acor-procesos">
                            Listado de Procesos
                            <span class="label hidden label-muted label-sm ph15 mt15 mr5 pull-right">189</span>
                        </a>
                    </div>
                    <div id="acor-procesos" <?php echo $p_acor; ?>>
                        <?php if (!empty($procesos)): ?>
                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table dataTable table-bordered" style="width: 100%;" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th></th>
                                                    <th class="text-center" style="font-size: 16px;">Proceso</th>
                                                    <th class="text-center">Orden</th>
                                                    <th class="text-center" style="font-size: 16px;">Requisitos</th>
                                                    <th>Accion </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($procesos as $key => $pro): ?>
                                                    <tr class="blockquote-info">
                                                        <td><?php echo ($key + 1) ?></td>
                                                        <td><?php echo $pro['Proceso']['nombre'] ?></td>
                                                        <td><?php echo $pro['Proceso']['orden'] ?></td>
                                                        <td><?php echo $pro['Proceso']['requisitos'] ?></td>
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

        <?php if (!empty($flujos_c)): ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span class="fa fa-star-o mr5"></span> Listado de Casos
                </div>
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table dataTable tabla-dato table-bordered">
                            <thead>
                                <tr class="bg-light">
                                    <th>Exp.</th>
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>Creado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($flujos_c as $flu): ?>
                                    <tr class="<?php echo $flu['FlujosUser']['estado_color']; ?>">
                                        <td><?php echo $flu['FlujosUser']['expediente']; ?></td>
                                        <td><?php echo $flu['Cliente']['nombre']; ?></td>
                                        <td><?php echo $flu['User']['nombre_completo']; ?></td>
                                        <td><?php echo $flu['FlujosUser']['created']; ?></td>
                                        <td class="text-center" style="font-size: 16px;">
                                            <div class="btn-group" style="width: 120px;">

                                                <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Flujos', 'action' => 'enflujo', $flu['FlujosUser']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER FLUJO')); ?>
                                                <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'iniciar_flujo', $flu['FlujosUser']['flujo_id'], $flu['FlujosUser']['id'])); ?>',true);" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                                                <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('controller' => 'Flujos', 'action' => 'eliminar_e_flujo', $flu['FlujosUser']['id']), array('confirm' => 'Esta seguro de eliminar el flujo??', 'class' => 'btn btn-danger', 'escape' => false, 'title' => 'ELIMINAR')); ?>
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
<?php $this->start('fueracontent'); ?>
<aside id="sidebar_right" class="nano affix">
    <div class="sidebar-right-content nano-content p15">
        <div data-offset-top="200">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center" style="font-size: 16px;">RECURSOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($flujos as $flu): ?>
                                    <tr>
                                        <td class="primary text-center" onclick="window.location = '<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'accion_flujo', $flu['Flujo']['id'])); ?>';" style="font-size: 16px; cursor: pointer;">
                                            <b><?= $flu['Flujo']['nombre'] ?></b>
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

</aside>
<?php $this->end(); ?>