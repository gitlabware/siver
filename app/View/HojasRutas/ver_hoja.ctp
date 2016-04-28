
<script>
    $('body').addClass('sb-r-o');
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
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <?php if (!empty($flujos)): ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <span class="fa fa-star-o mr5"></span> Recursos Creados
                    </div>
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            <table class="table dataTable table-bordered" id="tabla-filtros">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Exp.</th>
                                        <th>Usuario</th>
                                        <th>Creado</th>
                                        <th>Recurso</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($flujos_c as $flu): ?>
                                        <tr class="<?php echo $flu['FlujosUser']['estado_color']; ?>">
                                            <td><?php echo $flu['FlujosUser']['expediente'] ?></td>
                                            <td><?php echo $flu['User']['nombre_completo']; ?></td>
                                            <td><?php echo $flu['FlujosUser']['created']; ?></td>
                                            <td><?php echo $flu['Flujo']['nombre']; ?></td>
                                            <td class="text-center" style="font-size: 16px;">
                                                <div class="btn-group" style="width: 120px;">

                                                    <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Flujos', 'action' => 'enflujo', $flu['FlujosUser']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER FLUJO')); ?>
                                                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Flujos','action' => 'iniciar_flujo', $flu['FlujosUser']['flujo_id'], $flu['FlujosUser']['id'])); ?>', true);" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
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
                                    <th class="text-center" style="font-size: 16px;" colspan="2">RECURSOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($flujos as $flu): ?>
                                    <tr onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'HojasRutas', 'action' => 'iniciar_caso', $hojasRuta['HojasRuta']['id'],$flu['Flujo']['id'])); ?>',true);" style="font-size: 16px; cursor: pointer;">
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
