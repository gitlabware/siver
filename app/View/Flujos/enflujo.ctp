<script>
    $('body').addClass('sb-r-o');
</script>
<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <div class="col-xs-6 col-sm-3">
            <a onclick="cierra_elmenu();
                    cargarmodal('<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'iniciar_flujo', $flujo['FlujosUser']['flujo_id'], $flujo['FlujosUser']['id'])); ?>', true);"  href="javascript:" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-edit"></span>
                <p class="metro-title">Editar Flujo</p>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <?php echo $this->Html->link('<span class="metro-icon fa fa-remove"></span> <p class="metro-title">Eliminar este flujo</p>', array('action' => 'eliminar_e_flujo', $flujo['FlujosUser']['id']), array('class' => 'metro-tile', 'escape' => false, 'confirm' => 'Esta seguro de eliminar este flujo???')) ?>
        </div>
        <div class="col-xs-6 col-sm-3">
            <a onclick="cierra_elmenu();
                    cargarmodal('<?php echo $this->Html->url(array('controller' => 'Documentos', 'action' => 'documentos', $flujo['FlujosUser']['id'])); ?>', true);"  href="javascript:" class="metro-tile">
                <span class="metro-icon fa fa-folder-open-o"></span>
                <p class="metro-title">Documentos</p>
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
                <a href="<?php echo $this->Html->url(array('controller' => 'HojasRutas','action' => 'ver_hoja',$flujo['HojasRuta']['id']));?>" > <span class="text-primary">HR: <?php echo $flujo['HojasRuta']['codigo_caso']?></span></a>
                 -- 
                <a href="javascript:">
                    <?php echo $flujo['FlujosUser']['expediente'] ?> <b> <?php echo $flujo['Flujo']['nombre'] ?></b>
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
        <?php
        $documentos = $this->requestAction(array('controller' => 'Documentos', 'action' => 'get_documentos', $idFlujoUser))
        ?>
        <?php if (!empty($documentos)): ?>
            <div class="panel mb25 mt5 panel-group accordion accordion-lg">

                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#acor-documentos">
                            LISTADO DE DOCUMENTOS
                            <span class="label hidden label-muted label-sm ph15 mt15 mr5 pull-right">189</span>
                        </a>
                    </div>

                    <div id="acor-documentos" class="panel-collapse collapse" style="height: 0px;">

                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table dataTable table-bordered" style="width: 100%;" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Documento</th>
                                                <th class="text-center">Tipo</th>
                                                <th class="text-center">Hojas</th>
                                                <th class="text-center">Adjunto</th>
                                                <th class="text-center">

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($documentos as $key => $do): ?>
                                                <tr class="blockquote-info">
                                                    <td><?php echo $do['Documento']['created'] ?></td>
                                                    <td><?php echo $do['Documento']['tipo'] ?></td>
                                                    <td><?php echo $do['Documento']['original_a'] ?></td>
                                                    <td><?php echo $do['Documento']['hojas'] ?></td>
                                                    <td><?php echo $do['Adjunto']['nombre_original'] ?></td>
                                                    <td>
                                                        <div class="btn-group" style="width: 120px;;">
                                                            <button type="button" class="btn btn-warning" title="Editar Documento" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Documentos', 'action' => 'documento', $do['Documento']['id'])); ?>');">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('controller' => 'Documentos', 'action' => 'eliminar', $do['Documento']['id']), array('class' => 'btn btn-danger', 'escape' => FALSE, 'title' => 'Eliminar Documento', 'confirm' => 'Esta seguro de eliminar el documento??')) ?>
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
            </div>
        <?php endif; ?>
        <div class="panel mb25 mt5">
            <div class="panel panel-system">
                <div class="panel-heading">
                    <span class="panel-icon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <span class="panel-title"> Actividades</span>
                </div>
                <div class="panel-body ptn pbn p10">
                    <ol class="timeline-list">
                        <?php if (!empty($actividades)): ?>
                            <?php foreach ($actividades as $ac): ?>
                                <li class="timeline-item">
                                    <?php echo $ac[0]['icono'] ?>
                                    <div class="timeline-desc">
                                        <?php echo $ac[0]['contenido'] ?>
                                    </div>
                                    <div class="timeline-date"><?php echo $ac[0]['created'] ?></div>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ol>
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
                    <?php foreach ($procesos as $pro): ?>
                        <?php
                        $btncss = '';
                        if ($pro['Proceso']['estado'] == 'Activo') {
                            $btncss = 'primary';
                        } elseif ($pro['Proceso']['estado'] == 'Finalizado') {
                            $btncss = 'success';
                        }
                        ?>
                        <li class="">
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

<script>
    function cargarproceso(idProceso) {
        var display = $('#d-proceso-' + idProceso).css('display');
        //alert(display);
        if (display === 'none') {
            $('#d-proceso-' + idProceso).load('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'verproceso', $flujo['FlujosUser']['id'])); ?>/' + idProceso, function () {
                $('#d-proceso-' + idProceso).show(400);
            });
            //alert('show');
        } else if (display === 'block') {
            $('#d-proceso-' + idProceso).hide(400);
            //alert('hide');
        }

        //$('#d-proceso-' + idProceso).toggle(400);
        /**/
    }
</script>
<?php $this->start('scriptjs'); ?>
<?php if ($sw_documentos): ?>
    <script>
        cargarmodal('<?php echo $this->Html->url(array('controller' => 'Documentos', 'action' => 'documentos', $flujo['FlujosUser']['id'])); ?>', true);
    </script>
<?php endif; ?>


<?php $this->end(); ?>
