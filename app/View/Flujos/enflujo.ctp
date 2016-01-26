<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">
        <h2><?php echo $flujo['FlujosUser']['descripcion'] ?> <small> <?php echo $flujo['Flujo']['nombre'] ?></small></h2>
        <div class="panel mb25 mt5">

            <div class="panel">

                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13">

                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center" style="font-size: 16px;">FLUJOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($procesos as $pro): ?>
                                  <?php
                                  $btncss = 'btn-default';
                                  if ($pro['Proceso']['estado'] == 'Activo') {
                                    $btncss = 'btn-primary';
                                  }elseif ($pro['Proceso']['estado'] == 'Finalizado') {
                                    $btncss = 'btn-success';
                                  }
                                  ?>
                                  <tr>
                                      <td class="text-center" style="font-size: 16px;">
                                          <a href="javascript:" onclick="cargarproceso(<?php echo $pro['Proceso']['id'] ?>);" class="btn <?php echo $btncss ?> btn-block"><?php echo $pro['Proceso']['nombre'] ?></a>
                                          <div id="d-proceso-<?php echo $pro['Proceso']['id']; ?>" class="row" style="display: none;">

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
</section>

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