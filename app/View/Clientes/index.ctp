<div id="topbar-dropmenu">
    <div class="topbar-menu row">

        <div class="col-xs-6 col-sm-3">
            <a href="<?php echo $this->Html->url(array('controller' => 'Clientes', 'action' => 'cliente')); ?>"
               class="metro-tile">
                <span class="metro-icon fa fa-user-plus"></span>
                <p class="metro-title">Nuevo Cliente</p>
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
    <?php
    $role = $this->Session->read('Auth.User.role');
    ?>
    <div class="tray tray-center">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-visible">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <span class="fa fa-users"></span>Clientes
                        </div>
                    </div>
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            <table class="table dataTable tabla-dato table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre Cliente</th>
                                    <th>C.I.</th>
                                    <th>Ciudad</th>
                                    <th>Telefonos</th>
                                    <th>Razon Social</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($clientes as $key => $cli): ?>
                                    <tr>
                                        <td><?= h($cli['Cliente']['id']) ?></td>
                                        <td><?= h($cli['Cliente']['nombre']) ?></td>
                                        <td><?= h($cli['Cliente']['ci']) ?></td>
                                        <td><?= h($cli['Cliente']['ciudad']) ?></td>
                                        <td><?= h($cli['Cliente']['telefono'] . ' - ' . $cli['Cliente']['celular']) ?></td>
                                        <td><?= h($cli['Cliente']['razon_social']) ?></td>
                                        <td class="text-left">
                                            <div class="btn-group text-right">
                                                <button type="button"
                                                        class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false"> Opciones
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <?php if ($role == 'Administrador'): ?>
                                                        <li>
                                                            <?= $this->Form->postLink('Empezar Hoja-Ruta', ['controller' => 'HojasRutas', 'action' => 'hoja_ruta', $cli['Cliente']['id']]) ?>
                                                        </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <a href="javascript:"
                                                           onclick="imprimir_boleta(<?php echo $cli['Cliente']['id'] ?>);">Imprimir</a>
                                                    </li>
                                                    <li>
                                                        <?= $this->Form->postLink('Editar', ['action' => 'cliente', $cli['Cliente']['id']]) ?>
                                                    </li>
                                                    <li>
                                                        <?= $this->Form->postLink('Eliminar', ['action' => 'eliminar', $cli['Cliente']['id']], ['confirm' => __('Esta seguro de eliminar al usuario ' . $cli['Cliente']['nombre'] . ' ??')]) ?>
                                                    </li>
                                                </ul>
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

</section>


<script>
    function imprimir_boleta(id) {
        var printWindow = window.open("<?php echo $this->Html->url(array('controller' => 'Clientes', 'action' => 'registro_print')); ?>/" + id);
        $(printWindow).on('load', function () {
            printWindow.print();
            //printWindow.close();
        });
    }
</script>