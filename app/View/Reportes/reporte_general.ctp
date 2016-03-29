<style>

    .CSSTableGenerator {
        margin:0px;padding:0px;
        width:100%;
        border:1px solid #000000;

        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;

        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;

        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;

        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }.CSSTableGenerator table{
        border-collapse: collapse;
        border-spacing: 0;
        width:100%;
        height:100%;
        margin:0px;padding:0px;
    }.CSSTableGenerator tr:last-child td:last-child {
        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;
    }
    .CSSTableGenerator table tr:first-child td:first-child {
        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }
    .CSSTableGenerator table tr:first-child td:last-child {
        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;
    }.CSSTableGenerator tr:last-child td:first-child{
        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;
    }.CSSTableGenerator tr:hover td{
        background-color:#ffffff;


    }
    .CSSTableGenerator td{
        vertical-align:middle;

        background-color:#ffffff;

        border:1px solid #000000;
        border-width:0px 1px 1px 0px;
        padding:4px;
        font-size:10px;
        font-family:Arial;
        color:#000000;
    }.CSSTableGenerator tr:last-child td{
        border-width:0px 1px 0px 0px;
    }.CSSTableGenerator tr td:last-child{
        border-width:0px 0px 1px 0px;
    }.CSSTableGenerator tr:last-child td:last-child{
        border-width:0px 0px 0px 0px;
    }
    .CSSTableGenerator th{
        vertical-align:middle;
        background-color:#ffffff;
        border:1px solid #000000;
        border-width:0px 1px 1px 0px;
        padding:5px;
        font-size:12px;
        font-family:Arial;
        font-weight:bold;
        color:#000000;
    }

    .boton-p{
        margin-left: 10px;
    }
</style>
<section id="content" class="table-layout animated fadeIn">
    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <!-- recent orders table -->
        <div class="panel">
            <div class="panel-menu p12 admin-form theme-primary">

                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tabla-imp">
                            <thead>
                                <tr>
                                    <th class="text-center">Expediente</th>
                                    <th class="">Cliente</th>
                                    <th class="">Region</th>
                                    <th class="">Proceso Estado</th>
                                    <th class=""></th>
                                    <th class=""></th>
                                    <th class="">Flujo</th>
                                    <th></th>
                                </tr>
                                <tr class="bg-light">
                                    <th class="text-center">Expediente</th>
                                    <th class="">Cliente</th>
                                    <th class="">Region</th>
                                    <th class="">Proceso Estado</th>
                                    <th class="">F. Proceso</th>
                                    <th class="">Venc</th>
                                    <th class="">Flujo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($flujos_user as $fl): ?>
                                    <tr>
                                        <td><?php echo $fl['FlujosUser']['expediente'] ?></td>
                                        <td><?php echo $fl['Cliente']['nombre'] ?></td>
                                        <td><?php echo $fl['Regione']['nombre'] ?></td>
                                        <?php
                                        $p_estado = $this->requestAction(array('action' => 'get_dat_proceso', $fl['FlujosUser']['proceso']))
                                        ?>
                                        <td><?php echo $p_estado['Proceso']['nombre'] . ' (' . $p_estado['ProcesosEstado']['estado'] . ')' ?></td>
                                        <td><?php echo $p_estado[0]['creado'] ?></td>
                                        <td><?php echo $p_estado['ProcesosEstado']['dias_v'] ?></td>
                                        <td><?php echo $fl['Flujo']['nombre'] ?></td>
                                        <td>
                                            <a href="javascript:">Detalle</a>
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
    var filtro_c = [
    {type: "text"},
    {type: "text"},
    {type: "select", values: [
<?php foreach ($regiones as $de): ?>
        '<?php echo $de; ?>',
<?php endforeach; ?>
    ]},
    {
    type: "text"
    }
    ,
            null
            ,
            null
            ,
    {type: "select", values: [
<?php foreach ($flujos as $fl): ?>
        '<?php echo $fl; ?>',
<?php endforeach; ?>
    ]}
    , null
    ];
</script>
<?php
echo $this->Html->script(array(
    'jquery.dataTables.min'
        ), array('block' => 'scriptjs_a'))
?>
<?php
echo $this->Html->script(array(
    'dataTables.buttons.min',
    'buttons.print.min',
    'jquery.dataTables.columnFilter',
    'datableini1'
        ), array('block' => 'scriptjs'))
?>