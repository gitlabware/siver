
<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-visible">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <span class="fa fa-copy"></span>Hojas Rutas</div>
                    </div>
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            <table class="table dataTable tabla-dato table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Codigo Caso</th>
                                        <th>Cliente</th>
                                        <th>Representante Legal</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($hojas as $ho): ?>
                                        <tr>
                                            <td><?= h($ho['HojasRuta']['codigo_caso']) ?></td>
                                            <td><?= h($ho['Cliente']['nombre']) ?></td>
                                            <td><?= h($ho['Cliente']['representante_legal']) ?></td>
                                            <td><?= h($ho['HojasRuta']['fecha']) ?></td>
                                            <td class="text-left">
                                                <div class="btn-group text-right">
                                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Opciones
                                                        <span class="caret ml5"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <?= $this->Form->postLink('Ver Hoja', ['action' => 'ver_hoja', $ho['HojasRuta']['id']]) ?>  
                                                        </li>
                                                        <li>
                                                            <?= $this->Form->postLink('Eliminar', ['action' => 'eliminar', $ho['HojasRuta']['id']], ['confirm' => __('Esta seguro de eliminar la huja-ruta ??')]) ?>
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
