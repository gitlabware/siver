<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <div class="col-xs-6 col-sm-3">
            <a onclick="cierra_elmenu();
                cargarmodal('<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'iniciar_flujo', $flujo['FlujosUser']['flujo_id'], $flujo['FlujosUser']['id'])); ?>');"  href="javascript:" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-edit"></span>
                <p class="metro-title">Editar Flujo</p>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
<?php echo $this->Html->link('<span class="metro-icon fa fa-remove"></span> <p class="metro-title">Eliminar este flujo</p>', array('action' => 'eliminar_e_flujo', $flujo['FlujosUser']['id']), array('class' => 'metro-tile', 'escape' => false, 'confirm' => 'Esta seguro de eliminar este flujo???')) ?>
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
        <h2><?php echo $flujo['FlujosUser']['descripcion'] ?> <small> <?php echo $flujo['Flujo']['nombre'] ?></small></h2>
        <!--<div class="panel-group accordion accordion-lg">
            <div class="panel">
                <div class="panel-heading">
                    <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#accord2_1">
                        Will you be providing continuous support and adding new features?
                        <span class="label hidden label-muted label-sm ph15 mt15 mr5 pull-right">189</span>
                    </a>
                </div>
                <div id="accord2_1" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <a class="accordion-toggle accordion-icon link-unstyled collapsed" data-toggle="collapse" data-parent="#accordion2" href="#accord2_2">
                        How did you organize the LESS Structure in this Theme? </a>
                </div>
                <div id="accord2_2" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                </div>
            </div>
            <div class="panel panel-system">
                <div class="panel-heading">
                    <a class="accordion-toggle accordion-icon link-unstyled" data-toggle="collapse" data-parent="#accordion2" href="#accord2_3">
                        How do I create a media object with a responsive image? </a>
                </div>
                <div id="accord2_3" class="panel-collapse collapse in">
                    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</div>
                </div>
            </div>
        </div>-->
        
        <div class="panel mb25 mt5">

            <div class="panel">

                <div class="panel-body pn">
                    <table class="table table-bordered">
                        <tbody>
                            <?php foreach ($procesos as $pro): ?>
                              <?php
                              $btncss = '';
                              if ($pro['Proceso']['estado'] == 'Activo') {
                                $btncss = 'primary';
                              } elseif ($pro['Proceso']['estado'] == 'Finalizado') {
                                $btncss = 'success';
                              }
                              ?>
                              <tr class="<?php echo $btncss ?>" style="cursor: pointer;" onclick="cargarproceso(<?php echo $pro['Proceso']['id'] ?>);">
                                  <td class="text-center" style="font-size: 18px;">
                                      <b><?php echo $pro['Proceso']['nombre'] ?></b>
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