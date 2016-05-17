
<script>
    $('body').addClass('sb-r-o');
</script>
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <div class="col-xs-6 col-sm-3">
            <a  href="<?php echo $this->Html->url(array('action' => 'hoja_ruta', $hojasRuta['HojasRuta']['cliente_id'], $hojasRuta['HojasRuta']['id'])); ?>" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-edit"></span>
                <p class="metro-title">Editar Hoja-Ruta</p>
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
                    Hoja Ruta
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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span class="panel-icon">
                        <i class="fa fa-table"></i>
                    </span>
                    <span class="panel-title"> Informacion de Hoja-Ruta</span>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td class="text-primary"><b>CODIGO DEL CASO: </b></td>
                            <td><?php echo $hojasRuta['HojasRuta']['codigo_caso']; ?></td>
                            <td class="text-primary"><b>FECHA: </b></td>
                            <td><?php echo $hojasRuta['HojasRuta']['fecha']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-primary"><b>Cliente: </b></td>
                            <td><?php echo $hojasRuta['Cliente']['nombre']; ?></td>
                            <td class="text-primary"><b>Representante Legal: </b></td>
                            <td><?php echo $hojasRuta['Cliente']['representante_legal']; ?></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center text-primary">REQUISITOS</h4>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <tr class=" text-center" style="font-weight: bold;">
                            <td>#</td>
                            <td>Requisitos</td>
                            <td></td>
                            <td>Fojas</td>
                            <td>Adm. Tributaria</td>
                            <td>Num</td>
                            <td>Fecha</td>
                        </tr>
                        <?php foreach ($hojas_requisitos as $key => $hr): ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $hr['HojasRequisito']['requisito'] ?></td>
                                <td><?php echo $hr['HojasRequisito']['o_s_l'] ?></td>
                                <td><?php echo $hr['HojasRequisito']['fojas'] ?></td>
                                <td><?php echo $hr['HojasRequisito']['administracion_tributaria'] ?></td>
                                <td><?php echo $hr['HojasRequisito']['numero'] ?></td>
                                <td><?php echo $hr['HojasRequisito']['fecha'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <?php if (!empty($flujos)): ?>
                <?php foreach ($flujos_c as $flu): ?>
                    <?php
                    $procesos = $this->requestAction(array('action' => 'get_procesos', $flu['Flujo']['id'], $flu['FlujosUser']['id']));
                    $resultados = $this->requestAction(array('action' => 'get_resultados', $flu['FlujosUser']['id']));
                    $tributos = $this->requestAction(array('action' => 'get_tributos', $flu['FlujosUser']['id']));
                    ?>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <span class="fa fa-star-o mr5"></span> <?php echo $flu['Flujo']['nombre']; ?>

                            <div class="widget-menu pull-right mr10">
                                <div class="btn-group">

                                    <?php //echo $this->Html->link('<span class="glyphicon glyphicon-remove fs11 "></span>', array('controller' => 'Comentarios', 'action' => 'eliminar'), array('class' => 'btn btn-xs btn-danger', 'escape' => false, 'confirm' => 'Esta seguro de eliminar el comentario??', 'title' => 'Eliminar Comentario')) ?>
                                    <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Flujos', 'action' => 'enflujo', $flu['FlujosUser']['id']), array('class' => 'btn btn-xs btn-info', 'escape' => false, 'title' => 'VER RECURSO')); ?>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'HojasRutas', 'action' => 'caso', $hojasRuta['HojasRuta']['id'], $flu['FlujosUser']['flujo_id'], $flu['FlujosUser']['id'])); ?>" class="btn btn-xs btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                                    <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('controller' => 'Flujos', 'action' => 'eliminar_e_flujo', $flu['FlujosUser']['id']), array('confirm' => 'Esta seguro de eliminar el flujo??', 'class' => 'btn btn-xs btn-danger', 'escape' => false, 'title' => 'ELIMINAR')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body pn">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-success"><b>Expediente: </b></td>
                                    <td><?php echo$flu['FlujosUser']['expediente']; ?></td>
                                    <td class="text-success"><b>Asesor: </b></td>
                                    <td><?php echo$flu['Asesor']['nombre_completo']; ?></td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-success text-center"><b>Descripcion</b></td>
                                    <td class="text-success text-center"><b>Observacion</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo$flu['FlujosUser']['expediente']; ?></td>
                                    <td><?php echo$flu['Asesor']['nombre_completo']; ?></td>
                                </tr>
                            </table>

                            <?php if (!empty($tributos)): ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-center text-success"><b>Tributos Determinados</b></td>
                                        <td class="text-center text-success"><b></b></td>
                                        <td class="text-center text-success"><b>Periodo Fiscal</b></td>
                                        <td class="text-center text-success"><b>Deuda Tributaria y/o Sancion</b></td>
                                    </tr>
                                    <?php foreach ($tributos as $key => $tri): ?>

                                        <tr>
                                            <td><?php echo $tri['Tributo']['nombre']; ?></td>
                                            <td><?php echo $tri['FlujosUsersTributo']['estado']; ?></td>
                                            <td><?php echo $tri['FlujosUsersTributo']['periodo_fiscal']; ?></td>
                                            <td><?php echo $tri['FlujosUsersTributo']['deuda_tributaria']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center text-success">PROCESOS</h4>
                                </div>
                            </div>
                            <table class="table table-bordered">

                                <tr>
                                    <td class="text-center text-success">#</td>
                                    <td class="text-center text-success"><b>Proceso</b></td>
                                    <td class="text-center text-success"><b>Fecha inicio</b></td>
                                    <td class="text-center text-success"><b>Fecha Fin</b></td>
                                </tr>
                                <?php foreach ($procesos as $key => $pro): ?>

                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $pro['Proceso']['nombre']; ?></td>
                                        <td><?php echo $pro['Proceso']['fecha_inicio']; ?></td>
                                        <td><?php echo $pro['Proceso']['fecha_fin']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center text-success">RESULTADOS</h4>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <?php foreach ($resultados as $re): ?>
                                    <tr>
                                        <td><b><?php echo $re['Resultado']['pregunta'] ?></b></td>
                                        <td><?php echo $re['FlujosUsersResultado']['respuesta'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>
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
                                    <th class="text-center" style="font-size: 16px;" colspan="2">RECURSOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($flujos as $flu): ?>
                                    <tr onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'HojasRutas', 'action' => 'iniciar_caso', $hojasRuta['HojasRuta']['id'], $flu['Flujo']['id'])); ?>', true);" style="font-size: 16px; cursor: pointer;">
                                        <td class="success text-center">
                                            <b><?= $flu['Flujo']['nombre'] ?></b>
                                        </td>
                                        <td class="success text-center">
                                            <i class="fa fa-plus"></i>
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
