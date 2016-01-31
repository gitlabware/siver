<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <div class="col-xs-12 col-sm-4">
            <a href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                cargarmodal('<?php echo $this->Html->url(array('action' => 'flujo')); ?>');">
                <span class="metro-icon glyphicon glyphicon-plus"></span>
                <p class="metro-title">Nuevo Flujo</p>
            </a>
        </div>
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



<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">

        <div class="panel mb25 mt5">

            <!-- recent orders table -->
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
                                <?php foreach ($flujos as $flu): ?>
                                  <tr>
                                      <td class="text-center" style="font-size: 16px;">
                                          <a href="<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'accion_flujo', $flu['Flujo']['id'])); ?>" class="btn btn-primary btn-block"><?= $flu['Flujo']['nombre'] ?></a>
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