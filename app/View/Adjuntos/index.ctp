<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/fancytree/skin-win8/ui.fancytree.min.css">
<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <div class="col-xs-6 col-sm-3">
            <a onclick="cierra_elmenu();
                  cargarmodal('<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'carpeta', $idCarpeta)); ?>');"  href="javascript:" class="metro-tile">
                <span class="metro-icon fa fa-folder"></span>
                <p class="metro-title">Nueva Carpeta</p>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <a  href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                  cargarmodal('<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'adjunto2', $idCarpeta)); ?>');">
                <span class="metro-icon glyphicon glyphicon-upload"></span>
                <p class="metro-title">Subir Archivo</p>
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
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li class="drago" data-id="">
                <a href="<?php echo $this->Html->url(array('action' => 'index')) ?>">Archivos</a>
            </li>
            <?php foreach ($direcciones as $dir): ?>
              <?php if ($dir['Adjunto']['id'] == $idCarpeta): ?>
                <li class="active">
                    <a href="<?php echo $this->Html->url(array('action' => 'index', $dir['Adjunto']['id'])) ?>"><?php echo $dir['Adjunto']['nombre_original'] ?></a>
                </li>
              <?php else: ?>
                <li class="drago" data-id="<?php echo $dir['Adjunto']['id'] ?>">
                    <a href="<?php echo $this->Html->url(array('action' => 'index', $dir['Adjunto']['id'])) ?>"><?php echo $dir['Adjunto']['nombre_original'] ?></a>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>

        </ul>
    </div>
