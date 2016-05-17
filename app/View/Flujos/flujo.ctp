
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-square"></i>Flujo</span>
</div>
<!-- end .panel-heading section -->

<?= $this->Form->create('Flujo', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div class="section row">
        <div class="col-md-12">
            <label for="firstname" class="field prepend-icon">
                <?php echo $this->Form->text('nombre', ['class' => 'gui-input', 'required']); ?>
                <label for="email" class="field-icon">
                    <i class="fa fa-edit"></i>
                </label>
            </label>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-12">
            <div class="option-group field">
                <label class="option">
                    <?php echo $this->Form->checkbox('tributos_determinados'); ?>
                    <span class="checkbox"></span>Tributos Determinados.</label>
            </div>
        </div>
    </div>
    <script>
    var n_resp = 0;
    </script>
    <div id="div-resp-0">

    </div>
    <?php foreach ($resultados as $key => $re): ?>
    <script>
    n_resp++;
    </script>
        <div class="section row"  id="div-resp-<?php echo $key + 1; ?>">
            <div class="col-md-12">
                <label for="firstname" class="field prepend-icon">
                    <?php echo $this->Form->text("Resultado.".($key + 1).".pregunta", ['class' => 'gui-input', 'required', 'placeholder' => ($key + 1) . '. Ingrese la pregunta del resultado','value' => $re['Resultado']['pregunta']]); ?>
                    <label for="email" class="field-icon">
                        <i class="fa fa-edit"></i>
                    </label>
                </label>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<!-- end .form-body section -->

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
    <button type="button" class="button btn-success" onclick="add_respuesta();">Add Resultado</button>
    <button type="button" class="button btn-danger" onclick="quita_respuesta();">Quitar Resultado</button>
</div>

<!-- end .form-footer section -->
<?php echo $this->Form->hidden('id') ?> 
<?php echo $this->Form->hidden('user_id') ?> 
<?= $this->Form->end(); ?>
<div class="section row" id="div-resp-cont" style="display: none;">
    <div class="col-md-12">
        <label for="firstname" class="field prepend-icon">
            <?php echo $this->Form->text('pregunta', ['class' => 'gui-input', 'required', 'placeholder' => '1. Ingrese la pregunta del resultado']); ?>
            <label for="email" class="field-icon">
                <i class="fa fa-edit"></i>
            </label>
        </label>
    </div>
</div>

<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>

<script>

    function add_respuesta() {
        n_resp++;
        var contenido_r = $('#div-resp-cont').html();
        $('#div-resp-' + (n_resp - 1)).after('<div class="section row" id="div-resp-' + n_resp + '">' + contenido_r + '</div>');

        $('#div-resp-' + n_resp + ' input').attr('name', 'data[Resultado][' + n_resp + '][pregunta]').attr('placeholder', n_resp + '. Ingrese la pregunta del resultado');

    }
    function quita_respuesta() {
        if (n_resp != 0) {
            $('#div-resp-' + n_resp).remove();
            n_resp--;
        }
    }
</script>