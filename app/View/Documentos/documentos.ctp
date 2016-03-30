<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-square"></i>Flujo</span>
</div>

<?= $this->Form->create('Documento', ['class' => 'form-validacion', 'id' => 'f-add']); ?>
<div class="panel-body p25">
    <div id="base-documento">
        <div class="section row" id="camp-selelcion">
            <div class="col-md-10">
                <label class="field select">
                    <?php echo $this->Form->select('Documento.tipo', $documentos, array('empty' => 'Seleccione el Documento', 'required', 'id' => 'idsel-tipo')) ?>
                    <i class="arrow double"></i>
                </label>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-info" title="Cambio a texto" onclick="
                        $('#camp-selelcion').hide(400);
                        $('#idsel-tipo').attr('required', false).val('');
                        $('#camp-texto').show(400);
                        $('#idtext-tipo').attr('required', true);">
                    <i class="fa fa-exchange"></i>
                </button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success" title="Ingresar documento" onclick="carganuevodoc();">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="section row" id="camp-texto" style="display: none;">
            <div class="col-md-10">
                <label for="firstname" class="field prepend-icon">
                    <?php echo $this->Form->text('Documento.nombre', ['class' => 'gui-input', 'placeholder' => 'Ingrese tipo de documento', 'id' => 'idtext-tipo']); ?>
                    <label for="email" class="field-icon">
                        <i class="fa fa-edit"></i>
                    </label>
                </label>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-info"  title="Cambio a seleccion" onclick="
                        $('#camp-selelcion').show(400);
                        $('#idsel-tipo').attr('required', true);
                        $('#camp-texto').hide(400);
                        $('#idtext-tipo').attr('required', false).val('');">
                    <i class="fa fa-exchange"></i>
                </button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success" title="Ingresar documento" onclick="">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="section row">
        <div class="col-md-4">
            <label for="firstname" class="field">
                <input type="text" class="gui-input" placeholder="dsadsadsa" disabled="">
                <input type="hidden" value="dsadsa" name="data[documentos][n][tipo]">
            </label>
        </div>
        <div class="col-md-3">
            <label class="switch block mt15">
                <input type="checkbox" name="features" id="f1" value="javascript">
                <label for="f1" data-on="ON" data-off="OFF"></label>
                <span>Original</span>
            </label>
        </div>
        <div class="col-md-2">
            <label class="field append-button file">
                <span class="button"><i class="fa fa-upload"></i></span>
                <input type="file" class="gui-file" name="file1" id="file1" onChange="$('#archivoad-n').val(this.value);alert(this.value);">
            </label>
        </div>
    </div>

</div>

<div class="panel-footer">
    <button type="submit" class="button btn-primary">Registrar</button>
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

<script>
    function carganuevodoc() {
        var contenido_doc = '';

        $('#base-documento').after('');
    }
</script>