</header>
<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">

        <div class="mh15 pv15 br-b br-light">
            <div class="row">
                <div class="col-xs-7">
                    <div class="mix-controls ib">
                        <form class="controls" id="select-filters">
                            <!-- We can add an unlimited number of "filter groups" using the following format: -->
                            <div class="btn-group ib mr10">
                                <button type="button" class="btn btn-default hidden-xs">
                                    <span class="fa fa-folder"></span>
                                </button>
                                <div class="btn-group">
                                    <fieldset>
                                        <select id="filter1">
                                            <option value="">Todo</option>
                                            <option value=".scarpetas">Solo Carpetas</option>
                                            <option value=".car-mio">Mis Carpetas</option>
                                            <option value=".car-Mi-mio">Mis Carpetas no visibles</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="btn-group ib mr10">
                                <button type="button" class="btn btn-default hidden-xs">
                                    <span class="fa fa-tag"></span>
                                </button>
                                <div class="btn-group">
                                    <fieldset>
                                        <select id="filter2">
                                            <option value="">Todos los tipos</option>
                                            <?php foreach ($extensiones as $ex): ?>
                                              <option value=".ext-<?php echo $ex['Adjunto']['extension'] ?>"><?php echo $ex['Adjunto']['extension'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-xs-5 text-right">
                    <button type="button" id="mix-reset" class="btn btn-default mr5">Limpiar Filtros</button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default to-grid">
                            <span class="fa fa-th"></span>
                        </button>
                        <button type="button" class="btn btn-default to-list">
                            <span class="fa fa-navicon"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mix-controls hidden">
                <form class="controls admin-form" id="checkbox-filters">
                    <!-- We can add an unlimited number of "filter groups" using the following format: -->

                    <fieldset class="">
                        <h4>Cars</h4>

                        <label class="option block mt10">
                            <input type="checkbox" value=".circle">
                            <span class="checkbox"></span>Circle
                        </label>

                    </fieldset>

                    <button id="mix-reset2">Clear All</button>
                </form>

            </div>
        </div>

        <div id="mix-container">

            <div class="fail-message">
                <span>No items were found matching the selected filters</span>
            </div>

            <?php foreach ($carpetas as $ca): ?>
              <div class="mix label1 scarpetas <?php echo 'car-' . $ca['Adjunto']['filtro'] ?> <?php echo 'car-' . $ca['Adjunto']['visible'] . '-' . $ca['Adjunto']['filtro'] ?> drope drago" data-id="<?php echo $ca['Adjunto']['id'] ?>">
                  <div class="panel p6 pbn">
                      <div class="of-h">
                          <img onclick="//alert($(this).attr('class'));
                                if (!$(this).hasClass('noclick')) {
                                    window.location = '<?php echo $this->Html->url(array('action' => 'index', $ca['Adjunto']['id'])); ?>';
                                } else {
                                    $(this).removeClass('noclick');
                                }" src="<?php echo $this->request->webroot; ?>img/iconos/FolderFilled.ico" class="img-responsive" title="<?php echo $ca['Adjunto']['nombre'] ?>">
                          <div class="row table-layout">
                              <div class="col-xs-8 va-m pln">
                                  <h6><?php echo $ca['Adjunto']['nombre'] ?></h6>
                              </div>
                              <div class="col-xs-4 text-right va-m prn">
                                  <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'ver_carpeta', $ca['Adjunto']['id'])) ?>');"><span class="fa fa-eye fs12 text-info"></span></a>

                                  <span class="fa fa-circle fs10 text-alert ml10"></span>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
            <?php endforeach; ?>
            <?php foreach ($archivos as $ar): ?>
              <div class="mix label1 folder1 drope ext-<?php echo $ar['Adjunto']['extension'] ?>" data-id="<?php echo $ar['Adjunto']['id'] ?>">
                  <div class="panel p6 pbn">
                      <div class="of-h">
                          <img onclick="
                                if (!$(this).hasClass('noclick')) {
                                    window.location = '<?php echo $this->Html->url(array('action' => 'descargar', $ar['Adjunto']['id'])); ?>';
                                } else {
                                    $(this).removeClass('noclick');
                                }
                               " src="<?php echo $this->request->webroot; ?>img/iconos/download.jpg" class="img-responsive" title="<?php echo $ar['Adjunto']['nombre'] ?>">
                          <div class="row table-layout">
                              <div class="col-xs-8 va-m pln">
                                  <h6><?php echo $ar['Adjunto']['nombre_original'] ?></h6>
                              </div>
                              <div class="col-xs-4 text-right va-m prn">
                                  <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'ver_adjunto', $ar['Adjunto']['id'])) ?>');"><span class="fa fa-eye fs12 text-info"></span></a>
                                  <span class="fa fa-circle fs10 text-alert ml10"></span>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
            <?php endforeach; ?>

            <div class="gap"></div>
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="gap"></div>

        </div>

    </div>

    <aside class="tray tray-right tray320">


    </aside>
</section>


<?php $this->start('bbuscador'); ?>
<?php echo $this->Form->create('Adjunto', array('class' => 'navbar-form navbar-left navbar-search', 'role' => 'search')); ?>
<div class="form-group">
    <?php echo $this->Form->text('dato',array('class' => 'form-control','placeholder' => 'Buscar Archivo.....'));?>
</div>
<?php echo $this->Form->end(); ?>

<?php $this->end(); ?>
<?php
echo $this->Html->script(array(
  'vendor/plugins/mixitup/jquery.mixitup.min',
  'vendor/plugins/holder/holder.min',
  'vendor/plugins/fileupload/fileupload',
  'iniadjuntos'
  ), array('block' => 'scriptjs'));
?>

<script>
  $(function () {
      $(".drope").draggable({
          stack: ".drago",
          revert: "invalid",
          start: function (event, ui) {

              $(this).find('img').addClass('noclick');
          },
          stop: function () {
              //$(this).find('img').removeClass('noclick');
          }
      });

      $(".drago").droppable({
          drop: function (event, ui) {
              window.location = '<?php echo $this->Html->url(array('action' => 'mover')); ?>/' + $(ui.draggable).attr('data-id') + '/' + $(this).attr('data-id');
          }
      });
  });
</script>
