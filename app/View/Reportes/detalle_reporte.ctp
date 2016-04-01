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
        font-size:13px;
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
<div>
    <table class="CSSTableGenerator">
        <tr>
            <td colspan="4" style="font-size: 16px; font-weight: bold; text-align: center !important;">
                DETALLES DE CASO (<?php echo $flujos_user['Flujo']['nombre'] ?>)
            </td>
        </tr>
        <?php
        $p_estado = $this->requestAction(array('action' => 'get_dat_proceso', $flujos_user['FlujosUser']['proceso']))
        ?>
        <tr>
            <td><b>Expediente: </b></td>
            <td><?php echo $flujos_user['FlujosUser']['expediente'] ?></td>
            <td><b>Cliente: </b></td>
            <td><?php echo $flujos_user['Cliente']['nombre'] ?></td>
        </tr>
        <tr>
            <td><b>Region: </b></td>
            <td><?php echo $flujos_user['Regione']['nombre'] ?></td>
            <td><b>Proceso Estado Actual: </b></td>
            <td><?php
                if (!empty($p_estado['Proceso']['nombre']) && !empty($p_estado['ProcesosEstado']['estado'])) {
                    echo $p_estado['Proceso']['nombre'] . ' (' . $p_estado['ProcesosEstado']['estado'] . ')';
                }
                ?></td>
        </tr>


    </table><br>
    <table class="CSSTableGenerator">
        <tr>
            <td colspan="3" style="font-size: 14px; font-weight: bold; text-align: center !important;">
                HISTORIAL DE PROCESOS DEL CASO
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Proceso</td>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Estado</td>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Fecha</td>
        </tr>
        <?php foreach ($procesos_estados as $proe):?>
        <tr>
            <td><?php echo $proe['Proceso']['nombre']?></td>
            <td><?php echo $proe['ProcesosEstado']['estado']?></td>
            <td><?php echo $proe['ProcesosEstado']['created']?></td>
        </tr>
        <?php endforeach;?>
    </table><br>

    <table class="CSSTableGenerator">
        <tr>
            <td colspan="7" style="font-size: 14px; font-weight: bold; text-align: center !important;">
                HISTORIAL DE TAREAS DEL CASO
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Tarea</td>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Prioridad</td>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Fecha Inicio</td>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Fecha FIn</td>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Asignador</td>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Asignado</td>
            <td style="font-size: 14px; font-weight: bold; text-align: center !important;">Estado</td>
        </tr>
        <?php foreach ($tareas as $ta):?>
        <?php 
        $estados = $this->requestAction(array('controller' => 'Tareas','action' => 'get_estados_tareas',$ta['Tarea']['id']));
        ?>
        <tr>
            <td><?php echo $ta['Tarea']['descripcion']?></td>
            <td><?php echo $ta['Tarea']['prioridad']?></td>
            <td><?php echo $ta['Tarea']['fecha_inicio']?></td>
            <td><?php echo $ta['Tarea']['fecha_fin']?></td>
            <td><?php echo $ta['User']['nombre_completo']?></td>
            <td><?php echo $ta['Asignado']['nombre_completo']?></td>
            <td style="font-size: 10px;">
                <?php 
                foreach ($estados as $es){
                    echo $es['TareasEstado']['estado']." en ".$es['TareasEstado']['created'].'<br>';
                }
                ?>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
