<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
<!-- begin: .tray-center -->
<!-- Start: Topbar-Dropdown -->
<script>
    var num_r = 0;
</script>
<div class="tray tray-center">
    <div class="mw1000 center-block">
        <!-- Begin: Content Header -->
        <div class="content-header theme-primary">
            <h2> Hoja Ruta</h2>
        </div>
        <!-- Begin: Admin Form -->
        <div class="admin-form theme-primary">
            <div class="panel heading-border panel-primary">
                <?php echo $this->Form->create('HojasRuta', array('class' => 'form-validacion', 'id' => 'f-add')); ?>
                <div class="panel-body bg-light">
                    <div class="section-divider mb40 " >
                        <span>Datos del cliente</span>
                    </div>
                    <!-- Basic Inputs -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('HojasRuta.numero_tramite', array('class' => 'gui-input', 'placeholder' => 'Numero de tramite interno', 'required', 'id' => 'idtramite')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-pencil"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field select">
                                    <?php echo $this->Form->select('HojasRuta.regione_id', $regiones, array('empty' => 'Seleccione la Region', 'required', 'id' => 'idregion')) ?>
                                    <i class="arrow double"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#idregion').change(function () {
                            var formURL = "<?php echo $this->Html->url(array('action' => 'get_num_reg')); ?>/" + $('#idregion').val();
                            $.ajax(
                                    {
                                        url: formURL,
                                        type: "GET",
                                        success: function (data, textStatus, jqXHR)
                                        {
                                            //data: return data from server
                                            //$("#parte").html(data);
                                            $('#idcodigo').val($.parseJSON(data).numero);
                                        },
                                        error: function (jqXHR, textStatus, errorThrown)
                                        {
                                            //if fails   
                                            alert("error");
                                        }
                                    });
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('HojasRuta.codigo_caso', array('class' => 'gui-input', 'placeholder' => 'Codigo del Caso', 'required', 'id' => 'idcodigo', 'required')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-pencil"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section">
                                <label for="datepicker1" class="field prepend-icon">
                                    <?php echo $this->Form->text('fecha', array('class' => 'form-control ddatepicker1', 'placeholder' => 'Fecha Inicio', 'id' => 'ddatepicker1')); ?>
                                    <label class="field-icon">
                                        <i class="fa fa-calendar-o"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Input Icons -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('cliente', array('class' => 'gui-input', 'placeholder' => $cliente['Cliente']['nombre'], 'disabled')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('rep_legal', array('class' => 'gui-input', 'placeholder' => $cliente['Cliente']['representante_legal'], 'disabled')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="section-divider mb40" id="spy2">
                        <span>Descripcion de los requisitos del Cliente</span>
                    </div>

                    <?php foreach ($requisitos as $key => $req): ?>
                        <?php echo $this->Form->hidden("requisitos.$key.id"); ?>
                        <?php echo $this->Form->hidden("requisitos.$key.requisito_id", array('value' => $req['Requisito']['id'])); ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <?php echo $req['Requisito']['descripcion'] ?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <label class="field select">
                                    <?php echo $this->Form->select("requisitos.$key.o_s_l", array('O' => 'O', 'S' => 'S', 'L' => 'L'), array('empty' => '')) ?>
                                    <i class="arrow double"></i>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label class="field">
                                    <?php echo $this->Form->text("requisitos.$key.fojas", array('class' => 'gui-input', 'placeholder' => 'Fojas')); ?>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="field">
                                    <?php echo $this->Form->text("requisitos.$key.administracion_tributaria", array('class' => 'gui-input', 'placeholder' => 'Administracion Tributaria')); ?>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label class="field">
                                    <?php echo $this->Form->text("requisitos.$key.numero", array('class' => 'gui-input', 'placeholder' => 'Numero')); ?>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label class="field">
                                    <?php echo $this->Form->text("requisitos.$key.fecha", array('class' => 'gui-input ddatepicker1', 'placeholder' => 'Fecha')); ?>
                                </label>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <br>
                    <div class="section-divider mb40" id="spy2">
                        <span>Otros requisitos del Cliente</span>
                    </div>
                    <div id="f-requisito-0">

                    </div>
                    <?php if (!empty($requisitos_ad)): ?>
                        <?php foreach ($requisitos_ad as $key => $re): ?>
                            <script>
                                num_r++;
                            </script>

                            <div class="row" id="f-requisito-<?php echo $key + 1; ?>">
                                <?php echo $this->Form->hidden("orequisitos.$key.id"); ?>
                                <div class="col-md-4">
                                    <label class="field">
                                        <?php echo $this->Form->text("orequisitos.$key.descripcion", array('class' => 'gui-input', 'placeholder' => ($key + 1) . ' Otro requisito...', 'required')); ?>
                                    </label>
                                </div>
                                <div class="col-md-1">
                                    <label class="field select">
                                        <?php echo $this->Form->select("orequisitos.$key.o_s_l", array('O' => 'O', 'S' => 'S', 'L' => 'L'), array('empty' => '')) ?>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>
                                <div class="col-md-1">
                                    <label class="field">
                                        <?php echo $this->Form->text("orequisitos.$key.fojas", array('class' => 'gui-input', 'placeholder' => 'Fojas')); ?>
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="field">
                                        <?php echo $this->Form->text("orequisitos.$key.administracion_tributaria", array('class' => 'gui-input', 'placeholder' => 'Administracion Tributaria')); ?>
                                    </label>
                                </div>
                                <div class="col-md-1">
                                    <label class="field">
                                        <?php echo $this->Form->text("orequisitos.$key.numero", array('class' => 'gui-input', 'placeholder' => 'Numero')); ?>
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="field">
                                        <?php echo $this->Form->text("orequisitos.$key.fecha", array('class' => 'gui-input ddatepicker1', 'placeholder' => 'Fecha')); ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <br>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="section">
                                <button type="button" class="button btn-success" onclick="add_requisito();"> Add requisito </button> 
                                <button type="button" class="button btn-danger" onclick="quitar_requisito();"> Quitar requisito </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section">
                                <label for="firstname" class="field prepend-icon">
                                    <?php echo $this->Form->textarea('observaciones', ['class' => 'gui-textarea', 'placeholder' => 'Observaciones']); ?>
                                    <label for="email" class="field-icon">
                                        <i class="fa fa-edit"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($flujos as $key_f => $flu): ?>
                        <?php
                        if (!empty($flu['FlujosUser']['id'])) {
                            $idFlujoUser = $flu['FlujosUser']['id'];
                        } else {
                            $idFlujoUser = NULL;
                        }

                        $procesos = $this->requestAction(array('action' => 'get_procesos', $flu['Flujo']['id'], $idFlujoUser));
                        ?>
                        <?php echo $this->Form->hidden("FlujosUser.$key_f.id"); ?>
                        <div class="section-divider mb40" id="spy2">
                            <span><?php echo $flu['Flujo']['nombre'] ?></span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section">
                                    <label for="datepicker1" class="field prepend-icon">
                                        <?php echo $this->Form->hidden("FlujosUser.$key_f.flujo_id", array('value' => $flu['Flujo']['id'])); ?>
                                        <?php echo $this->Form->text("FlujosUser.$key_f.fecha_inicio", array('class' => 'form-control ddatepicker1', 'placeholder' => 'Fecha Inicio')); ?>
                                        <label class="field-icon">
                                            <i class="fa fa-calendar-o"></i>
                                        </label>
                                    </label>  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="section">
                                    <label for="datepicker1" class="field prepend-icon">
                                        <?php echo $this->Form->text("FlujosUser.$key_f.fecha_fin", array('class' => 'form-control ddatepicker1', 'placeholder' => 'Fecha Fin')); ?>
                                        <label class="field-icon">
                                            <i class="fa fa-calendar-o"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section">
                                    <label class="field select">
                                        <?php echo $this->Form->select("FlujosUser.$key_f.asesor_id", $usuarios, array('empty' => 'Seleccione el Asesor Legal')) ?>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="section">
                                    <label for="firstname" class="field prepend-icon">
                                        <?php echo $this->Form->text("FlujosUser.$key_f.expediente", ['class' => 'gui-input', 'placeholder' => 'Expediente']); ?>
                                        <label for="email" class="field-icon">
                                            <i class="fa fa-edit"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ($flu['Flujo']['tributos_determinados'] == 1): ?>
                                    <h5 class="text-center">Tributos Determinados</h5>
                                    <?php foreach ($flu['Flujo']['tributos'] as $key => $tri): ?>
                                        <?php echo $this->Form->hidden("FlujosUser.$key_f.tributos.$key.id"); ?>
                                        <?php echo $this->Form->hidden("FlujosUser.$key_f.tributos.$key.tributo_id", array('value' => $tri['Tributo']['id'])); ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="section">
                                                    <div class="option-group field">
                                                        <label class="option">
                                                            <?php echo $this->Form->checkbox("FlujosUser.$key_f.tributos.$key.estado"); ?>
                                                            <span class="checkbox"></span><?php echo $tri['Tributo']['nombre']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="field">
                                                    <?php echo $this->Form->text("FlujosUser.$key_f.tributos.$key.periodo_fiscal", array('class' => 'gui-input', 'placeholder' => 'Periodo Fiscal')); ?>
                                                </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="field">
                                                    <?php echo $this->Form->text("FlujosUser.$key_f.tributos.$key.deuda_tributaria", array('class' => 'gui-input', 'placeholder' => 'Administracion Tributaria')); ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">CONTROL Y SEGUIMIENTO DEL PROCEDIMIENTO</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-center text-success"><b>Proceso</b></td>
                                        <td class="text-center text-success"><b>Fecha inicio</b></td>
                                        <td class="text-center text-success"><b>Fecha Fin</b></td>
                                    </tr>
                                    <?php foreach ($procesos as $key => $pro): ?>
                                        <tr>
                                            <td><b><?php echo $key + 1 ?>.-</b> <?php echo $pro['Proceso']['nombre']; ?></td>
                                            <td><?php echo $pro['Proceso']['fecha_inicio']; ?></td>
                                            <td><?php echo $pro['Proceso']['fecha_fin']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">Resultados del proceso</h5>
                                <?php foreach ($flu['Flujo']['resultados'] as $key => $re): ?>
                                    <div class="section row">
                                        <div class="col-md-9">
                                            <div class="section">

                                                <label class="field text-center">
                                                    <?php echo $re['Resultado']['pregunta']; ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="section">
                                                <label class="field select">
                                                    <?php
                                                    $valor = '';
                                                    if (!empty($re['FlujosUsersResultado']['id'])) {
                                                        echo $this->Form->hidden("FlujosUser.$key_f.Resultados.$key.id", array('value' => $re['FlujosUsersResultado']['id']));
                                                        $valor = $re['FlujosUsersResultado']['respuesta'];
                                                    }
                                                    ?>
                                                    <?php echo $this->Form->hidden("FlujosUser.$key_f.Resultados.$key.resultado_id", array('value' => $re['Resultado']['id'])) ?>
                                                    <?php echo $this->Form->select("FlujosUser.$key_f.Resultados.$key.respuesta", array('SI' => 'SI', 'NO' => 'NO', 'N/A' => 'N/A'), array('empty' => 'Resultado', 'value' => $valor)) ?>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Observaciones y/o aclaraciones</h5>
                                <div class="section">
                                    <label for="datepicker1" class="field prepend-icon">
                                        <?php echo $this->Form->textarea("FlujosUser.$key_f.observacion", ['class' => 'gui-textarea', 'placeholder' => 'Observaciones']); ?>
                                        <label class="field-icon">
                                            <i class="fa fa-edit"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <!-- end .form-body section -->
                <div class="panel-footer text-right">
                    <button type="submit" class="button btn-primary"> Guardar </button>
                </div>
                <!-- end .form-footer section -->
                <?php echo $this->Form->hidden('cliente_id', array('value' => $cliente['Cliente']['id'])); ?>
                <?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'))); ?>
                <?php echo $this->Form->hidden("adjunto_id") ?>
                <?php echo $this->Form->hidden("id") ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>


<div class="row" id="div-cont-req"  style="display: none;">
    <div class="col-md-4">
        <label class="field">
            <?php echo $this->Form->text("requisitos.descripcion", array('class' => 'gui-input descripcion', 'placeholder' => 'Fojas')); ?>
        </label>
    </div>
    <div class="col-md-1">
        <label class="field select">
            <?php echo $this->Form->select("requisitos.o_s_l", array('O' => 'O', 'S' => 'S', 'L' => 'L'), array('empty' => '', 'class' => 'o_s_l')) ?>
            <i class="arrow double"></i>
        </label>
    </div>
    <div class="col-md-1">
        <label class="field">
            <?php echo $this->Form->text("requisitos.fojas", array('class' => 'gui-input fojas', 'placeholder' => 'Fojas')); ?>
        </label>
    </div>
    <div class="col-md-3">
        <label class="field">
            <?php echo $this->Form->text("requisitos.administracion_tributaria", array('class' => 'gui-input administracion_tributaria', 'placeholder' => 'Administracion Tributaria')); ?>
        </label>
    </div>
    <div class="col-md-1">
        <label class="field">
            <?php echo $this->Form->text("requisitos.numero", array('class' => 'gui-input numero', 'placeholder' => 'Numero')); ?>
        </label>
    </div>
    <div class="col-md-2">
        <label class="field">
            <?php echo $this->Form->text("requisitos.fecha", array('class' => 'gui-input ddatepicker1 fecha', 'placeholder' => 'Fecha')); ?>
        </label>
    </div>
</div>
<script>
    //var num_r = 0;
    function add_requisito() {
        num_r++;
        var contenido_r = $('#div-cont-req').html();
        $('#f-requisito-' + (num_r - 1)).after('<div class="row" id="f-requisito-' + num_r + '">' + contenido_r + '</div>');
        $('#f-requisito-' + num_r + ' input.descripcion').attr('placeholder', num_r + '. Otro requisito...').attr('name', 'data[orequisitos][' + num_r + '][descripcion]');
        $('#f-requisito-' + num_r + ' select.o_s_l').attr('name', 'data[orequisitos][' + num_r + '][o_s_l]');
        $('#f-requisito-' + num_r + ' input.fojas').attr('name', 'data[orequisitos][' + num_r + '][fojas]');
        $('#f-requisito-' + num_r + ' input.administracion_tributaria').attr('name', 'data[orequisitos][' + num_r + '][administracion_tributaria]');
        $('#f-requisito-' + num_r + ' input.numero').attr('name', 'data[orequisitos][' + num_r + '][numero]');
        $('#f-requisito-' + num_r + ' input.fecha').attr('name', 'data[orequisitos][' + num_r + '][fecha]');

        $('.ddatepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    }
    function quitar_requisito() {
        if (num_r != 0) {
            $('#f-requisito-' + num_r).remove();
            num_r--;
        }
    }
</script>

<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>


<?php $this->start('scriptjs'); ?>
<?php echo $this->Html->script(array('vendor/plugins/moment/moment.min', 'vendor/plugins/datepicker/js/bootstrap-datetimepicker')) ?>
<script>
    $('.ddatepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
<?php $this->end(); ?>