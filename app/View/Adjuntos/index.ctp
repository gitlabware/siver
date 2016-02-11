<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/fancytree/skin-win8/ui.fancytree.min.css">
<!-- Start: Topbar-Dropdown -->
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <div class="col-xs-6 col-sm-3">
            <a onclick="cierra_elmenu();
                  cargarmodal('<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'carpeta')); ?>');"  href="javascript:" class="metro-tile">
                <span class="metro-icon fa fa-folder"></span>
                <p class="metro-title">Nueva Carpeta</p>
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
                                            <option value="">All Folders</option>
                                            <option value=".folder1">Publicity</option>
                                            <option value=".folder2">Spain Vacation</option>
                                            <option value=".folder3">Sony Demo</option>
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
                                            <option value="">All Labels</option>
                                            <option value=".label1">Work</option>
                                            <option value=".label3">Clients</option>
                                            <option value=".label2">Family</option>
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-xs-5 text-right">
                    <button type="button" id="mix-reset" class="btn btn-default mr5">Clear Filters</button>
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
        <?php echo $this->Form->create('Adjunto', array('id' => 'form-direccion')); ?>
        <?php echo $this->Form->hidden('direccion_a', array('value' => $direccion)); ?>
        <?php echo $this->Form->hidden('direccion', array('id' => 'tdireccion')); ?>
        <?php echo $this->Form->end(); ?>
        <?php echo $this->Form->create('Adjunto', array('id' => 'form-direccion-d', 'action' => 'descargar2')); ?>
        <?php echo $this->Form->hidden('direccion_a', array('value' => $direccion)); ?>
        <?php echo $this->Form->hidden('direccion', array('id' => 'ddireccion')); ?>
        <?php echo $this->Form->end(); ?>
        <div id="mix-container">

            <div class="fail-message">
                <span>No items were found matching the selected filters</span>
            </div>
            <?php if (!empty($direccion)): ?>
              <div class="mix label1 folder1">
                  <div class="panel p6 pbn">
                      <div class="of-h">
                          <img onclick="enviar_d('..');" src="<?php echo $this->request->webroot; ?>img/iconos/FolderFilled.ico" class="img-responsive" title="Subir">
                          <div class="row table-layout">
                              <div class="col-xs-8 va-m pln">
                                  <h6>.....</h6>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
            <?php endif; ?>
            <?php foreach ($files[0] as $fi): ?>
              <div class="mix label1 folder1">
                  <div class="panel p6 pbn">
                      <div class="of-h">
                          <img onclick="enviar_d('<?php echo $fi ?>');" src="<?php echo $this->request->webroot; ?>img/iconos/FolderFilled.ico" class="img-responsive" title="<?php echo $fi ?>">
                          <div class="row table-layout">
                              <div class="col-xs-8 va-m pln">
                                  <h6><?php echo $fi ?></h6>
                              </div>
                              <div class="col-xs-4 text-right va-m prn">
                                  <a href="javascript:"><span class="fa fa-eye fs12 text-muted"></span></a>

                                  <span class="fa fa-circle fs10 text-alert ml10"></span>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
            <?php endforeach; ?>
            <?php foreach ($files[1] as $fi): ?>
              <div class="mix label1 folder1">
                  <div class="panel p6 pbn">
                      <div class="of-h">
                          <img onclick="descargar_d('<?php echo $fi ?>');" src="<?php echo $this->request->webroot; ?>img/iconos/download.jpg" class="img-responsive" title="<?php echo $fi ?>">
                          <div class="row table-layout">
                              <div class="col-xs-8 va-m pln">
                                  <h6><?php echo $fi ?></h6>
                              </div>
                              <div class="col-xs-4 text-right va-m prn">
                                  <a href="javascript:" onclick="cargarmodal2('<?php echo $fi ?>');"><span class="fa fa-eye fs12 text-info"></span></a>
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
        <?php echo $this->Form->create('Adjunto', array('id' => 'form-tree', 'action' => 'arbol')); ?>
        <?php echo $this->Form->hidden('direccion', array('value' => $direccion)); ?>
        <?php echo $this->Form->hidden('puntero', array('value' => 1)); ?>
        <?php echo $this->Form->end(); ?>
        <div class="panel mt30">
            <div class="panel-heading">
                <span class="panel-title"> Treeview with Icons</span>
            </div>
            <div class="panel-body">
                <div id="tree2">
                    <ul id="treeData">
                        <?php foreach ($files2[0] as $key => $fi): ?>

                          <?php if (!empty($array_f[1]) && $fi === $array_f[1]): ?>
                            <li id="<?php echo 'f-' . $key; ?>" class="folder expanded"><?php echo $fi; ?> </li>

                            <script>
                              var postData = $('#form-tree').serializeArray();
                              var formURL = '<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'arbol')); ?>';
                              $.ajax(
                                      {
                                          url: formURL,
                                          type: "POST",
                                          data: postData,
                                          /*beforeSend:function (XMLHttpRequest) {
                                           alert("antes de enviar");
                                           },
                                           complete:function (XMLHttpRequest, textStatus) {
                                           alert('despues de enviar');
                                           },*/
                                          success: function (data, textStatus, jqXHR)
                                          {
                                              //data: return data from server
                                              $("#<?php echo 'f-' . $key; ?>").html(data);
                                          },
                                          error: function (jqXHR, textStatus, errorThrown)
                                          {
                                              //if fails   
                                              alert("error");
                                          }
                                      });
                            </script>
                          <?php else: ?>
                            <li id="<?php echo 'f-' . $key; ?>" class="folder"><?php echo $fi; ?>  
                              <?php endif; ?>
                          </li>
                        <?php endforeach; ?>
                        <?php foreach ($files2[1] as $key => $fi): ?>
                          <li id="<?php echo 'a-' . $key; ?>"><?php echo $fi; ?> </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</section>




<?php
echo $this->Html->script(array(
  'vendor/plugins/mixitup/jquery.mixitup.min',
  'vendor/plugins/holder/holder.min',
  'vendor/plugins/fileupload/fileupload',
  'vendor/plugins/fancytree/jquery.fancytree-all.min',
  'iniadjuntos'
  ), array('block' => 'scriptjs'));
?>


<script>
  function enviar_d(dir) {
      $('#tdireccion').val(dir);
      $('#form-direccion').submit();
  }
  function descargar_d(dir) {
      $('#ddireccion').val(dir);
      $('#form-direccion-d').submit();
  }
  var formURL_E = '<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'ver_adjunto')) ?>';
  var direccion_e = '<?php echo $direccion ?>';


</script>