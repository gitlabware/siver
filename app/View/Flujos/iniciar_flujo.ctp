<link rel="stylesheet" type="text/css"
      href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">

<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-square"></i>
        <?php
        if (!empty($this->request->data['Flujo']['nombre'])) {
            echo $this->request->data['Flujo']['nombre'];
        } else {
            echo "RECURSO";
        }

        ?>

    </span>
</div>

<?= $this->Form->create('Flujo', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <!--<div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
    <?php //echo $this->Form->text('FlujosUser.descripcion', ['class' => 'gui-input', 'required', 'placeholder' => 'Nombre']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
    </div>-->
    <!--<div class="section row" id="cliente-select">
        <div class="col-md-11">
            <label class="field select">
                <?php // echo $this->Form->select('FlujosUser.cliente_id', $clientes, array('empty' => 'Seleccione el Cliente', 'required', 'id' => 'idsel-cli')) ?>
                <i class="arrow double"></i>
            </label>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-success" title="Nuevo Cliente" onclick="
                    $('#cliente-select').hide(400);
                    $('#idsel-cli').attr('required', false).val('');
                    $('#cliente-text').show(400);
                    $('#idtext-cli').attr('required', true);">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="section row" id="cliente-text" style="display: none;">
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php //echo $this->Form->text('Cliente.nombre', ['class' => 'gui-input', 'placeholder' => 'Nombre del Cliente', 'id' => 'idtext-cli','value' => '']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-user"></i>
                </label>
            </label>
        </div>
        <div class="col-md-5">
            <label for="firstname" class="field prepend-icon">
                <?php //echo $this->Form->text('Cliente.ci_nit', ['class' => 'gui-input', 'placeholder' => 'C.I./NIT','value' => '']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-credit-card"></i>
                </label>
            </label>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-success" title="Seleccionar Cliente" onclick="
                    $('#cliente-select').show(400);
                    $('#idsel-cli').attr('required', true);
                    $('#cliente-text').hide(400);
                    $('#idtext-cli').attr('required', false).val('');">
                <i class="fa fa-hand-o-left"></i>
            </button>
        </div>
    </div>
    -->

    <!--<div class="section row">
        <div class="col-md-12">
            <label class="field select">
                <?php /*echo $this->Form->select('FlujosUser.proceso_id', $procesos, array('empty' => 'Seleccione Proceso Inicial', 'required')) */ ?>
                <i class="arrow double"></i>
            </label>
        </div>
    </div>-->

    <?php /*if (!empty($this->request->data['FlujosUser']['id'])): */ ?><!--
        <div class="section row">
            <div class="col-md-12">
                <label class="field select">
                    <?php /*echo $this->Form->select('FlujosUser.estado', array('Activo' => 'Activo', 'Finalizado' => 'Finalizado'), array('empty' => 'Seleccione Estado', 'required')) */ ?>
                    <i class="arrow double"></i>
                </label>
            </div>
        </div>
    <?php /*else: */ ?>
        <?php /*echo $this->Form->hidden('FlujosUser.estado', array('value' => 'Activo')) */ ?>
    --><?php /*endif; */ ?>

    <div class="section row">
        <div class="col-md-6">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('FlujosUser.expediente', ['class' => 'gui-input', 'placeholder' => 'Expediente', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
        <div class="col-md-6">
            <label class="field select">
                <?php echo $this->Form->select('FlujosUser.regione_id', $regiones, array('empty' => 'Seleccione la region', 'required')) ?>
                <i class="arrow double"></i>
            </label>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-4">
            <label for="datepicker1" class="field prepend-icon">
                <?php echo $this->Form->text('FlujosUser.fecha_inicio', array('class' => 'form-control ddatepicker1', 'placeholder' => 'Fecha Inicio', 'id' => 'ddatepicker1')); ?>
                <label class="field-icon">
                    <i class="fa fa-calendar-o"></i>
                </label>
            </label>
        </div>
        <div class="col-md-4">
            <label for="datepicker1" class="field prepend-icon">
                <?php echo $this->Form->text('FlujosUser.fecha_fin', array('class' => 'form-control ddatepicker1', 'placeholder' => 'Fecha Fin', 'id' => 'ddatepicker2')); ?>
                <label class="field-icon">
                    <i class="fa fa-calendar-o"></i>
                </label>
            </label>
        </div>
        <div class="col-md-4">
            <label for="datepicker1" class="field prepend-icon">
                <?php echo $this->Form->text('FlujosUser.fecha_notificacion', array('class' => 'form-control ddatepicker1', 'placeholder' => 'Fecha Notificacion', 'id' => 'ddatepicker3')); ?>
                <label class="field-icon">
                    <i class="fa fa-calendar-o"></i>
                </label>
            </label>
        </div>
    </div>
    <?php
    $asesores = $this->requestAction(array('controller' => 'HojasRutas','action' => 'get_asesores_edit', $idFlujosUser));
    ?>
    <div class="section row">
        <div class="col-md-8">
            <?php
            $base_num_f = 100;
            ?>
            <?php foreach ($asesores as $ka_num => $asesore): ?>
                <?php $nuevo_num_f = $base_num_f + $ka_num; ?>
                <?php echo $this->Form->hidden("FlujosUser.0.asesores.$nuevo_num_f.id", array('value' => $asesore['FlujosUsersAsesore']['id'])); ?>
                <div class="section" id="asesor-0-<?= $nuevo_num_f ?>">
                    <label class="field select">
                        <?php echo $this->Form->select("FlujosUser.0.asesores.$nuevo_num_f.asesor_id", $usuarios, array('empty' => 'Seleccione el Asesor Legal', 'value' => $asesore['FlujosUsersAsesore']['asesor_id'])) ?>
                        <i class="arrow double"></i>
                    </label>
                </div>
            <?php endforeach; ?>
            <div class="section" id="asesor-0-1">
                <label class="field select">
                    <?php echo $this->Form->select("FlujosUser.0.asesores.1.asesor_id", $usuarios, array('empty' => 'Seleccione el Asesor Legal')) ?>
                    <i class="arrow double"></i>
                </label>
            </div>

        </div>
        <div class="col-md-4">
            <?php foreach ($asesores as $ka_num => $asesore): ?>
                <div class="section">
                    <a href="javascript:" class="btn btn-danger dark" title="asesor" onclick="elimina_ase(<?= $asesore['FlujosUsersAsesore']['id']?>)"> <i class="fa fa-remove"></i></a>
<!--                    --><?php //echo $this->Html->link('<i class="fa fa-remove"></i>', array('controller' => 'HojasRutas', 'action' => 'elimina_asesor_fu', $asesore['FlujosUsersAsesore']['id']), array('class' => 'btn btn-danger dark', 'escape' => false, 'title' => 'Eliminar Asesor', 'confirm' => 'Esta seguro de eliminar el asesor??')); ?>
                </div>
            <?php endforeach; ?>
            <div class="section">
                <div class="btn-group">
                    <button type="button" id="but-as-0" data-num="1"
                            class="btn btn-info" title="ADD ASESOR"
                            onclick="add_asesor(0);">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-danger dark" title="QUITAR ASESOR"
                            onclick="quita_ascesor(0);">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->textarea('FlujosUser.descripcion_2', ['class' => 'gui-textarea', 'placeholder' => 'Descripcion']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
    </div>
</div>
<!-- end .form-body section -->

<div class="panel-footer">
    <button type="submit" class="button btn-primary" >Registrar</button>
</div>
<!-- end .form-footer section -->
<?php echo $this->Form->hidden('FlujosUser.id') ?>
<?php echo $this->Form->hidden('FlujosUser.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?>

<?= $this->Form->end(); ?>

<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>

<?php echo $this->Html->script(array('vendor/plugins/moment/moment.min', 'vendor/plugins/datepicker/js/bootstrap-datetimepicker')) ?>


<script>
    $('.ddatepicker1').each(function(e,elem){
        if($(elem).val() != ''){
            var fecha_dt = $(elem).val().split("-");
            $(elem).val(fecha_dt[2]+'/'+fecha_dt[1]+'/'+fecha_dt[0]);
        }
    });
    $('.ddatepicker1').datetimepicker({
        format: 'DD/MM/YYYY',
        pickTime: false
    });

    $('#f-add').submit(function(e){
        $('.ddatepicker1').each(function(e,elem){
            if($(elem).val() != ''){
                var fecha_dt = $(elem).val().split("/");
                $(elem).val(fecha_dt[2]+'-'+fecha_dt[1]+'-'+fecha_dt[0]);
            }
        });
    });
</script>
<script>


    function add_asesor(key_f) {
        var contenido_a = $('#asesor-' + key_f + '-1').html();
        var n_asesores = parseInt($('#but-as-' + key_f).attr('data-num'));
        $('#asesor-' + key_f + '-' + n_asesores).after('<div class="section" id="asesor-' + key_f + '-' + (n_asesores + 1) + '">' + contenido_a + '</div>');
        $('#asesor-' + key_f + '-' + (n_asesores + 1) + ' label select').attr('name', 'data[FlujosUser][' + key_f + '][asesores][' + (n_asesores + 1) + '][asesor_id]');
        $('#but-as-' + key_f).attr('data-num', (n_asesores + 1));
    }
    function quita_ascesor(key_f) {
        var n_asesores = parseInt($('#but-as-' + key_f).attr('data-num'));
        if (n_asesores != 1) {
            $('#asesor-' + key_f + '-' + (n_asesores)).remove();
            $('#but-as-' + key_f).attr('data-num', (n_asesores - 1));
        }
    }

    function elimina_ase(idAsesor){
        if(confirm("Esta seguro de eliminar el asesor??")){
            $.ajax({
                type: 'GET',
                url: '<?= $this->Html->url(array('controller' => 'Flujos','action' => 'elimina_asesor_fu'));?>/'+idAsesor,
                success: function (data) {
                    cargarmodal('<?php echo $this->Html->url(array('controller' => 'Flujos','action' => 'iniciar_flujo',$idFlujosUser))?>',true);
                }
            });
        }
    }
</script>