
<div id="topbar-dropmenu">
    <div class="topbar-menu row">
        <div class="col-xs-6 col-sm-3">
            <a  href="<?php echo $this->Html->url(array('action' => 'hoja_ruta', $hojasRuta['HojasRuta']['cliente_id'], $hojasRuta['HojasRuta']['id'])); ?>" class="metro-tile">
                <span class="metro-icon glyphicon glyphicon-edit"></span>
                <p class="metro-title">Editar Hoja-Ruta</p>
            </a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <a  href="javascript:" class="metro-tile" onclick="printDiv('printableArea');">
                <span class="metro-icon glyphicon glyphicon-print"></span>
                <p class="metro-title">Imprimir Hoja Ruta</p>
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

<header id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="javascript:">
                    Hoja Ruta
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

<section id="content" class=" animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body" id="printableArea">
                    <style>
                        table.tabla_v{
                            width: 100%;
                            color: black !important;
                        }
                        table.tabla_v tr td{
                            border: 1px solid #000 !important;
                            padding: 4px;
                        }
                        table.tabla_s{
                            width: 100%;
                            color: black !important;
                        }
                        table.tabla_s tr td{
                            //border: 1px solid #000 !important;
                            padding: 2px;
                        }
                        table.tabla_g{
                            width: 100%;
                            color: black !important;
                        }
                        table.tabla_g tr td{
                            border: 1px solid #000 !important;
                            padding: 2px;
                        }
                        table.tabla_g tr:first-child td {
                            font-weight: bold;
                            background-color: #c5c8c6;
                        }

                        table.tabla_simple{
                            width: 100%;
                        }
                        table.tabla_simple tr td{
                            vertical-align: top;
                        }
                        table.tabla_n{
                            width: 100%;
                            color: black !important;
                        }
                        table.tabla_n tr td{
                            border: 1px solid #000 !important;
                            padding: 2px;
                        }
                        @page {
                            size: A4;
                            margin: 0px;
                        }
                        @media print {

                            table.tabla_v{
                                width: 100%;
                                color: black !important;
                            }
                            table.tabla_v tr td{
                                border: 1px solid #000 !important;
                                padding: 4px;
                            }
                            table.tabla_s{
                                width: 100%;
                                color: black !important;

                            }
                            table.tabla_s tr td{
                                //border: 1px solid #000 !important;
                                padding: 1px !important;
                            }
                            table.tabla_g{
                                width: 100%;
                                color: black !important;
                            }
                            table.tabla_g tr td{
                                font-size: 12px !important;
                                border: 0.5px solid #000 !important;
                                padding: 2px;
                            }
                            table.tabla_g tr:first-child td {
                                font-weight: bold !important;
                                background-color: #c5c8c6 !important;
                            }

                            table.tabla_simple{
                                width: 100% !important;
                            }
                            table.tabla_simple tr td{
                                vertical-align: top !important;
                            }
                            table.tabla_n{
                                width: 100% !important;
                                color: black !important;
                            }
                            table.tabla_n tr td{
                                border: 1px solid #000 !important;
                                padding: 2px !important;
                            }
                            
                            .saltar_pagina{
                                page-break-before: always !important;
                                margin-top: 1cm !important;
                            }
                            div.piedepag{
                                position: fixed !important;
                                bottom: 1cm !important;
                                padding-right: 1cm !important;
                                text-align: right !important;
                                width: 100% !important;
                            }
                            div.hoja_ruta{
                                margin: 1cm !important;
                            }
                        }
                        @media screen {
                            div.piedepag {
                                display: none;
                            }
                        }

                    </style>
                    <div class="piedepag">
                        Hoja controlada - Sistema Vergara
                    </div>
                    <div class="hoja_ruta">
                        <table class="tabla_v">
                            <tr>
                                <td rowspan="3" align="center">
                                    <img src="<?php echo $this->webroot; ?>img/logos/sJmqLd.jpg" style="height: 70px;">
                                </td> 
                                <td align="center" style=" font-weight: bold; font-size: 17px; width: 40%;">REGISTRO</td>
                                <td><b>Codigo:</b> SGC-VYA-REG-028</td>
                            </tr>
                            <tr>
                                <td rowspan="2" align="center" style=" font-weight: bold; font-size: 15px;">
                                    HOJA DE RUTA
                                </td> 
                                <td>
                                    <b>Versión:</b> 0-2016
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b><b>Página:</b> 1 de 2</b>
                                </td> 
                            </tr>
                        </table>
                        <br>
                        <table class="tabla_s">
                            <!--<tr>
                                <td style=" font-weight: bold; width: 25%;">Número tramite interno:</td>
                                <td style=" width: 30%; color: #1c94c4;"><?php //echo $hojasRuta['HojasRuta']['numero_tramite']; ?></td>
                                <td style=" font-weight: bold; width: 25%;">Fecha:</td>
                                <td style=" color: #1c94c4;"><?php //echo $hojasRuta['HojasRuta']['fecha']; ?></td>
                            </tr>-->
                            <tr>
                                <td style=" font-weight: bold; width: 25%;">Código del Caso:</td>
                                <td style=" color: #1c94c4;"><?php echo $hojasRuta['HojasRuta']['codigo_caso']; ?></td>
                                <td style=" font-weight: bold; width: 25%;"></td>
                                <td style=" color: #1c94c4;"></td>
                            </tr>
                            <tr>
                                <td style=" font-weight: bold;">Número de expediente:</td>
                                <td style=" color: #1c94c4;"><?php echo $hojasRuta['HojasRuta']['numero_expediente']; ?></td>
                                <td style=" font-weight: bold;"></td>
                                <td style=" color: #1c94c4;"></td>
                            </tr>
                            <tr>
                                <td style=" font-weight: bold;">Empresa o Cliente:</td>
                                <td style=" color: #1c94c4;"><?php echo $hojasRuta['Cliente']['nombre']; ?></td>
                                <td style=" font-weight: bold;"></td>
                                <td style=" color: #1c94c4;"></td>
                            </tr>
                            <tr>
                                <td style=" font-weight: bold;">Representante Legal:</td>
                                <td style=" color: #1c94c4;"><?php echo $hojasRuta['Cliente']['representante_legal']; ?></td>
                                <td style=" font-weight: bold;"></td>
                                <td style=" color: #1c94c4;"></td>
                            </tr>
                        </table><br>
                        <table class="tabla_g">
                            <tr>
                                <td colspan="6">
                                    DESCRIPCIÓN DE LOS REQUISITOS DEL CLIENTE
                                </td>
                            </tr>
                            <tr>
                                <td><b>El cliente pretende impugnar:</td>
                                <td><b>O-S-L</b></td>
                                <td><b>Fojas</b></td>
                                <td><b>Administración Tributaria</b> </td>
                                <td><b>Numero</b> </td>
                                <td><b>Fecha</b></td>
                            </tr>
                            <?php foreach ($hojas_requisitos as $key => $hr): ?>
                                <tr>
                                    <td><?php echo ($key + 1) . '.' . $hr['HojasRequisito']['requisito'] ?></td>
                                    <td><?php echo $hr['HojasRequisito']['o_s_l'] ?></td>
                                    <td><?php echo $hr['HojasRequisito']['fojas'] ?></td>
                                    <td><?php echo $hr['HojasRequisito']['administracion_tributaria'] ?></td>
                                    <td><?php echo $hr['HojasRequisito']['numero'] ?></td>
                                    <td><?php echo $hr['HojasRequisito']['fecha'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <?php if (!empty($hojas_requisitos_otros)): ?>
                                <tr>
                                    <td><b>Otros requisitos:</td>
                                    <td><b></b></td>
                                    <td><b></b></td>
                                    <td><b></b></td>
                                    <td><b></b></td>
                                    <td><b></b></td>
                                </tr>
                                <?php foreach ($hojas_requisitos_otros as $key => $hr): ?>
                                    <tr>
                                        <td><?php echo ($key + 1) . '.' . $hr['HojasRequisito']['descripcion'] ?></td>
                                        <td><?php echo $hr['HojasRequisito']['o_s_l'] ?></td>
                                        <td><?php echo $hr['HojasRequisito']['fojas'] ?></td>
                                        <td><?php echo $hr['HojasRequisito']['administracion_tributaria'] ?></td>
                                        <td><?php echo $hr['HojasRequisito']['numero'] ?></td>
                                        <td><?php echo $hr['HojasRequisito']['fecha'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <tr>
                                <td>

                                </td>
                                <td></td>
                                <td></td>
                                <td colspan="3">
                                    <b>Observaciones:</b><br>
                                    <?php echo $hojasRuta['HojasRuta']['observaciones']; ?>
                                </td>
                            </tr>
                        </table><br>
                        <?php if (!empty($flujos_c)): ?>
                            <?php foreach ($flujos_c as $nkey => $flu): ?>
                                <?php
                                $procesos = $this->requestAction(array('action' => 'get_procesos', $flu['Flujo']['id'], $flu['FlujosUser']['id']));
                                $resultados = $this->requestAction(array('action' => 'get_resultados', $flu['FlujosUser']['id']));
                                $tributos = $this->requestAction(array('action' => 'get_tributos', $flu['FlujosUser']['id']));
                                $asesores = $this->requestAction(array('action' => 'get_asesores_edit', $flu['FlujosUser']['id']));
                                ?>
                                <div class="<?php echo ($nkey == 1) ? 'saltar_pagina' : ''; ?>">
                                    <table class="tabla_g">
                                        <tr>
                                            <td colspan="4">
                                                <?php echo $flu['Flujo']['nombre']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" width: 25%;"><b>Fecha de inicio:</b></td>
                                            <td style=" width: 25%;"><?php echo$flu['FlujosUser']['fecha_inicio']; ?></td>
                                            <td style=" width: 25%;"><b>Fecha de Fin:</b> <?php echo $flu['FlujosUser']['fecha_fin']; ?></td>
                                            <td><b>Fecha de Notificacion:</b> <?php echo $flu['FlujosUser']['fecha_notificacion']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Profesional asignado:</b></td>
                                            <td>
                                                <?php
                                                foreach ($asesores as $asesore)
                                                {
                                                    echo "|".$asesore['Asesor']['nombre_completo']."|";
                                                }
                                                    ?>
                                                <?php echo$flu['Asesor']['nombre_completo']; ?>
                                            </td>
                                            <td><b>Número de expediente:</b></td>
                                            <td><?php echo$flu['FlujosUser']['expediente']; ?></td>
                                        </tr>
                                    </table>
                                    <table class="tabla_simple">
                                        <tr>
                                            <td style=" width: 50%;">

                                                <table class="tabla_n">
                                                    <tr>
                                                        <td style=" width: 50%;"><b>Descripción del caso:</b></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                </table>
                                                <?php if (!empty($tributos)): ?>
                                                    <table class="tabla_g">
                                                        <tr>
                                                            <td colspan="2">Tributos Determinados </td>
                                                            <td>Periodo Fiscal </td>
                                                            <td>Deuda Tributaria y/o Sanción  </td>
                                                        </tr>
                                                        <?php foreach ($tributos as $key => $tri): ?>

                                                            <tr>
                                                                <td><?php echo $tri['Tributo']['nombre']; ?></td>
                                                                <td><?php echo $tri['FlujosUsersTributo']['descripcion']; ?></td>
                                                                <td><?php echo $tri['FlujosUsersTributo']['periodo_fiscal']; ?></td>
                                                                <td><?php echo $tri['FlujosUsersTributo']['deuda_tributaria']; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <table class="tabla_g">
                                                    <tr>
                                                        <td colspan="3">CONTROL Y SEGUIMIENTO DEL PROCEDIMIENTO</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"><b>Actividad (*)</b></td>
                                                        <td align="center"><b>Fecha Inicio </b></td>
                                                        <td align="center"><b>Fecha Fin</b></td>
                                                    </tr>
                                                    <?php foreach ($procesos as $key => $pro): ?>
                                                        <tr>
                                                            <td><?php echo ($key + 1) . '. ' . $pro['Proceso']['nombre']; ?></td>
                                                            <td><?php echo $pro['Proceso']['fecha_inicio']; ?></td>
                                                            <td><?php echo $pro['Proceso']['fecha_fin']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="tabla_simple">
                                        <tr>
                                            <td style=" width: 50%;">
                                                <table class="tabla_g">
                                                    <tr>
                                                        <td colspan="3">RESULTADOS DEL PROCESO</td>
                                                    </tr>
                                                    <?php foreach ($resultados as $re): ?>
                                                        <tr>
                                                            <td style="width: 75%;"><?php echo $re['Resultado']['pregunta'] ?></td>
                                                            <td><b><?php echo $re['FlujosUsersResultado']['respuesta'] ?></b></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </table>
                                            </td>
                                            <td style=" width: 50%;">
                                                <table class="tabla_g">
                                                    <tr>
                                                        <td>OBSERVACIONES Y/O ACLARACIONES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;<?php echo$flu['FlujosUser']['observacion']; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table><br>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?> 
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        //alert('dsadsa');
        window.location.reload();
        document.body.innerHTML = originalContents;
    }
</script>