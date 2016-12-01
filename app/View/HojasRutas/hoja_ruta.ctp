<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">

<link rel="stylesheet" type="text/css"
      href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
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
        <div class="admin-form theme-primary" id="cont_hoja_ruta">

        </div>
    </div>
</div>


<div class="row" id="div-cont-req" style="display: none;">
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

    function carga_hoja_r(){
        $.ajax({
            url: '<?= $this->Html->url(array('action' => 'hoja_ruta_ajax',$categoria,$idCliente,$idHojaruta));?>',
            type: 'GET',
            success: function(data){
                $('#cont_hoja_ruta').html(data);
            }
        });
    }

    carga_hoja_r();

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
</script>
<?php $this->end(); ?>