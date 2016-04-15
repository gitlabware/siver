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
        padding:1px;
        font-size:9px;
        font-family:Arial;
        //font-weight:bold;
        color:#000000;
    }.CSSTableGenerator tr:last-child td{
        border-width:0px 1px 0px 0px;
    }.CSSTableGenerator tr td:last-child{
        border-width:0px 0px 1px 0px;
    }.CSSTableGenerator tr:last-child td:last-child{
        border-width:0px 0px 0px 0px;
    }
</style>

<div style="width: 100%;">
    <table class="CSSTableGenerator">
        <tr>
            <td rowspan="3" style="width: 30%;" align="center">
                <img src="<?php echo $this->webroot; ?>img/logos/sJmqLd.jpg" style="height: 40px;">
            </td>
            <td style="width: 40%;text-align: center; font-size: 13px; font-weight: bold;">REGISTRO</td>
            <td style=""><b>Codigo:</b> SGC-VYA-REG-<?php echo $cliente['Cliente']['id']?></td>
        </tr>
        <tr>
            <td rowspan="2" style="text-align: center;">Datos del Cliente</td>
            <td><b>Versión:</b> 0.0</td>
        </tr>
        <tr>
            <td><b>Pagina:</b> 1 de 1</td>
        </tr>
    </table><br>
    <table class="CSSTableGenerator" style="width: 40% !important;">
        <tr>
            <td style="background-color: #e5e5f8;"><b>FECHA</b></td>
            <td><?php echo date('d-m-Y') ?></td>
        </tr>
    </table>
    <br>
    <table class="CSSTableGenerator">
        <tr>
            <td style="background-color: #cccccc; font-weight: bold;">I. DATOS BÁSICOS DEL CLIENTE</td>
        </tr>
    </table>
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">NOMBRE COMPLETO</td>
            <td style=" width: 50%;"><?php echo $cliente['Cliente']['nombre']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 12%;">C.I.</td>
            <td style="width: 18%;"><?php echo $cliente['Cliente']['ci']?></td>
        </tr>
    </table>
    
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">DOMICILIO</td>
            <td style=" width: 25%;"><?php echo $cliente['Cliente']['domicilio']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 11%;">CIUDAD</td>
            <td style=" width: 14%;"><?php echo $cliente['Cliente']['ciudad']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 12%;">PAIS</td>
            <td style="width: 18%;"><?php echo $cliente['Cliente']['pais']?></td>
        </tr>
    </table>
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">TELÉFONO</td>
            <td style=" width: 25%;"<?php echo $cliente['Cliente']['telefono']?>></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 11%;">CELULAR</td>
            <td style=" width: 14%;"><?php echo $cliente['Cliente']['celular']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 12%;">FAX</td>
            <td style="width: 18%;"><?php echo $cliente['Cliente']['fax']?></td>
        </tr>
    </table>
    
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">TELÉF. REFERENCIA</td>
            <td style=" width: 25%;"><?php echo $cliente['Cliente']['telefono_referencia']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 25%;">NOMBRE DE CONTACTO</td>
            <td style=" width: 30%;"><?php echo $cliente['Cliente']['nombre_contacto']?></td>
        </tr>
    </table>
    <br>
    <table class="CSSTableGenerator">
        <tr>
            <td style="background-color: #cccccc; font-weight: bold;">II. DATOS ESPECÍFICOS</td>
        </tr>
    </table>
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">NOMBRE RAZON/SOCIAL</td>
            <td style=" width: 80%;"><?php echo $cliente['Cliente']['razon_social']?></td>
        </tr>
    </table>
    
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">REPRESENTANTE LEGAL</td>
            <td style=" width: 25%;"><?php echo $cliente['Cliente']['representante_legal']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 11%;">C.I.</td>
            <td style=" width: 44%;"><?php echo $cliente['Cliente']['ci_representante']?></td>
        </tr>
    </table>
    
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">DOMICILIO</td>
            <td style=" width: 25%;"><?php echo $cliente['Cliente']['domicilio_legal']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 11%;">CIUDAD</td>
            <td style=" width: 14%;"><?php echo $cliente['Cliente']['ciudad_representante']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 12%;">PAIS</td>
            <td style="width: 18%;"><?php echo $cliente['Cliente']['pais_representante']?></td>
        </tr>
    </table>
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">TELÉFONO</td>
            <td style=" width: 25%;"><?php echo $cliente['Cliente']['telefono_representante']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 11%;">CELULAR</td>
            <td style=" width: 14%;"><?php echo $cliente['Cliente']['celular_representante']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 12%;">FAX</td>
            <td style="width: 18%;"><?php echo $cliente['Cliente']['fax_representante']?></td>
        </tr>
    </table>
    
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">NIT</td>
            <td style=" width: 25%;"><?php echo $cliente['Cliente']['nit']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 11%;">E-mail</td>
            <td style=" width: 44%;"><?php echo $cliente['Cliente']['email']?></td>
        </tr>
    </table>
    <table class="CSSTableGenerator" style="margin-top: -1px;">
        <tr>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 20%;">MATRÍCULA DE COMERCIO</td>
            <td style=" width: 25%;"><?php echo $cliente['Cliente']['matricula_comercio']?></td>
            <td style="background-color: #e5e5f8; font-weight: bold; width: 11%;">Pag. Web</td>
            <td style=" width: 44%;"><?php echo $cliente['Cliente']['web']?></td>
        </tr>
    </table>
    <div style="width: 100%;" align="center">
        <div style="width: 30%; margin-top: 100px;border:1px solid #000000;border-width:0px 1px 1px 0px;">
            
        </div>
        FIRMA DEL CLIENTE
    </div>
</div>