<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
<!-- begin: .tray-center -->
<!-- Start: Topbar-Dropdown -->


<script>
    var num_r = 0;
</script>
<div class="tray tray-center">
    <div class="mw1000 center-block">
        <!-- Begin: Content Header -->
        <div class="content-header">
            <h2> Hoja Ruta</h2>
        </div>
        <!-- Begin: Admin Form -->
        <div class="admin-form">
            <div class="panel heading-border">
                <?php echo $this->Form->create('HojasRuta', array('class' => 'form-validacion', 'id' => 'f-add')); ?>
                <div class="panel-body bg-light">
                    <div class="section-divider mb40" id="spy1">
                        <span>Datos del cliente</span>
                    </div>
                    <!-- Basic Inputs -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('HojasRuta.codigo_caso', array('class' => 'gui-input', 'placeholder' => 'Codigo del Caso', 'required')); ?>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div id="f-requisito-0">

                            </div>
                            <?php if (!empty($requisitos_ad)): ?>
                                <?php foreach ($requisitos_ad as $key => $re): ?>
                                    <script>
                                        num_r++;
                                    </script>
                                    <div class="section" id="f-requisito-<?php echo $key + 1; ?>">
                                        <label class="field prepend-icon">
                                            <?php echo $this->Form->hidden("orequisitos.$key.id"); ?>
                                            <?php echo $this->Form->text("orequisitos.$key.descripcion", array('class' => 'gui-input', 'placeholder' => '1. Otro requisito...', 'required')); ?>
                                            <label for="firstname" class="field-icon">
                                                <i class="fa fa-pencil"></i>
                                            </label>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <div class="section">
                                <button type="button" class="button btn-success" onclick="add_requisito();"> Add requisito </button> 
                                <button type="button" class="button btn-danger" onclick="quitar_requisito();"> Quitar requisito </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .form-body section -->
                <div class="panel-footer text-right">
                    <button type="submit" class="button btn-primary"> Guardar </button>
                </div>
                <!-- end .form-footer section -->
                <?php echo $this->Form->hidden('cliente_id', array('value' => $cliente['Cliente']['id'])); ?>
                <?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Auth.User.id'))); ?>
                <?php echo $this->Form->hidden("id") ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="section" id="div-cont-req"  style="display: none;">
    <label class="field prepend-icon">
        <?php echo $this->Form->text('rep_legal', array('class' => 'gui-input', 'placeholder' => '1. Otro requisito...', 'required')); ?>
        <label for="firstname" class="field-icon">
            <i class="fa fa-pencil"></i>
        </label>
    </label>
</div>
<script>
    //var num_r = 0;
    function add_requisito() {
        num_r++;
        var contenido_r = $('#div-cont-req').html();
        $('#f-requisito-' + (num_r - 1)).after('<div class="section" id="f-requisito-' + num_r + '">' + contenido_r + '</div>');
        $('#f-requisito-' + num_r + ' input').attr('placeholder', num_r + '. Otro requisito...').attr('name', 'data[orequisitos][' + num_r + '][descripcion]');
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