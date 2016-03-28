<script>
    $('body').addClass('sb-r-o');
</script>
<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <?php if ($this->Session->read('Auth.User.role') == 'Administrador'): ?>
            <div class="col-xs-12 col-sm-4">
                <a href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                            cargarmodal('<?php echo $this->Html->url(array('action' => 'flujo')); ?>');">
                    <span class="metro-icon glyphicon glyphicon-plus"></span>
                    <p class="metro-title">Nuevo Flujo</p>
                </a>
            </div>
        <?php endif; ?>
        <!--
        <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-user"></span>
                <p class="metro-title">Users</p>
            </a>
        </div>
        <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-headphones"></span>
                <p class="metro-title">Support</p>
            </a>
        </div>
        <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
                <span class="metro-icon fa fa-gears"></span>
                <p class="metro-title">Settings</p>
            </a>
        </div>
        <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-facetime-video"></span>
                <p class="metro-title">Videos</p>
            </a>
        </div>
        <div class="col-xs-4 col-sm-2">
            <a href="#" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-picture"></span>
                <p class="metro-title">Pictures</p>
            </a>
        </div>
        -->
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
                    Flujos
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

    <div class="tray tray-center">

        <div class="panel mb25 mt5">

            <!-- recent orders table -->
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
                                        <th>Flujo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($flujos_c as $flu): ?>
                                        <tr class="<?php echo $flu['FlujosUser']['estado_color']; ?>">
                                            <td><?php echo $flu['FlujosUser']['descripcion']; ?></td>
                                            <td><?php echo $flu['User']['nombre_completo']; ?></td>
                                            <td><?php echo $flu['FlujosUser']['created']; ?></td>
                                            <td><?php echo $flu['Flujo']['nombre']; ?></td>
                                            <td class="text-center" style="font-size: 16px;">
                                                <div class="btn-group" style="width: 120px;">
                                                    
                                                    <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Flujos', 'action' => 'enflujo', $flu['FlujosUser']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER FLUJO')); ?>
                                                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'iniciar_flujo', $flu['FlujosUser']['flujo_id'], $flu['FlujosUser']['id'])); ?>');" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
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
                                    <th class="text-center" style="font-size: 16px;">FLUJOS</th>
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