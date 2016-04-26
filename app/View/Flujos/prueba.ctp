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


    <section id="content" class="table-layout animated fadeIn">


    <div class="tray tray-center">
        <div class="panel mb25 mt5 panel-group accordion accordion-lg">
            <div class="panel">

                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table dataTable table-bordered sorted_table" style="width: 100%;" cellspacing="0" width="100%">
                            <thead>
                                <tr class="bg-light">
                                    <th></th>
                                    <th class="text-center" style="font-size: 16px;">Proceso</th>
                                    <th class="text-center">Orden</th>
                                    <th class="text-center" style="font-size: 16px;">Requisitos</th>
                                    <th>Accion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($procesos as $key => $pro): ?>
                                    <tr class="blockquote-info" id="item-<?= $key + 1 ?>" data-id="<?php echo $pro['Proceso']['id'] ?>">
                                        <td><?php echo ($key + 1) ?></td>
                                        <td><?php echo $pro['Proceso']['nombre'] ?></td>
                                        <td><?php echo $pro['Proceso']['orden'] ?></td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group" style="width: 120px;;">
                                                <button type="button" class="btn btn-warning" title="Editar Proceso" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'proceso', $pro['Proceso']['id'])); ?>');">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-success" title="Condiciones Necesarias" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'condiciones', $pro['Proceso']['id'])) ?>');">
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary pmover" title="Mover" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'condiciones', $pro['Proceso']['id'])) ?>');">
                                                    <i class="glyphicon glyphicon-move"></i>
                                                </button>
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

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</section>
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
            postData += " procesos[" + $(eva).attr('data-id') + ']=' + cont + '&';
        });
        
        var formURL = '<?php echo $this->Html->url(array('action' => 'prueba')); ?>';
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

<script>
    /*var group = $("ol.limited_drop_targets").sortable({
     group: 'limited_drop_targets',
     isValidTarget: function  ($item, container) {
     if($item.is(".highlight"))
     return true;
     else
     return $item.parent("ol")[0] == container.el[0];
     },
     onDrop: function ($item, container, _super) {
     $('#serialize_output').text(
     group.sortable("serialize").get().join("\n"));
     _super($item, container);
     },
     serialize: function (parent, children, isContainer) {
     return isContainer ? children.join() : parent.text();
     },
     tolerance: 6,
     distance: 10
     });*/
</script>