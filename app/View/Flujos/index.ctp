<script>
    //$('body').addClass('sb-r-o');
</script>
<!-- Start: Topbar-Dropdown -->
<style>
    .sorted_table tr {
    //cursor: pointer;
    }
    /* line 96, /Users/jonasvonandrian/jquery-sortable/source/css/application.css.sass */
    .sorted_table tr.placeholder {
        display: block;
        background: #2a74d6;
        position: relative;
        margin: 0;
        padding: 0;
        border: none; }
    /* line 103, /Users/jonasvonandrian/jquery-sortable/source/css/application.css.sass */
    .sorted_table tr.placeholder:before {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        border: 10px solid transparent;
        border-left-color: #2a74d6;
        margin-top: -5px;
        left: -5px;
        border-right: none; }
</style>
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <?php if ($this->Session->read('Auth.User.role') == 'Administrador'): ?>
            <div class="col-xs-12 col-sm-4">
                <a href="javascript:" class="metro-tile" onclick="cierra_elmenu();
                    cargarmodal('<?php echo $this->Html->url(array('action' => 'flujo')); ?>');">
                    <span class="metro-icon glyphicon glyphicon-plus"></span>
                    <p class="metro-title">Nuevo Recurso</p>
                </a>
            </div>
        <?php endif; ?>
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
<header id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="javascript:">
                    Recursos
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


<section id="content" class="table-layout animated fadeIn">

    <div class="tray tray-center">

        <div class="panel mb25 mt5">

            <!-- recent orders table -->
            <?php if (!empty($flujos)): ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <span class="fa fa-star-o mr5"></span> Lista de Recursos
                    </div>
                    <div class="panel-body pn">
                        <div class="table-responsive">
                            <table class="table dataTable table-bordered sorted_table" style="width: 100%;" cellspacing="0" width="100%">
                                <thead>
                                <tr class="bg-light">
                                    <th></th>
                                    <th class="text-center">Recurso</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Hoja R.</th>
                                    <th class="text-center">Trib. Det</th>
                                    <th>Accion </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($flujos as $key => $flujo): ?>
                                    <tr class="blockquote-info" id="item-<?= $key + 1 ?>" data-id="<?php echo $flujo['Flujo']['id'] ?>">
                                        <td><?php echo ($key + 1) ?></td>
                                        <td><?php echo $flujo['Flujo']['nombre'] ?></td>
                                        <td><?php echo $flujo['Flujo']['categoria'] ?></td>
                                        <td>
                                            <?php
                                            if($flujo['Flujo']['hoja_ruta'] == 1){
                                                echo "SI";
                                            }else{
                                                echo "NO";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($flujo['Flujo']['tributos_determinados'] == 1){
                                                echo "SI";
                                            }else{
                                                echo "NO";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'Flujos','action' => 'accion_flujo', $flujo['Flujo']['id']), array('class' => 'btn btn-success btn-xs','escape' => false)) ?>

                                                <button type="button" class="btn btn-warning btn-xs" title="Editar Recurso" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'flujo', $flujo['Flujo']['id'])); ?>');">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary pmover btn-xs" title="Mover">
                                                    <i class="glyphicon glyphicon-move"></i>
                                                </button>
                                                <?php echo $this->Html->link('<i class="fa fa-remove"></i>', array('controller' => 'Flujos','action' => 'eliminar', $flujo['Flujo']['id']), array('class' => 'btn btn-danger btn-xs', 'confirm' => 'Esta seguro de eliminar el Recurso??','escape' => false)) ?>

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
<!--<aside id="sidebar_right" class="nano affix">
    <div class="sidebar-right-content nano-content p15">
        <div data-offset-top="200">
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                            <thead>
                            <tr class="bg-light">
                                <th class="text-center" style="font-size: 16px;">RECURSOS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /*foreach ($flujos as $flu): ?>
                                <tr>
                                    <td class="primary text-center"
                                        onclick="window.location = '<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'accion_flujo', $flu['Flujo']['id'])); ?>';"
                                        style="font-size: 16px; cursor: pointer;">
                                        <b><?= $flu['Flujo']['nombre'] ?></b>
                                    </td>
                                </tr>
                            <?php endforeach;*/ ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</aside>-->
<?php $this->end(); ?>


<?php $this->start('scriptjs'); ?>

<?php
echo $this->Html->script(array(
    'jquery.dataTables.columnFilter'
));
?>
<script>
    var filtro_c = [
        {type: "text"},
        {type: "text"},
        <?php if ($this->Session->read('Auth.User.role') == 'Administrador'): ?>
        {type: "text"},
        <?php endif; ?>
        {type: "text"},
        {type: "text"},
        null
    ];
    $(document).ready(function () {
        $('#tabla-filtros').dataTable({
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [-1]
            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "Anterior",
                    "sNext": "Siguiente"
                },
                "sSearch": "Buscar",
                "sLengthMenu": "Mostrar _MENU_ registros"
            },
            "iDisplayLength": 10,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Todos"]
            ],
            'order': [],
            "sDom": '<"dt-panelmenu clearfix" lfr>t<"dt-panelfooter clearfix"ip>',
        }).columnFilter({
            sPlaceHolder: "head:before",
            aoColumns: filtro_c
        });
    });

    /*$('#tabla-imp').dataTable().columnFilter({
     sPlaceHolder: "head:before",
     aoColumns: filtro_c
     });*/
</script>


<?php $this->end(); ?>


<script src="<?php echo $this->request->webroot; ?>js/jquery-sortable.js">
</script>
<script>
    $('.sorted_table').sortable({
        containerSelector: 'table',
        itemPath: '> tbody',
        itemSelector: 'tr',
        placeholder: '<tr class="placeholder"/>',
        //group: 'no-drop',
        handle: 'button.pmover',
        onDrop: function ($item, container, _super, event) {
            $item.removeClass(container.group.options.draggedClass).removeAttr("style");
            //$("body").removeClass(container.group.options.bodyClass);
            revisa_tabla();
        }
    });
    function revisa_tabla() {
        var postData = "";
        var cont = 0;
        $('.sorted_table tbody tr').each(function (ey, eva) {
            cont++;
            postData += " flujos[" + $(eva).attr('data-id') + ']=' + cont + '&';
        });

        var formURL = '<?php echo $this->Html->url(array('action' => 'index')); ?>';
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
                    //$("#parte").html(data);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    //if fails
                    alert("error");
                }
            });
    }
    revisa_tabla();
</script>
