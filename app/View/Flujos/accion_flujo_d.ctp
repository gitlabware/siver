<?php if (!empty($flujos)): ?>
  <div class="panel">
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
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($flujos as $flu): ?>
                        <tr>
                            <td><?php echo $flu['FlujosUser']['descripcion']; ?></td>
                            <td><?php echo $flu['User']['nombre_completo']; ?></td>
                            <td><?php echo $flu['FlujosUser']['created']; ?></td>
                            <td class="text-center" style="font-size: 16px;">
                                <div class="btn-group" style="width: 120px;">

                                    <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Flujos', 'action' => 'enflujo', $flu['FlujosUser']['id']), array('class' => 'btn btn-success', 'escape' => false, 'title' => 'VER FLUJO')); ?>
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